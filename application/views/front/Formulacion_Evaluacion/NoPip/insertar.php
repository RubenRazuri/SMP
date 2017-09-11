<form class="form-horizontal" id="form-addNoPip" action="<?=base_url();?>index.php/NoPipProgramados/insertar" method="POST" enctype="multipart/form-data">
 <div class="form-horizontal">
		<div class="row" style="text-align: center;">

				
				<div class="col-md-12 col-sm-12 col-xs-12">
						<label> Tipo No PI &nbsp; </label>	
						<select id="TipoNoPip" name="TipoNoPip" class="selectpicker" onclick="BuscarNoPIP();" data-width="50%" data-live-search="true"  title="Buscar Tipo no pip...">
							<?php  foreach ($ListarPipProgramados as  $item) {?>
									<option value="<?= $item->desc_tipo_nopip?>"> <?= $item->desc_tipo_nopip; ?></option>
							<?php } ?>
						</select>
				</div>
		</div><br/>
		<div class="row" style="text-align: center;">
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<label> No PIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>	
					<select id="ListadoFiltroNoPIP"  name="ListadoFiltroNoPIP" data-width="50%"   class="selectpicker"  data-live-search="true"  title="Buscar no pip...">
							
					</select>
				</div>
		</div><br/>
		<div class="row" style="text-align: left;margin-left: 10px;">
				<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOMRE  </label>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<input type="text" name="txtnombreNoPip" id="txtnombreNoPip" class="form-control col-md-7 col-xs-12" >
				</div>
		</div></br>
		<div class="row">
					 	<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 10px;">
                           	 	<label class="control-label">Nombre Documento</label>
                            	<input type="text" id="txtNombreDocumento" name="txtNombreDocumento" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
		</div></br>
		<div class="row">
					 	<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 10px;">
                           	 	<label class="control-label">Descripción Documento</label>
                            	<input type="text" id="txtDescripcionDocumento" name="txtDescripcionDocumento" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
		</div></br>
		<div class="row">
					 	<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-12" style="position: left">
                            	<input type="text" id="nombreUrlDocumento" name="nombreUrlDocumento">
                           	 	<label class="control-label">Subir Documento No PIP</label>
                            	<input type="file" id="Documento_noPip" name="Documento_noPip">
                            </div>
                        </div>
		</div>
		

		<hr style="margin-top: 4px;">
		<div class="row" style="text-align: right;">
				<button type="submit"  id="btnEnviarFormulario" class="btn btn-success">Guardar </button>

				<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</div>	
</form>

<script>
	$(document).ready(function() 
	{
 		 $('.selectpicker').selectpicker({
		  
		  });
 		 $("#TipoNoPip").change(function()
 		 {
	 		 var html='';
	 		 $("#ListadoFiltroNoPIP").html(html);
	 		 var desc_tipo_nopip =$("#TipoNoPip").val();
	 		 $.ajax({ url:base_url+"index.php/NoPipProgramados/listarNopip",type:"POST",data:{desc_tipo_nopip:desc_tipo_nopip},success:function(respuesta)
	                {
                    	console.log(respuesta);
                    	var registros = eval(respuesta);
                        for (var i = 0; i <registros.length;i++) 
                        {
                          html +="<option  value='"+registros[i]["id_pi"]+'_'+registros[i]["nombre_pi"]+"'> "+registros[i]["nombre_pi"]+" </option>";
                        };
                        $("#ListadoFiltroNoPIP").html(html);
                        $('select[name=ListadoFiltroNoPIP]').change();//borrado
                        $('.selectpicker').selectpicker('refresh');  
	                }
	            });
 		 });

 		$("#ListadoFiltroNoPIP").change(function()
 		 {
		  	var desc_tipo_nopip =$("#ListadoFiltroNoPIP").val().split('_')[1];
	 		$("#txtnombreNoPip").val(desc_tipo_nopip);
		});
 		

 		$('#btnEnviarFormulario').on('click', function(event)
		{
			var Documento_noPip =document.getElementById('Documento_noPip').files[0].name;//$("#urlDocumentoObservacion").val();
            var url=getFileExtension(Documento_noPip);
            $("#nombreUrlDocumento").val(url);
		});

		function getFileExtension(filename)
	    {

			return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);

		}
	 		 
			 
	});
</script>


