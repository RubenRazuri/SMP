<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Per_Req extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Especialidad');
		$this->load->model('Model_ET_Per_Req');
		$this->load->model('Model_Personal');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idEspecialidad=$this->input->post('idEspecialidad');
				$idET=$this->input->post('idET');

				$this->Model_ET_Per_Req->insertar('NULL', $idEspecialidad, $idET, 'NULL', 0);

				$etPerReqTemp=$this->Model_ET_Per_Req->ultimoETPerReq();

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'idPerReq' => $etPerReqTemp->id_per_req]);exit;
			}

			$idET=$this->input->get('idExpedienteTecnico');

			$listaEspecialidad=$this->Model_Especialidad->ListarEspecialidad();
			$listaETPerReq=$this->Model_ET_Per_Req->ETPerReqPorIdET($idET);
			$listaPersona=$this->Model_Personal->verTodo();

			return $this->load->view('front/Ejecucion/ETPerReq/insertar', ['listaEspecialidad' => $listaEspecialidad, 'idET' => $idET, 'listaETPerReq' => $listaETPerReq, 'listaPersona' => $listaPersona]);
		}
	}

	public function eliminar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idPerReq=$this->input->post('idPerReq');

				$this->Model_ET_Per_Req->eliminar($idPerReq);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos eliminados correctamente.']);exit;
			}
		}
	}

	public function asignarPersonal()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idPerReq=$this->input->post('idPerReq');
				$idPersona=$this->input->post('idPersona');

				$this->Model_ET_Per_Req->asignarPersonal($idPerReq, ($idPersona=="" ? 'NULL' : $idPersona), date('Y-m-d H:m:s'));

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Personal asignado correctamente.']);exit;
			}
		}
	}

	public function asignarQuitarCraet()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idPerReq=$this->input->post('idPerReq');
				$craet=$this->input->post('craet');

				$this->Model_ET_Per_Req->asignarQuitarCraet($idPerReq, $craet);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos guardados correctamente.']);exit;
			}
		}
	}
}