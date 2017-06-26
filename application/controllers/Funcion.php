<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_Funcion');
	}
    
     function GetFuncion()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_Funcion->GetFuncion();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
	function AddFucion()
         {
              if ($this->input->is_ajax_request()) 
              {
                $txt_codigofuncion =$this->input->post("txt_codigofuncion");
                $txt_nombrefuncion =$this->input->post("txt_nombrefuncion");
                if($this->Model_Funcion->AddFucion($txt_codigofuncion,$txt_nombrefuncion) == true)
                  echo "Se añadio una función";
                else
                  echo "Se añadio  una función";  
             }
             else
              {
                  show_404();
              }

       }
        //modifcar funcion

        function UpdateFuncion()
         {
              if ($this->input->is_ajax_request()) 
              {
                $txt_IdfuncionM =$this->input->post("txt_IdfuncionM");
                $txt_codigofuncionM =$this->input->post("txt_codigofuncionM");
                $txt_nombrefuncionM =$this->input->post("txt_nombrefuncionM");

                if($this->Model_Funcion->UpdateFuncion($txt_IdfuncionM,$txt_codigofuncionM,$txt_nombrefuncionM) == true)
                  echo "Se actualizao  la función";
                else
                  echo "Se actualizo la  función";  
             }
             else
              {
                  show_404();
              }

        }


    /*fin FUNCION*/
    
    /* division funcional*/
    
    function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }

}