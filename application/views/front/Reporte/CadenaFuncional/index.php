<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>REPORTE DE PIP POR FUNCIÓN</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
										<b>Cadena Funcional</b>
									</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="x_panel">
													<div class="clearfix">
														<div class="pull-right tableTools-container"></div>
													</div>
													<div class="x_content">
													<br>
														<div class="row">
															<div class="form-group">
										                       <label class="control-label col-md-2 col-sm-2 col-xs-12">Función: </label>
										                       <div class="col-md-4 col-sm-4 col-xs-12">
									                                <select id="listaFuncionC" name="listaFuncionC" class="selectpicker" data-live-search="true"  title="Seleccionar Función" onchange="">
									                                 </select>
									                            </div>
										                    </div>
										                    <div class="form-group">
										                        <label class="control-label col-md-2 col-sm-2 col-xs-12">División Funcional: </label>
										                        <div class="col-md-4 col-sm-4 col-xs-12">
										                          <select id="listaDivisionFuncional" name="listaDivisionFuncional" class="selectpicker" data-live-search="true"  title="Seleccionar División Funcional" onchange="">
									                              </select>
										                        </div>
										                    </div>
									                    </div> 
									                    <div class="row">
															<div class="form-group">
										                       <label class="control-label col-md-2 col-sm-2 col-xs-12">Grupo Funcional: </label>
										                        <div class="col-md-4 col-sm-4 col-xs-12">
										                          <select class="selectpicker" data-live-search="true" title="Seleccione Grupo Funcional">
										                            <option></option>
										                            <option value="AK">Alaska</option>
										                            <option value="HI">Hawaii</option>
										                          </select>
										                        </div>
										                    </div>
										                    <div class="form-group">
										                       <label class="control-label col-md-2 col-sm-2 col-xs-12">Provincia: </label>
										                        <div class="col-md-4 col-sm-4 col-xs-12">
										                          <select class="selectpicker" data-live-search="true" title="Seleccione Provincia">
										                            <option></option>
										                            <option value="AK">Alaska</option>
										                            <option value="HI">Hawaii</option>
										                          </select>
										                        </div>
										                    </div>
									                    </div> 
									                    <div class="row">
										                    <div class="form-group">
										                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Distrito: </label>
										                        <div class="col-md-4 col-sm-4 col-xs-12">
										                          <select class="selectpicker" data-live-search="true" title="Seleccione Distrito">
										                            <option></option>
										                            <option value="AK">Alaska</option>
										                            <option value="HI">Hawaii</option>
										                          </select>
										                        </div>
										                    </div>
									                    </div> 
									                    <br>
									                    <div class="row">
															<div class="form-group">
										                        <label class="control-label col-md-2 col-sm-2 col-xs-12">De:</label>
										                        <div class="col-md-3 col-sm-3 col-xs-12">
										                          <input type="date" class="form-control" placeholder="Default Input">
										                        </div>
										                    </div>
										                    <div class="form-group">
										                        <label class="control-label col-md-2 col-sm-2 col-xs-12">A:</label>
										                        <div class="col-md-3 col-sm-3 col-xs-12">
										                          <input type="date" class="form-control" placeholder="Default Input">
										                        </div>
										                    </div>
									                    </div>
									                    <br>

														<table id="dynamic-table"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<td>Función</td>
																	<td>División Funcional</td>
																	<td>Grupo Funcional</td>
																	<td>Número de Pip</td>
																	<td>Número de Beneficiarios</td>
																	<td>Costo</td>
																</tr>
															</thead>
															<!--<tbody>
															<?php foreach($listaProyectos as $item ) { ?>
															  	<tr>
																	<td>
																		<?=$item->nombre_funcion?>
															    	</td>
															    	<td>
																		<?=$item->CantidadPip?>
															    	</td>
															    	<td>
																		<?=$item->nombre_funcion?>
															    	</td>
															    	<td>
																		<?=$item->CantidadPip?>
															    	</td>		
															    	<td style="text-align:right">
																		S/. <?=$item->CostoPip?>
															    	</td>
															  </tr>
															<?php } ?>
															</tbody>-->
														</table>
														

													</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<script>

$(document).ready(function()
	{
		var myTable=$('#dynamic-table').DataTable(
		{
			"language":idioma_espanol,
            "searching": true,
             "info":     true,
            "paging":   true,
		});
			
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
			
			})
</script>
