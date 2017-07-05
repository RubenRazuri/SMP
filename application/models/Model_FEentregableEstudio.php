<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_FEentregableEstudio extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function get_Entregables($txt_id_etapa_estudio)
        {
             //$id_estapa=3;
            //$Entregables=$this->db->query("execute sp_Entregables_r '".$id_estapa."' ");
            $Entregables=$this->db->query("execute sp_EntregableEstudio_r '".$txt_id_etapa_estudio."' ");
            if($Entregables->num_rows()>=0)
             {
              return $Entregables->result();
             }else
             {
              return false;
             }

        }

        function  get_entregableId($id_entregable){//traer el id de Estudio
           $Entregables=$this->db->query("SELECT id_entregable,valoracion,avance,id_etapa_estudio FROM ENTREGABLE_ESTUDIO where id_entregable='".$id_entregable."' ");
            if($Entregables->num_rows()>=0)
             {
              return $Entregables->result();
             }else
             {
              return false;
             }
        }
         //listar responsables de entregables
           function get_ResponsableEntregableE($id_entregable,$id_etapa_estudio){//traer el id de Estudio
           $Entregables=$this->db->query("select concat(nombres,' ',apellido_p,' ',apellido_m) as nombre,dni,fecha_asignacion_entregable,RP.id_entregable,EP.id_etapa_estudio
             from PERSONA p inner join RESPONSABLE_ENTREGABLE rp on p.id_persona=rp.id_persona inner join ENTREGABLE_ESTUDIO AS  ES  
             ON ES.id_entregable=RP.id_entregable INNER JOIN ETAPA_ESTUDIO EP ON EP.id_etapa_estudio=ES.id_etapa_estudio
             WHERE EP.id_etapa_estudio='".$id_etapa_estudio."' and ES.id_entregable='".$id_entregable."' ");
            if($Entregables->num_rows()>=0)
             {
              return $Entregables->result();
             }else
             {
              return false;
             }
        }
        
         //fin 



        function calcular_AvaceFisico($id_etapa_estudio){
            $Entregables=$this->db->query("SELECT id_entregable,valoracion,avance,id_etapa_estudio FROM ENTREGABLE_ESTUDIO where id_etapa_estudio='".$id_etapa_estudio."' ");

             $SumaAFisico=0;
             foreach ($Entregables->result_array() as $Entregables)
                {
                  $valoracion = $Entregables['valoracion'];
                  $avance     = $Entregables['avance'];
                  $SumaAFisico =(($valoracion*$avance)/100)+$SumaAFisico;
                }
               $this->db->query("UPDATE ETAPA_ESTUDIO  SET avance_fisico='".$SumaAFisico."' where id_etapa_estudio='".$id_etapa_estudio."' ");
              if($this->db->affected_rows()> 0)
                  {
                  return true;
                  }else
                  {
                  return false;
                  }


        }

        function Add_Entregable($opcion,$id_entregable,$txt_denominacion_entre,$id_etapa_estudio ,$txt_nombre_entre,$txt_valoracion_entre,$txt_avance_entre,$txt_observacio_entre,$txt_levantamintoO_entre)
        {

            $mensaje=$this->db->query("EXECUTE sp_Gestionar_Entregable_Estudio'".$opcion."','".$id_entregable."','". $txt_denominacion_entre."','".$id_etapa_estudio."','".$txt_nombre_entre."','".$txt_valoracion_entre."',".$txt_avance_entre.",'".$txt_observacio_entre."','".$txt_levantamintoO_entre."'");
            if($mensaje->num_rows()>0)
             {
              return $mensaje->result();
             }else
             {
              return $mensaje->result();
             }

        }
       function  UpdateEntregableAvance($sumaTotalAvance,$id_entregable)
        {
             $this->db->query("UPDATE ENTREGABLE_ESTUDIO  SET avance='".$sumaTotalAvance."' where id_entregable='".$id_entregable."' ");
            if($this->db->affected_rows() > 0)
             {
               return true;
             }else
             {
              return false;
             }

        }

        function AsignacionPersonalEntregable($Opcion,$txt_identregable,$txt_idPersona,$txt_AsigPersonalEntregable)//asignar responsable al entregable
        {

            $mensaje=$this->db->query("EXECUTE sp_Gestionar_Responsable_Entregable '".$Opcion."','".$txt_identregable."','".$txt_idPersona."','".$txt_AsigPersonalEntregable."' ");
            if($mensaje->num_rows()>0)
             {
              return $mensaje->result();
             }else
             {
              return $mensaje->result();
             }
        }

        function get_gantt()
        {

          $entregable=$this->db->query("select   ACTIVIDAD_CRONOGRAMA.id_act as id , CONCAT(UPPER(ENTREGABLE_ESTUDIO.nombre_entregable),': ',ACTIVIDAD_CRONOGRAMA.nombre_act)  'text',
          FORMAT (fecha_inicio,'dd-MM-yyyy')as 'start_date', (DATEDIFF(DAY, fecha_inicio,fecha_final)) 'duration'  , ENTREGABLE_ESTUDIO.id_entregable as parent, ENTREGABLE_ESTUDIO.avance AS progress
           from ENTREGABLE_ESTUDIO  inner join ACTIVIDAD_CRONOGRAMA ON ACTIVIDAD_CRONOGRAMA.id_entregable=ENTREGABLE_ESTUDIO.id_entregable");
            if ($this->db->affected_rows()>=0)
              {
                return $entregable->result();
              }
              else
              {
                return false;
              }
        }

}
