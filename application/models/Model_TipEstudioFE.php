<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_TipEstudioFE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function GetTipEstudioFE()
        {
            $tipEstFE=$this->db->query("select * from TIPO_ESTUDIO");//listar funcion
            if($tipEstFE->num_rows()>=0)
             {
              return $tipEstFE->result();
             }else
             {
              return false;
             }

        }

         function AddTipoEstudioFE($txt_tipoEstudioFE)
        {
            $this->db->query("insert into TIPO_ESTUDIO(nombre_tipo_est) values ('$txt_tipoEstudioFE')");
            if ($this->db->affected_rows()> 0)
              {
                return true;
              }
              else
              {
                return false;
              }
        }
        function UpdateTipoEstudioFE($id_tipoEstudioFEModi,$txt_tipoEstudioFEModi){
            $this->db->query("update TIPO_ESTUDIO set nombre_tipo_est='$txt_tipoEstudioFEModi' where id_tipo_est='$id_tipoEstudioFEModi' ");
            if ($this->db->affected_rows()> 0)
              {
                return true;
              }
              else
              {
                return false;
              }
        }
        //fin funcion

        //fin division funciona
        //grupo funcional*/

}
