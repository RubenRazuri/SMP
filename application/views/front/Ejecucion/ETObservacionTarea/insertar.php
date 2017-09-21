<link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<div id="divObservacionTarea" style="height: 250px;overflow-y: scroll;">
	<table id="tableObservacionTarea" class="table table-striped">
		<tbody>
			<?php foreach($listaETObservacionTarea as $key => $value){ ?>
				<tr>
					<td style="padding: 2px;padding-top: 4px;width: 45px;">
						<img src="<?=base_url()?>assets/img/duda.jpg" height="45" width="45" style="background-color: #ffffff;border: 1px solid #cccccc;border-radius: 50px;">
					</td>
					<td style="padding: 4px;padding-left: 0px;">
						<b><?=html_escape($value->nombres.' '.$value->apellido_p.' '.$value->apellido_m)?> <small style="color: #999999;">(<?=html_escape($value->nombre_esp)?>)</small></b><br>
						<small><?=html_escape($value->desc_observacion_tarea)?></small>
						<div>
							<small>
								<?=count($value->childETArchivoObs)!=0 ? '<b>Archivos adjuntos: </b>' : ''?>
								<?php foreach($value->childETArchivoObs as $index => $item){ ?>
									<a href="#" onclick="window.location.href='<?=base_url()?>index.php/ET_Archivo_Obs/descargar/<?=$item->id_archivo_obs?>';"><?=html_escape($item->nombre_archivo)?></a><?=(count($value->childETArchivoObs)-1)!=$index ? ', ' : ''?>
								<?php } ?>
							</small>
						</div>
						<div style="color: #999999;font-size: 9px;text-align: right;">
							<a href="#" style="color: blue;font-size: 10px;" onclick="mostrarOcultarResponderObservacionTarea(<?=$value->id_observacion_tarea?>, true);">Responder</a> | <a href="#" style="color: red;font-size: 10px;" onclick="eliminarObservacionTarea(<?=$value->id_observacion_tarea?>, this);">Eliminar</a> | <?=$value->fecha_observacion_tarea?>
						</div>
						<div id="divResponderObservacionTarea<?=$value->id_observacion_tarea?>" style="display: none;padding-left: 35px;">
							<div class="col-md-12">
								<textarea id="txtDescLevObs<?=$value->id_observacion_tarea?>" rows="3" class="form-control" style="resize: none;" placeholder="Escribe una respuesta a esta observación."></textarea>
							</div>
							<div class="col-md-12" style="margin-top: 4px;">
								<div class="col-md-6"></div>
								<div class="col-md-6" style="text-align: right;">
									<input type="button" class="btn btn-danger" style="margin: 2px;" value="Cancelar" onclick="mostrarOcultarResponderObservacionTarea(<?=$value->id_observacion_tarea?>, false);">
									<input type="button" class="btn btn-success" style="margin: 2px;" value="Publicar observación" onclick="insertarLevantamientoObs(<?=$value->id_observacion_tarea?>);">
								</div>
							</div>
						</div>
						<table id="tableLevantamientoObs" style="width: 100%;">
							<tbody>
								<?php foreach($value->childETLevantamientoObs as $index => $item){ ?>
									<tr>
										<td style="padding: 4px;padding-left: 50px;">
											<b><?=html_escape($item->nombres.' '.$item->apellido_p.' '.$item->apellido_m)?> <small style="color: #999999;">(<?=html_escape($item->nombre_esp)?>)</small></b><br>
											<small><?=html_escape($item->desc_lev_obs)?></small>
											<div style="color: #999999;font-size: 9px;text-align: left;">
												<a href="#" style="color: red;font-size: 10px;" onclick="eliminarObservacionTarea(<?=$item->id_levantamiento_obs?>, this);">Eliminar</a> | <?=$item->fecha_lev_obs?>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<textarea id="txtDescripcionObservacionTarea" rows="3" class="form-control" style="resize: none;" placeholder="Escribe un observación con respecto a la actividad actualmente seleccionada."></textarea>
		</div>
		<div class="col-md-12" style="margin-top: 4px;">
			<input type="file" id="fileArchivosObservacionTarea" value="Publicar" multiple class="col-md-7">
			<div class="col-md-1"></div>
			<input type="button" class="btn btn-primary col-md-4" value="Publicar observación" onclick="insertarObservacionTarea();">
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>
<script>
	function insertarObservacionTarea()
	{
		if($('#txtDescripcionObservacionTarea').val().trim()=='')
		{
			swal(
			{
				title: '',
				text: 'Debe escribir un observación para publicarlo.',
				type: 'error'
			},
			function(){});

			return;
		}

		var dataAjax=new FormData();

		dataAjax.append('idTareaET', <?=$idTareaET?>);
		dataAjax.append('idET', <?=$idET?>);

		$.each($($('#fileArchivosObservacionTarea')[0]).get(0).files, function(key, value)
		{
			dataAjax.append('archivo'+key, value);
		});
		
		dataAjax.append('descObservacionTarea', $('#txtDescripcionObservacionTarea').val());

		$.ajax({
		    type: 'POST',
		    url: '<?=base_url()?>index.php/ET_Observacion_Tarea/insertar',
		    contentType: false,
		    processData: false,
		    data: dataAjax,
		    beforeSend: function(xhr)
		    {
		        renderLoading();
		    },
		    success: function(objectJSON)
		    {
		    	$('#txtDescripcionObservacionTarea').val(null);
		    	$('#fileArchivosObservacionTarea').val(null);

		    	$('#divModalCargaAjax').hide();

		    	objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error')
				},
				function(){});

				if(objectJSON.proceso=='Error')
				{
					return false;
				}

				var htmlArchivosTemp='';

				if(objectJSON.etObservacionTarea.childETArchivoObs.length!=0)
				{
					htmlArchivosTemp+='<div><small><b>Archivos adjuntos: </b>';
				}

				$.each(objectJSON.etObservacionTarea.childETArchivoObs, function(key, value)
				{
					htmlArchivosTemp+='<a href="#" onclick="window.location.href=\'<?=base_url()?>index.php/ET_Archivo_Obs/descargar/'+value.id_archivo_obs+'\';">'+replaceAll(replaceAll(value.nombre_archivo, '<', '&lt;'), '>', '&gt')+'</a>'+((objectJSON.etObservacionTarea.childETArchivoObs.length-1)!=key ? ', ' : '');
				});

				if(objectJSON.etObservacionTarea.childETArchivoObs.length!=0)
				{
					htmlArchivosTemp+='</small></div>';
				}

				var htmlTemp='<tr>'+
					'<td style="padding: 2px;padding-top: 4px;width: 45px;">'+
						'<img src="<?=base_url()?>assets/img/duda.jpg" height="45" width="45" style="background-color: #ffffff;border: 1px solid #cccccc;border-radius: 50px;">'+
					'</td>'+
					'<td style="padding: 4px;padding-left: 0px;">'+
						'<b>'+replaceAll(replaceAll((objectJSON.etObservacionTarea.nombres+' '+objectJSON.etObservacionTarea.apellido_p+' '+objectJSON.etObservacionTarea.apellido_m), '<', '&lt;'), '>', '&gt')+' <small style="color: #999999;">('+replaceAll(replaceAll(objectJSON.etObservacionTarea.nombre_esp, '<', '&lt;'), '>', '&gt')+')</small></b><br>'+
						'<small>'+objectJSON.etObservacionTarea.desc_observacion_tarea+'</small>'+
						htmlArchivosTemp+
						'<div style="color: #999999;font-size: 9px;text-align: right;">'+
							'<a href="#" style="color: red;font-size: 10px;" onclick="eliminarObservacionTarea('+objectJSON.etObservacionTarea.id_observacion_tarea+', this);">Eliminar</a> | '+objectJSON.etObservacionTarea.fecha_observacion_tarea+
						'</div>'+
					'</td>'+
				'</tr>';

				$('#tableObservacionTarea > tbody').append(htmlTemp);
				$('#txtDescripcionObservacionTarea').val(null);

				$('#divObservacionTarea').animate({ scrollTop :  $('#divObservacionTarea').scrollTop()+$('#divObservacionTarea')[0].scrollHeight }, 200);
		    }
		});
	}

	function eliminarObservacionTarea(idObservacionTarea, element)
	{
		if(confirm('¿Realmente desea eliminar esta observación?'))
		{
			paginaAjaxJSON({ idObservacionTarea : idObservacionTarea }, '<?=base_url()?>index.php/ET_Observacion_Tarea/eliminar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error')
				},
				function(){});

				if(objectJSON.proceso=='Error')
				{
					return false;
				}

				$(element).parent().parent().parent().remove();
			}, false, true);
		}
	}

	function mostrarOcultarResponderObservacionTarea(idObservacionTarea, boolResponder)
	{
		if(boolResponder)
		{
			$('#divResponderObservacionTarea'+idObservacionTarea).show();
		}
		else
		{
			$('#divResponderObservacionTarea'+idObservacionTarea).hide();
		}
	}

	function insertarLevantamientoObs(idObservacionTarea)
	{
		paginaAjaxJSON({ idTareaET : <?=$idTareaET?>, idObservacionTarea : idObservacionTarea, descLevObs : $('#txtDescLevObs'+idObservacionTarea).val().trim() }, '<?=base_url()?>index.php/ET_Levantamiento_Obs/insertar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error')
			},
			function(){});

			if(objectJSON.proceso=='Error')
			{
				return false;
			}

			
		}, false, true);
	}
</script>