<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalReportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Dashboard_Reporte');
    }

    public function PrincipalReportes(){

        $this->_load_layout('Reportes');

    }

    public function GetAprobadosEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->GetAprobadosEstudio();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function NaturalezaInversionMontos()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->NaturalezaInversionMontos();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function CantidadPipFuenteFinancimiento()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipFuenteFinancimiento();
            echo json_encode($datos);
        } else
        show_404();
    }
    public function MontoPipFuenteFinanciamiento()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->MontoPipFuenteFinanciamiento();
            echo json_encode($datos);
        } else
        show_404();
    }
    
    public function CantidadPipModalidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipModalidad();
            echo json_encode($datos);
        } else
        show_404();
    }
    
    public function _load_layout($template)
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view($template);
        $this->load->view('layout/Reportes/footer');
    }

}


