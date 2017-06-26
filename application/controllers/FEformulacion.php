<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FEformulacion extends CI_Controller
{
/* Mantenimiento de division funcional y grupo funcional*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FEformulacion_Modal');
    }

    public function GetFormulacion()
    {
        if ($this->input->is_ajax_request()) {
            $Etapa = "Formulación";
            $this->session->sess_destroy();
            $datos = $this->FEformulacion_Modal->GetFormulacion($Etapa);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function GetFEAprobados()
    {
        if ($this->input->is_ajax_request()) {
            $Etapa = "Aprobado";
            $this->session->sess_destroy();
            $datos = $this->FEformulacion_Modal->GetFEAprobados($Etapa);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function GetFEViabilizado()
    {
        if ($this->input->is_ajax_request()) {
            $Etapa = "Viabilizado";
            $this->session->sess_destroy();
            $datos = $this->FEformulacion_Modal->GetFEViabilizado($Etapa);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function index()
    {
        $this->_load_layout('Front/Formulacion_Evaluacion/frmFormulacion');
    }
    public function FEAPROBADO()
    {
        $this->_load_layout_jsFormFormulacion('Front/Formulacion_Evaluacion/frmAprobados');
    }
    public function FEVIABILIZADO()
    {
        $this->_load_layout_jsViabilizado('Front/Formulacion_Evaluacion/frmViabilizado');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormFormulacion');
    }
    public function _load_layout_jsFormFormulacion($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormAprobados');
    }
    public function _load_layout_jsViabilizado($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormViabilizados');
    }
}