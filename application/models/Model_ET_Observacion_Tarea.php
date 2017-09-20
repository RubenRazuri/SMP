<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Observacion_Tarea extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($idTareaET, $idPerReq, $descObservacionTarea, $fechaObservacionTarea, $estadoObservacionTarea)
	{
		$this->db->query("exec sp_Gestionar_ETObservacionTarea @opcion='insertar', @idTareaET=$idTareaET, @idPerReq=$idPerReq, @descObservacionTarea='$descObservacionTarea', @fechaObservacionTarea='$fechaObservacionTarea', @estadoObservacionTarea=$estadoObservacionTarea");

		return true;
	}

	public function ultimoETObservacionTarea()
	{
		$data=$this->db->query("select * from ET_OBSERVACION_TAREA as ETOT inner join ET_PER_REQ as ETPR on ETOT.id_per_req=ETPR.id_per_req inner join PERSONA as P on ETPR.id_persona=P.id_persona inner join ESPECIALIDAD as E on ETPR.id_esp=E.id_esp  where ETOT.id_observacion_tarea=(select max(id_observacion_tarea) from ET_OBSERVACION_TAREA)");

		return count($data->result())==0 ? null : $data->result()[0];
	}
}