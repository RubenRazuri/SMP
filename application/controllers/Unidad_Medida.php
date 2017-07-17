<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unidad_Medida extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->library('table');
        $this->load->model("Model_Unidad_Medida");    
    }

    public function index()
    {
        $listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();

        $this->load->view('layout/ADMINISTRACION/header');
        $this->load->view('front/Administracion/UnidadMedida/index', ['listaUnidadMedida' => $listaUnidadMedida]);
        $this->load->view('layout/ADMINISTRACION/footer');
    }
    public function insertar()
    {
    	if($_POST)
    	{
    		$txt_descripcion=$this->input->post('txt_descripcion');
    		$this->Model_Unidad_Medida->editar($txt_descripcion);
    		
    		$this->session->set_flashdata('corecto', 'Se regitro correctamente');

    		return redirect('/Unidad_Medida');
    	}

        return $this->load->view('front/Administracion/UnidadMedida/insertar');
    }
     public function editar()
    {
    	if($this->input->post('hdId'))
    	{
			$id=$this->input->post('hdId');
			$txtDescripcion =$this->input->post('txtDescripcion');

			$this->Model_Unidad_Medida->editar($id,$txtDescripcion);
    		
    		$this->session->set_flashdata('correcto', 'Se modifico correctamente la Unidad de Medidad ');

    		return redirect('/Unidad_Medida');
    	}

		$id=$this->input->post('id');

		$unidadMedida=$this->Model_Unidad_Medida->UnidadMedida($id)[0];

        return $this->load->view('front/Administracion/UnidadMedida/editar', ['unidadMedida' => $unidadMedida]);
    }
   function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }
}