<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Recurso extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function RecursoListar($flat)
    {
        $ListarRecurso=$this->db->query("execute sp_Gestionar_Recurso'".$flat."'");

        return $ListarRecurso->result();
    }

    function insertar($flat,$txtDescripcion)
    {
        $recurso=$this->db->query("execute sp_Gestionar_Recurso @Opcion='".$flat."',@desc_recurso='".$txtDescripcion."'");
        return true;
    } 

    function Recurso($id)
    {
        $recurso=$this->db->query("select * from ET_RECURSO where id_recurso='".$id."' ");

        return $recurso->result();
    }

    function editar($flat,$id, $txtDescripcion)
    {
        $recurso=$this->db->query("execute sp_Gestionar_Recurso  @Opcion='".$flat."',@id_recurso='".$id."',@desc_recurso='".$txtDescripcion."'");

        return true;
    }

    function RecursoPorDescripcion($descripcion)
    {
        $recurso=$this->db->query("select * from ET_RECURSO where replace(desc_recurso, ' ', '')=replace('".$descripcion."', ' ', '')");

        return $recurso->result();
    }

    function EtRecursoPorDescripcionDiffId($id, $descripcion)
    {
        $recurso=$this->db->query("select * from ET_RECURSO where id_recurso!='".$id."' and replace(desc_recurso, ' ', '')=replace('".$descripcion."', ' ', '')");

        return $recurso->result();
    }

}