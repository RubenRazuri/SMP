<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Partida extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_ET_Partida');
		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Etapa_Ejecucion');
		$this->load->model('Model_ET_Detalle_Partida');
		$this->load->model('Model_ET_Analitico_Partida');
		$this->load->model('Model_ET_Detalle_Analitico_Partida');
		$this->load->model('Model_ET_Analisis_Unitario');
		$this->load->model('Model_ET_Detalle_Analisis_Unitario');
		$this->load->model('Model_ET_Meta');
	}

	public function insertar()
	{
		$this->db->trans_start();

		$idMeta=$this->input->post('idMeta');
		$idUnidad=$this->input->post('idUnidad');
		$descripcionPartida=$this->input->post('descripcionPartida');
		$rendimientoPartida=$this->input->post('rendimientoPartida');
		$cantidadPartida=$this->input->post('cantidadPartida');
		$precioUnitarioPartida=$this->input->post('precioUnitarioPartida');
		$idListaPartida=$this->input->post('idListaPartida');

		if(count($this->Model_ET_Partida->ETPartidaPorIdMetaAndDescPartida($idMeta, $descripcionPartida))>0)
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos partidas iguales en el mismo nivel.']);exit;
		}

		$etEtapaEjecucion=$this->Model_ET_Etapa_Ejecucion->ETEtapaEjecucionPorDescEtaoaET('Elaboración de expediente técnico');

		if($etEtapaEjecucion==null)
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se encuentra registrado la etapa de "Elaboración de expediente técnico" para proseguir con el proceso. Por favor registre este dato en las etapas de ejecución.']);exit;
		}

		$this->Model_ET_Partida->insertar($idMeta, $idUnidad, $idListaPartida, $descripcionPartida, $rendimientoPartida, $cantidadPartida);

		$unidadMedida=$this->Model_Unidad_Medida->UnidadMedida($idUnidad)[0];

		$ultimoIdPartida=$this->Model_ET_Partida->ultimoId();

		$this->Model_ET_Detalle_Partida->insertar($ultimoIdPartida, $idUnidad, $etEtapaEjecucion->id_etapa_et, $rendimientoPartida, $cantidadPartida, $precioUnitarioPartida, true);

		$ultimoIdDetallePartida=$this->Model_ET_Detalle_Partida->ultimoId();

		$listaETAnaliticoPartida=$this->Model_ET_Analitico_Partida->ETAnaliticoPartidaPorIdListaPartida($idListaPartida);

		foreach($listaETAnaliticoPartida as $key => $value)
		{
			$this->Model_ET_Analisis_Unitario->insertar('NULL', $value->id_recurso, $ultimoIdDetallePartida);

			$ultimoIdAnalisisUnitario=$this->Model_ET_Analisis_Unitario->ultimoId();

			$value->childETDetalleAnaliticoPartida=$this->Model_ET_Detalle_Analitico_Partida->ETDetalleAnaliticoPartidaPorIdAnaliticoPartida($value->id_analitico_partida);

			foreach($value->childETDetalleAnaliticoPartida as $index => $item)
			{
				$this->Model_ET_Detalle_Analisis_Unitario->insertar($ultimoIdAnalisisUnitario, $item->id_unidad, $item->desc_insumo, $item->cuadrilla, 1, $item->precio, $item->rendimiento);
			}
		}

		$ultimoETDetallePartida=$this->Model_ET_Detalle_Partida->ultimoETDetallePartida();

		$this->updateNumerationPartida($idMeta);

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Partida registrada correctamente.', 'idPartida' => $ultimoIdPartida, 'descripcionUnidadMedida' => $unidadMedida->descripcion, 'cantidadDetallePartida' => $ultimoETDetallePartida->cantidad, 'precioParcialDetallePartida' => $ultimoETDetallePartida->parcial]);exit;
	}

	private function updateNumerationPartida($idMeta)
	{
		$meta=$this->Model_ET_Meta->ETMetaPorIdMeta($idMeta);

		$listaETPartidaTemporal=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);

		foreach($listaETPartidaTemporal as $key => $value)
		{
			$this->Model_ET_Partida->updateNumeracionPorIdPartida($value->id_partida, $meta->numeracion.'.'.($key+1));
		}
	}

	public function eliminar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idPartida=$this->input->post('idPartida');

			$etPartidaTemporal=$this->Model_ET_Partida->ETPartidaPorIdPartida($idPartida);

			$this->Model_ET_Partida->eliminar($idPartida);

			$this->updateNumerationPartida($etPartidaTemporal->id_meta);

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Partida eliminada correctamente.']);exit;
		}

		$this->load->view('Front/Ejecucion/ETPartida/insertar');
	}
}