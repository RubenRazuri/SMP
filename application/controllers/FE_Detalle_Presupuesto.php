<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Detalle_Presupuesto extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	$this->load->model('Model_FE_Presupuesto_Inv');
    	$this->load->model('Model_Unidad_Medida');
    	$this->load->model('Model_FE_Tipo_Gasto');
    	$this->load->model('Model_FE_Detalle_Presupuesto');
    	$this->load->model('Model_FE_Detalle_Gasto');
	}

	public function insertar()
	{
		if($_POST)
		{
			$idPresupuestoFE=$this->input->post('hdIdPresupuestoFE');
			$idsTipoGasto=$this->input->post('hdIdDetallePresupuesto');

			if($idsTipoGasto)
			{
				foreach($idsTipoGasto as $value)
				{
					$descripcionesDetalleGastoTemp=$this->input->post('descripcionDetalleGasto'.$value);
					$idsUnidadMedidaTemp=$this->input->post('idUnidadMedida'.$value);
					$cantidadesDetalleGastoTemp=$this->input->post('cantidadDetalleGasto'.$value);
					$costosUnitarioDetalleGastoTemp=$this->input->post('costoUnitarioDetalleGasto'.$value);
					$subTotalesDetalleGastoTemp=$this->input->post('subTotalDetalleGasto'.$value);

					$this->Model_FE_Detalle_Presupuesto->Insertar($idPresupuestoFE,$idsTipoGasto);
					//Insertar FE_DETALLE_PRESUPUESTO;
					$sumatoriaTemporal=0;

					if($descripcionesDetalleGastoTemp)
					{
						foreach($descripcionesDetalleGastoTemp as $key => $item)
						{
							$descripcioDetalleGastoTemp=$descripcionesDetalleGastoTemp[$key];
							$idUnidadMedidaTemp=$idsUnidadMedidaTemp[$key];
							$cantidadDetalleGastoTemp=$cantidadesDetalleGastoTemp[$key];
							$costoUnitarioDetalleGastoTemp=$costosUnitarioDetalleGastoTemp[$key];
							$subTotalDetalleGastoTemp=$subTotalesDetalleGastoTemp[$key];

							$sumatoriaTemporal+=$subTotalDetalleGastoTemp;

							$this->Model_FE_Detalle_Gasto->Insertar($descripcioDetalleGastoTemp,$idUnidadMedidaTemp,$cantidadDetalleGastoTemp,$costoUnitarioDetalleGastoTemp,$subTotalDetalleGastoTemp);
							//Insertar FE_DETALLEGASTO;
						}
					}

					//Update del total_detalle de FE_DETALLE_PRESUPUESTO
				}
			}

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos guardados correctamente.', 'idEstudioInversion' => $this->input->post('hdIdEstudioInversion')]);exit;
		}

		$fePresupuestoInv=$this->Model_FE_Presupuesto_Inv->FEPresupuestoInvPorIdOresupuestoFE($this->input->get('idPresupuestoFE'));
		$listaTipoGasto=$this->Model_FE_Tipo_Gasto->ListarTipoGasto();
		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
		
	    $this->load->view('Front/PresupuestoEstudioInversion/DetallePresupuesto/insertar', ['fePresupuestoInv' => $fePresupuestoInv, 'listaTipoGasto' => $listaTipoGasto, 'listaUnidadMedida' => $listaUnidadMedida]);
	}
}