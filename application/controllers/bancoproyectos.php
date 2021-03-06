<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bancoproyectos extends CI_Controller
{
/* Mantenimiento de sector entidad Y servicio publico asociado*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bancoproyectos_modal');
        $this->load->helper('FormatNumber_helper');
    }
    /*INSERTAR UN PROYECTO EN LA TABLA PROYECTO Y SIMULTANEO EN LA TABLA PROYECTO UBIGEO*/
    public function AddProyectos()
    {
        if ($this->input->is_ajax_request()) {
            $flat                = "IPC ";
            $id_pi               = "0";
            $cbxUnidadEjecutora  = $this->input->post("cbxUnidadEjecutora");
            $cbxNatI             = $this->input->post("cbxNatI");
            $cbxTipologiaInv     = $this->input->post("cbxTipologiaInv");
            $cbxTipoInv          = $this->input->post("cbx");
            $cbxGrupoFunc        = $this->input->post("cbxGrupoFunc");
            $cbxNivelGob         = $this->input->post("cbxNivelGob");
            $cbxProgramaPres     = $this->input->post("cbxProgramaPres");
            $txtCodigoUnico      = $this->input->post("txtCodigoUnico");
            $txtNombrePip        = $this->input->post("txtNombrePip");
            $txtCostoPip         = floatval(str_replace(",","",$this->input->post("txtCostoPip")));
            $txt_beneficiarios   = $this->input->post("txt_beneficiarios");
            $dateFechaInPip      = $this->input->post("fecha_registro");
            $dateFechaViabilidad = $this->input->post("fecha_viabilidad");
            $lista_unid_form     = $this->input->post("lista_unid_form");
            $cbx_estado          = $this->input->post("cbx_estado");
            $cbxEstCicInv_       = $this->input->post("cbxEstCicInv_");
            $cbxRubro            = $this->input->post("cbxRubro");
            $cbxModalidadEjec    = $this->input->post("cbxModalidadEjec");
            if ($this->bancoproyectos_modal->AddProyectos(
                $flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $dateFechaInPip, $dateFechaViabilidad, $lista_unid_form, $cbx_estado, $cbxEstCicInv_,
                $cbxRubro, $cbxModalidadEjec) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    /*FIN INSERTAR UN PROYECTO*/
    /*INSERTAR UN NO PIP*/
    public function AddNoPip()
    {
        if ($this->input->is_ajax_request()) {
            $flat                = "IPCNOPIP";
            $id_pi               = "0";
            $cbxUnidadEjecutora  = $this->input->post("cbxUnidadEjecutora");
            $cbxNatI             = null;
            $cbxTipologiaInv     = null;
            $cbxTipoInv          = $this->input->post("cbx");
            $cbxGrupoFunc        = $this->input->post("cbxGrupoFunc");
            $cbxNivelGob         = $this->input->post("cbxNivelGob");
            $cbxProgramaPres     = null;
            $txtCodigoUnico      = $this->input->post("txtCodigoUnico");
            $txtNombrePip        = $this->input->post("txtNombrePip");
            $txtCostoPip         = $this->input->post("txtCostoPip");
            $txt_beneficiarios   = $this->input->post("txt_beneficiarios");
            $dateFechaInPip      = $this->input->post("fecha_registro");
            $dateFechaViabilidad = $this->input->post("fecha_viabilidad");
            $cbx_estado          = $this->input->post("cbx_estado");
            $cbxEstCicInv_       = $this->input->post("cbxEstCicInv_");
            $cbxRubro            = $this->input->post("cbxRubro");
            $cbxModalidadEjec    = $this->input->post("cbxModalidadEjec");
            $Cbx_TipoNoPip_i     = $this->input->post("Cbx_TipoNoPip_i");
            if ($this->bancoproyectos_modal->AddNoPip(
                $flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $dateFechaInPip, $dateFechaViabilidad, $cbx_estado, $cbxEstCicInv_, $cbxRubro, $cbxModalidadEjec, $Cbx_TipoNoPip_i) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    /*FIN INSERTAR UN PROYECTO*/
/* EDITAR PROYECTO NO PIP*/
    public function update_no_pip()
    {
        if ($this->input->is_ajax_request()) {
            $flat               = "U_IPCNOPIP";
            $id_pi              = $this->input->post("txt_idNo_Pip");
            $cbxUnidadEjecutora = $this->input->post("cbxUnidadEjecutora_m");
            //$cbxNatI            = $this->input->post("cbxNatI");
            // $cbxTipologiaInv    = $this->input->post("cbxTipologiaInv");
            $cbx_tipo_no_pip_m = $this->input->post("cbx_tipo_no_pip_m");
            $cbxGrupoFunc      = $this->input->post("cbxGrupoFunc_m");
            $cbxNivelGob       = $this->input->post("cbxNivelGob_m");
            // $cbxProgramaPres   = $this->input->post("cbxProgramaPres");
            $txtCodigoUnico    = $this->input->post("txtCodigoUnico_m");
            $txtNombrePip      = $this->input->post("txtNombrePip_m");
            $txtCostoPip       = $this->input->post("txtCostoPip_m");
            $txt_beneficiarios = $this->input->post("txt_beneficiarios_m");
            // $dateFechaInPip    = $this->input->post("fecha_registro");
            // $dateFechaViabilidad = $this->input->post("fecha_viabilidad");
            // $lista_unid_form  = $this->input->post("lista_unid_form");
            //  $cbx_estado       = $this->input->post("cbx_estado_m");
            $cbx_tipo_inversion = $this->input->post("cbxEstCicInv_m");
            $cbxEstado_pi       = $this->input->post("cbx_estado_m");
            $cbxRubro           = $this->input->post("cbxRubroEjecucion_m");
            $cbxModalidadEjec   = $this->input->post("cbxModalidadEjecucion_m");
            $Cbx_TipoNoPip_m    = $this->input->post("Cbx_TipoNoPip_m");
            if ($this->bancoproyectos_modal->update_no_pip(
                $flat, $id_pi, $cbxUnidadEjecutora, $cbx_tipo_no_pip_m, $cbxGrupoFunc, $cbxNivelGob, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $cbx_tipo_inversion, $cbxEstado_pi, $cbxRubro, $cbxModalidadEjec, $Cbx_TipoNoPip_m) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //update pip
    public function update_pip()
    {
        if ($this->input->is_ajax_request()) {
            $flat                      = "U_IPCPIP";
            $txt_id_Pip_m              = $this->input->post("txt_id_Pip_m");
            $cbxUnidadEjecutora_m      = $this->input->post("cbxUnidadEjecutora_m");
            $cbxNatI_m                 = $this->input->post("cbxNatI_m");
            $cbxTipologiaInversion_m   = $this->input->post("cbxTipologiaInversion_m");
            $cbxGrupoFunc_m            = $this->input->post("cbxGrupoFunc_m");
            $cbxNivelGob_m             = $this->input->post("cbxNivelGob_m");
            $cbxProgramaPresupuestal_m = $this->input->post("cbxProgramaPresupuestal_m");
            $txtCodigoUnico_m          = $this->input->post("txtCodigoUnico_m");
            $txtNombrePip_m            = $this->input->post("txtNombrePip_m");
            $txtCostoPip_m             = $this->input->post("txtCostoPip_m");
            $txt_beneficiarios_m       = $this->input->post("txt_beneficiarios_m");
            // $dateFechaInPip    = $this->input->post("fecha_registro");
            // $dateFechaViabilidad = $this->input->post("fecha_viabilidad");
            $lista_unid_form_m       = $this->input->post("lista_unid_form_m");
            $cbx_estado_pi_m         = $this->input->post("cbx_estado_pi_m");
            $cbxEstCicInv_m          = $this->input->post("cbxEstCicInv_m");
            $cbxRubroEjecucion_m     = $this->input->post("cbxRubroEjecucion_m");
            $cbxModalidadEjecucion_m = $this->input->post("cbxModalidadEjecucion_m");
            if ($this->bancoproyectos_modal->update_pip(
                $flat, $txt_id_Pip_m, $cbxUnidadEjecutora_m, $cbxNatI_m, $cbxTipologiaInversion_m, $cbxGrupoFunc_m, $cbxNivelGob_m, $cbxProgramaPresupuestal_m, $txtCodigoUnico_m, $txtNombrePip_m, $txtCostoPip_m, $txt_beneficiarios_m, $lista_unid_form_m, $cbx_estado_pi_m, $cbxEstCicInv_m, $cbxRubroEjecucion_m, $cbxModalidadEjecucion_m) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }

//listar proyectos de inversion
    public function GetProyectoInversion()
    {
        if ($this->input->is_ajax_request()) 
        {
            $flat  = "LISTARPIP";
            $datos = $this->bancoproyectos_modal->GetProyectoInversion($flat);
            foreach ($datos as $key => $value) 
            {
                $value->costo_pi = a_number_format($value->costo_pi , 2, '.',",",3);
            }

            echo json_encode($datos);
        } 
        else 
        {
            show_404();
        }
    }
    //listar estado de un proyecto
    public function listar_estados()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_estados";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->listar_estados($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar rubro pi tabla intermedia
    public function listar_rubro_pi()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_rubro_pi";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->listar_rubro_pi($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar modalidad de ejecucion
    public function listar_modalidad_ejec()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_modalidades";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->listar_modalidad_ejec($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar Rubro
    public function listar_rubro()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->bancoproyectos_modal->listar_rubro();
            echo json_encode($data);
        } else {
            show_404();
        }
    }
    //listar  de los estados de un py para poner en el combobox
    public function listar_estado()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "R";
            $datos = $this->bancoproyectos_modal->listar_estado($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //listar ubigeo de un proyecto
    public function Get_ubigeo_pip()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_ubigeo";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->Get_ubigeo_pip($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }

//Agregar ubigeo en proyecto de inversión
    public function Add_ubigeo_proyecto()
    {
        if ($this->input->is_ajax_request()) {
            $flat         = "C ";
            $id_ubigeo_pi = "0";
            $id_ubigeo    = $this->input->post("cbx_distrito");
            $txt_id_pip   = $this->input->post("txt_id_pip");
            $direccion    = "null";
            $txt_latitud  = $this->input->post("txt_latitud");
            $txt_longitud = $this->input->post("txt_longitud");
            if ($this->bancoproyectos_modal->Add_ubigeo_proyecto($flat, $id_ubigeo_pi, $id_ubigeo, $txt_id_pip, $direccion, $txt_latitud, $txt_longitud) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }

    //Agregar estado ciclo
    public function AddEstadoCicloPI()
    {
        if ($this->input->is_ajax_request()) {
            $flat               = "C";
            $id_estado_ciclo_pi = "0";
            $txt_id_pip_Ciclopi = $this->input->post("txt_id_pip_Ciclopi");
            $Cbx_EstadoCiclo    = $this->input->post("Cbx_EstadoCiclo");
            $dateFechaIniC      = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddEstadoCicloPI($flat, $id_estado_ciclo_pi, $txt_id_pip_Ciclopi, $Cbx_EstadoCiclo, $dateFechaIniC) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //Agregar RUBRO PI
    public function AddRurboPI()
    {
        if ($this->input->is_ajax_request()) {
            $flat               = "C";
            $id_rubro_pi        = "0";
            $Cbx_RubroPI        = $this->input->post("Cbx_RubroPI");
            $txt_id_pip_RubroPI = $this->input->post("txt_id_pip_RubroPI");
            $dateFechaIniC      = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddRurboPI($flat, $id_rubro_pi, $Cbx_RubroPI, $txt_id_pip_RubroPI, $dateFechaIniC) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }

    //Agregar estado ciclo
    public function AddModalidadEjecPI()
    {
        if ($this->input->is_ajax_request()) {
            $flat                     = "C";
            $id_modalidad_ejec_pi     = "0";
            $Cbx_ModalidadEjec        = $this->input->post("Cbx_ModalidadEjec");
            $txt_id_pip_ModalidadEjec = $this->input->post("txt_id_pip_ModalidadEjec");
            // $dateFechaIniC            = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddModalidadEjecPI($flat, $id_modalidad_ejec_pi, $Cbx_ModalidadEjec, $txt_id_pip_ModalidadEjec) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //listar  de los estados de un py para poner en el combobox
    public function listar_provincia()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_provincia";
            $datos = $this->bancoproyectos_modal->listar_provincia($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //listar modalidad de ejecucion
    public function listar_distrito()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "listar_distrito";
            $nombre_distrito = $this->input->post("nombre_distrito");
            $datos           = $this->bancoproyectos_modal->listar_distrito($flat, $nombre_distrito);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //------------------------------------------------------------  NO PIP
    //listar proyectos de inversion
    public function GetNOPIP()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "LISTARNOPIP";
            $datos = $this->bancoproyectos_modal->GetNOPIP($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //Agregar estado ciclo
    public function AddTipoNoPip()
    {
        if ($this->input->is_ajax_request()) {
            $flat                 = "C";
            $id_tipo_NoPip        = "0";
            $txt_id_pip_Tipologia = $this->input->post("txt_id_pip_Tipologia");
            $Cbx_TipoNoPip        = $this->input->post("Cbx_TipoNoPip");
            // $dateFechaIniC            = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddTipoNoPip($flat, $id_tipo_NoPip, $Cbx_TipoNoPip, $txt_id_pip_Tipologia) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //listar los no pip con por tipos
    public function Get_TipoNoPip()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_tipo_nopip";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->Get_TipoNoPip($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    /*OPERACION Y MANTENIEMIENTO*/
    //listar operacion mantenimiento
    public function Get_OperacionMantenimiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_operacion_mantenimiento";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->Get_OperacionMantenimiento($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //agregar operacion y mantenimiento
    public function AddOperacionMantenimiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat                          = "C";
            $id_OperacionMantenimiento     = "0";
            $txt_id_pip_OperMant           = $this->input->post("txt_id_pip_OperMant");
            $txt_monto_operacion           = $this->input->post("txt_monto_operacion");
            $txt_monto_mantenimiento       = $this->input->post("txt_monto_mantenimiento");
            $txt_responsable_operacion     = $this->input->post("txt_responsable_operacion");
            $txt_responsable_mantenimiento = $this->input->post("txt_responsable_mantenimiento");
            // $dateFechaIniC            = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddOperacionMantenimiento($flat, $id_OperacionMantenimiento, $txt_id_pip_OperMant, $txt_monto_operacion, $txt_monto_mantenimiento, $txt_responsable_operacion, $txt_responsable_mantenimiento) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }

    public function NoPip()
    {
        $this->_load_layout_NoPip('Front/Pmi/frmbancoproyectosNoPip');
    }
    public function _load_layout_NoPip($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsNoPip');
    }
    public function index()
    {
        $this->_load_layout('Front/Pmi/frmbancoproyectos');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsPip');
    }

}
