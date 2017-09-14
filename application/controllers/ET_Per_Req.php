<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Per_Req extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Especialidad');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				/*$this->db->trans_start(); 
				
				$idEspecialidad=$this->input->post('idEspecialidad');
				$idTareaET=$this->input->post('idTareaET');

				$this->Model_ET_Especialista_Tarea->insertar('NULL', $idTareaET, $idEspecialidad);

				$etEspecialistaTareaTemp=$this->Model_ET_Especialista_Tarea->ultimoETEspecialistaTarea();

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'idEspecialistaTarea' => $etEspecialistaTareaTemp->id_especialista_tarea]);exit;*/
			}

			$listaEspecialidad=$this->Model_Especialidad->ListarEspecialidad();

			return $this->load->view('front/Ejecucion/ETPerReq/insertar', ['listaEspecialidad' => $listaEspecialidad]);
		}
	}
}