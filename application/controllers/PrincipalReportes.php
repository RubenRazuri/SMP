<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalReportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Dashboard_Reporte');
    }

    public function PrincipalReportes()
    {

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

    public function MontoPipModalidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->MontoPipModalidad();
            echo json_encode($datos);
        } else
        show_404();
    }
    public function CantidadPipRubro()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipRubro();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function CantidadPipProvincia()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipProvincia();
            foreach ($datos as $key => $Itemp) {
               $numpip[$key]=$Itemp->Cantidadpip;
            }
            echo json_encode($numpip);
        } else
        show_404();
    }

    public function GrafEstInfFinanciera()
    { 
       
        if ($this->input->is_ajax_request()) {
            $CodigoUnico=$this->input->get('codigounico');
            $datos = $this->Model_Dashboard_Reporte->ReporteCorrelativoMeta($CodigoUnico);
            $var1=[];
            foreach ($datos as $key => $Itemp) {
                $anio[]=$Itemp->ano_eje;
                $devengado[]=$Itemp->devengado;
                $pim[]=$Itemp->pim;
            }
            $var1[]=$anio;
            $var1[]=$devengado;
            $var1[]=$pim;
          

            echo json_encode($var1);
        } else
        show_404();
    }

  public function GrafAvanceFinanciero()
    { 
       
        if ($this->input->is_ajax_request()) {
            $CodigoUnico=$this->input->get('codigounico');
            $datos = $this->Model_Dashboard_Reporte->ReporteCorrelativoMeta($CodigoUnico);
            $var1=[];
            foreach ($datos as $key => $Itemp) {
                $anio[]=$Itemp->ano_eje;
                //$avance_financiero[]=$Itemp->avance_financiero;
                $ejecucion[]=$Itemp->ejecucion;
                $compromiso[]=$Itemp->compromiso;
                $certificado[]=$Itemp->monto_certificado;
                $devengado[]=$Itemp->devengado;
                $girado[]=$Itemp->girado;
                $pagado[]=$Itemp->pagado;
            }
            $var1[]=$anio;
            $var1[]=$ejecucion;
            $var1[]=$compromiso;
            $var1[]=$certificado;
            $var1[]=$devengado;
            $var1[]=$girado;
            $var1[]=$pagado;
           // $var1[]=$avance_financiero;

            echo json_encode($var1);
        } else
        show_404();
    }

    public function FuncionNumeroPip()
    {
        if ($this->input->is_ajax_request()) 
        {
            $datos = $this->Model_Dashboard_Reporte->FuncionNumeroPip();
            echo json_encode($datos);
        } 
        else
        show_404();
    }

    function BuscadorPipPorCodigoReporte()
    {
            $CodigoUnico=$this->input->get('codigounico');
            $BuscarPipCodigoReporte=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPip($CodigoUnico); //BUSCAR PIP
      
            //$devengado=[$BuscarPipCodigoReporte->pia_meta_pres,$BuscarPipCodigoReporte->pim_acumulado,$BuscarPipCodigoReporte->devengado_acumulado];
            echo  json_encode($BuscarPipCodigoReporte);
    }

    function  DatosParaEstadisticaAnualProyecto()
    {
        $codigounico=$this->input->POST('codigounico');
        $data=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPip($codigounico);
        echo  json_encode($data);
    }

    function DatosEjecucionPresupuestal()
    {
        $codigounico=$this->input->POST('codigounico');
        $data=$this->Model_Dashboard_Reporte->ReporteEjecucionPresupuestal($codigounico);
        echo  json_encode($data);
    }

    function DatosCorrelativoMeta()
    {
        $codigounico=$this->input->POST('codigounico');
        $data=$this->Model_Dashboard_Reporte->ReporteCorrelativoMeta($codigounico);
        echo  json_encode($data);
    }

    function  ReporteDevengadoPiaPimPorPipGraficos()
    {
            $codigounico=$this->input->GET('codigounico');
            $data=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPipGraficos($codigounico);
            echo  json_encode($data);
    }

    function DetalleMensualizado()
    {
        $correlativoMeta=$this->input->GET('meta');
        $anioMeta=$this->input->GET('anio');
        $listaDetalleMensualizado=$this->Model_Dashboard_Reporte->DetalleMensualizadoMeta($correlativoMeta,$anioMeta);
        $this->load->view('front/Reporte/ProyectoInversion/detalle',['listaDetalleMensualizado'=>$listaDetalleMensualizado,'correlativoMeta'=>$correlativoMeta,'anioMeta'=>$anioMeta]);
        //$this->load->view('front/Reporte/ProyectoInversion/detalle');
    }

    public function GrafDetalleMensualizado()
    { 
       
        if ($this->input->is_ajax_request()) {
            $correlativoMeta=$this->input->GET('meta');
            $anioMeta=$this->input->GET('anio');
            $datos=$this->Model_Dashboard_Reporte->DetalleMensualizadoMeta($correlativoMeta,$anioMeta);
            $var1=[];
            foreach ($datos as $key => $Itemp) {
                $nombre[]=$Itemp->mes_eje;
                $ejecucion[]=$Itemp->ejecucion;
                $compromiso[]=$Itemp->compromiso;
                $certificado[]=$Itemp->certificado;
                $devengado[]=$Itemp->devengado;
                $girado[]=$Itemp->girado;
                $pagado[]=$Itemp->pagado;
            }
            $var1[]=$nombre;
            $var1[]=$ejecucion;
            $var1[]=$compromiso;
            $var1[]=$certificado;
            $var1[]=$devengado;
            $var1[]=$girado;
            $var1[]=$pagado;

            echo json_encode($var1);
        } else
        show_404();
    }

    function ConsolidadoAvanceFisicoFinan()
    {
        $anio=$this->input->POST('anio');
        $data=$this->Model_Dashboard_Reporte->ReporteConsolidadoAvanceFisicoFinan($anio);
        echo  json_encode($data);
    }

    public function _load_layout($template)
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view($template);
        $this->load->view('layout/Reportes/footer');
    }

}


