<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Funcion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*añadir funcion*/
    function GetFuncion()
    {
        $funcion=$this->db->query("execute sp_Funcion_r");        
        return $funcion->result();
    }

    function GetDivisionFuncional($codigoFuncion)
    {
        $data=$this->db->query("select df.nombre_div_funcional from funcion f inner join DIVISION_FUNCIONAL df on df.id_funcion=f.id_funcion where df.id_funcion = $codigoFuncion");

        return $data->result();
    }

    function AddFucion($txt_codigofuncion,$txt_nombrefuncion)
    {
        $this->db->query("execute sp_Funcion_c '".$txt_codigofuncion."','".$txt_nombrefuncion."'");
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function UpdateFuncion($txt_IdfuncionM,$txt_codigofuncionM,$txt_nombrefuncionM)
    {
       $this->db->query("execute sp_Funcion_u'".$txt_IdfuncionM."','".$txt_codigofuncionM."','".$txt_nombrefuncionM."'");
        if ($this->db->affected_rows() > 0) 
          {
            return true;
          }
          else
          {
            return false;
          }

    }

    function FuncionPipListar()
    {
        $ListarFuncionPip=$this->db->query("select FUNCION.nombre_funcion ,count (nombre_pi)as CantidadPip, sum(costo_pi)as CostoPip from PROYECTO_INVERSION INNER JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN  DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional INNER JOIN FUNCION on DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion group by FUNCION.nombre_funcion");

        return $ListarFuncionPip->result();
    }
}