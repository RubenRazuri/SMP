<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_ModalidadE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          }


//--------------METODOS PARA EL MANTENIMIENTO DE MODALIDAD DE EJECUCION EJECUCION--------------------------------------------

    //AGREGAR UNA MODALIDAD DE EJECUCION
      function AddModalidadE($txt_NombreModalidadE,$txtArea_DescModalidadE)
        {
           $this->db->query("execute sp_ModalidadE_c'".$txt_NombreModalidadE."','".$txtArea_DescModalidadE."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN AGREGAR UNA MODALIDAD DE EJECUCION

    //LISTAR MODALIDAD DE EJECUCION
      function GetModalidadE()
        {
            $modalidade=$this->db->query("execute sp_ModalidadE_r"); //PROCEDIMIENTO DE LISTAR MODALIDAD DE EJECUCION
            if($modalidade->num_rows()>0)
             {
              return $modalidade->result();
             }else
             {
              return false;
             }
        } 
    //FIN LISTAR MODALIDAD DE EJECUCION

      //MODIFICAR DATOS DE MODALIDAD DE EJECUCION
         function UpdateModalidadE($id_modalidad_ejec,$nombre_modalidad_ejec,$desc_modalidad_ejec)
        {
           $this->db->query("execute sp_ModalidadE_u '".$id_modalidad_ejec."','".$nombre_modalidad_ejec."','".$desc_modalidad_ejec."' ");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN MODIFICAR DATOS DE MODALIDAD DE EJECUCION
//--------------FIN DE METODOS PARA EL MANTENIMIENTO DE MODALIDAD DE EJECUCION EJECUCION--------------------------------------------
}