<div class="right_col" role="main">
          <div class="">

<!--Inicio segundo panel General-->
      <div class="clearfix"></div>
        <div class="">
          <div class="col-md-12 col-sm-6 col-xs-12">
             <div class="x_panel">
             <!--inicio de pestaña configurtacion-->
                <div class="x_title">
                     <h2><b>INFORMACIÓN PRESUPUESTAL</b> </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                      <div class="clearfix"></div>
                </div>
              <!--final  de pestaña configurtacion-->
                       <div class="x_content">
                           <div class="" role="tabpanel" data-example-id="togglable-tabs">
                             <!-- Inicio Menus-->
                                <ul id="myTab" class="nav nav-tabs" role="tablist">

                                         <li role="presentation" class="active"><a href="#tab_FuenteFinanciamiento" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                         <b>Fuente de Financiamiento</b></a>
                                         </li>
                                        <li role="presentation" class=""><a  href="#tab_RubroEjecucion" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><b> Rubro de ejecucion</b></a>
                                        </li>
                                       
                                        <li role="presentation" class=""><a  href="#tab_ProgramaPresupuestal" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false"><b>Programa Presupuestal</b></a>
                                        </li>
                                </ul>
                              <!-- Fin Menus-->
                                      <div id="myTabContent" class="tab-content">

                                         <!-- /Inicio del Contenido de fuente de financiamiento -->
                                        <div role="tabpanel" <div role="tabpanel" class="tab-pane fade active in"  id="tab_FuenteFinanciamiento" aria-labelledby="profile-tab">
                                        <!-- /Inicio tabla de fuente financiamiento desde el row -->
                                           <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                <button type="button" id="btn-FuenteFinanciamiento" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegFuenteFinanciamiento" >
                                                         <span class="fa fa-plus-circle"></span> Nuevo
                                                    </button>
                                                    <div class="x_title">
                                                          <!--  <h2>Listado de  Fuente de Financiamiento<small>.</small></h2>-->
                                                          
   
                                                           <div class="clearfix"></div>
                                                      </div>
                                                      <!--inicio de la tabla fuente de financiamiento -->
                                                        <!--inicio  de icono de reporte -->
                                                        <div class="clearfix">
                                                           <div class=" pull-right tableTools-container-FuenteFinanciamiento">
                                                           </div>
                                                        </div>
                                                      <!--fin  de icono de reporte -->
                                                      <div class="x_content">
                                                                <table id="dynamic-table-FuenteFinanciamiento" class="table table-striped table-bordered table-hover" width="100%">
                                                                    <thead>
                                                                       <tr>
                                                                         <th class="center">
                                                                          <label class="pos-rel">
                                                                           <input type="checkbox" class="ace" />
                                                                           <span class="lbl"></span>
                                                                          </label>
                                                                         </th>
                                                                         <th>ID</th>
                                                                         <th>NOMBRE FFTO</th>
                                                                         <th >ACRONIMO FFTO</th>
                                                                         <th>ACCIONES</th>
                                                                      </tr>
                                                                   </thead>

                                                                </table>
                                                      </div>
                                                      <!--fin de la tabla fuente de finaciamiento -->
                                           </div>
                                              </div>
                                           </div>
                                        <!-- / fin tabla fuente de financiamiento desde el row -->
                                        </div>
                                        <!-- /fin del Contenido fuente de financiamiento -->

                                          <!-- /panel de rubro de ejecucion  -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_RubroEjecucion" aria-labelledby="home-tab">
                                             <!-- /tabla rubro de ejecucion row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraRubroEjecucion" ><span class="fa fa-plus-circle"></span> Nuevo</button>
                                                          <div class="x_title">

                                                            <div class="clearfix"></div>

                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-Rubro" class="table table-condensed table-striped table-bordered table-hover" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">ID</th>
                                                                  <th class="col-sm-1">FUENTE DE FINANCIAMIENTO</th>
                                                                  <th>NOMBRE RUBRO EJECUCION </th>
                                                                  <th class="col-sm-1">ACCIONES</th>
                                                                </tr>
                                                              </thead>


                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>

                                            </div>
                                         <!-- / fin tabla de rubro de jecucion desde el row -->
                                        </div>
                                           <!-- / fin panel de rubro de ejecucion desde el row -->

                        
                                             <!-- /panel de progrma presupuestal -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_ProgramaPresupuestal" aria-labelledby="home-tab">
                                             <!-- /tabla programa presupuestal row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraProgramaP" ><span class="fa fa-plus-circle"></span> Nuevo</button>
                                                          <div class="x_title">


                                                            <ul class="nav navbar-right panel_toolbox">

                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>

                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>

                                                            </ul>

                                                            <div class="clearfix"></div>

                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-ProgramaPresupuestal" class="table table-condensed table-striped table-bordered table-hover" width="100%">
                                                              <thead>
                                                                <tr>

                                                                  <th class="col-sm-1">ID</th>
                                                                  <th>CODIGO PRESUPUESTAL </th>
                                                                  <th>PROGRAMA PRESUPUESTAL </th>
                                                                  
                                                                  <th>ACCIONES</th>
                                                                </tr>
                                                              </thead>


                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>

                                            </div>
                                         <!-- / fin tabla de programa presupuestal desde el row -->
                                        </div>
                                           <!-- / fin panel de programa presupuestal
                                    </div>
                               </div>
                      </div>
             </div>
           </div>
          </div>
      <div class="clearfix"></div>
  <!--fin segundo panel General-->
        </div>
     </div>


<!-- /.ventana para registra una fuente finanaciamietno-->
<div class="modal fade" id="VentanaRegFuenteFinanciamiento" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Fuente Financiamiento</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-AddFuenteFinanciamiento"   action="<?php echo base_url(); ?>FuenteFinanciamiento/AddFuenteFinanciamiento" method="POST" >


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_ffto" name="txt_ffto" class="form-control col-md-7 col-xs-12"   placeholder="Nombre" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Acronimo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_AcronimoFuenteFinanciamiento" name="txt_AcronimoFuenteFinanciamiento" class="form-control col-md-7 col-xs-12"   placeholder="Acronimo " type="text">
                        </div>
                      </div>

                       <!-- <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox">Rubro<span class="required">*</span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxRubroEjecucion" name="cbxRubroEjecucion" class="selectpicker" data-live-search="true" required="required" title="Buscar Funcion...">
                              </select>
                          </div>
                       </div>-->
                        <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success" >
                          <span class="glyphicon glyphicon-floppy-disk"></span>
                           Guardar</button>
                          <button type="button" value="Borrar información"  class="btn btn-danger"  data-dismiss="modal"  >
                          <span class="glyphicon glyphicon-remove"></span>
                           Cancelar</button>

                        </div>
                      </div>
                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
       <div class="modal-footer">
          <center>*  Son campos obligatorios.</center>
        </div>
      </div>
    </div>
</div>
<!-- /.fin ventana para registra fuente financiamiento-->

<!-- /.ventana para modificar fuente de financimeito-->
<div class="modal fade" id="VentanaEditFuenteFinanciamiento" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Fuente Financiamiento</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-EditFuenteFinanciamiento"   action="<?php echo base_url(); ?>FuenteFinanciamiento/get_FuenteFinanciamiento" method="POST" >

               <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_IdFuenteFinanciamientoM" name="txt_IdFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre FFTO <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreFuenteFinanciamientoM" name="txt_NombreFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre " required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Acronimo FFTO <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_AcronimoFuenteFinanciamientoM" name="txt_AcronimoFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre " required="required" type="text">
                        </div>
                      </div>
<!--
                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox">Rubro<span class="required">*</span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxRubroEjecucionM" name="cbxRubroEjecucionM" required="required" class="selectpicker" data-live-search="true"  title="Buscar Funcion...">
                              </select>
                          </div>
                       </div>
-->
                           <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success" >
                          <span class="glyphicon glyphicon-floppy-disk"></span>
                           Guardar</button>
                          <button type="button" value="Borrar información"  class="btn btn-danger"  data-dismiss="modal"  >
                          <span class="glyphicon glyphicon-remove"></span>
                           Cancelar</button>

                        </div>
                      </div>
                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>
<!-- /.fin ventana para modificar fuente de financiamietno-->
<!-- /.ventana para registrar un rubro de ejecucion -->
<div class="modal fade" id="VentanaRegistraRubroEjecucion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Rubro de Ejecucion</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                  <form class="form-horizontal form-label-left" id="form-addRubroE" action="<?php echo base_url(); ?>MRubroEjecucion/AddRubroE" method="POST">
                      <div class="item form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-6">Seleccionar una fuente de financiamiento</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="listaFuenteFinanc" name="listaFuenteFinanc" class="selectpicker" data-live-search="true" title="Elegir Fuente Finan.">
  
                                 </select>
                            </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre rubro <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreRubroE" name="txt_NombreRubroE" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre rubro de ejecucion" required="required" type="text">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"> <span class="fa fa-save"></span> Guardar</button>
                          <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                        </div>
                      </div>
                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra un nuevo rubro de ejecucion-->


<!-- Ventana para modificar un rubro de ejecucion -->
<div class="modal fade" id="VentanaModificarRubroE" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Rubro de Ejecucion</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">

                <form class="form-horizontal " id="form-ActualizarRubroE" action="<?php echo base_url(); ?>MRubroEjecucion/UpdateRubroE" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre del rubro de ejecucion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_IdRubroEModif" type="hidden" name="txt_IdRubroEModif" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreRubroEU" name="txt_NombreRubroEU" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           <button  type="submit" class="btn btn-success" >
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button  data-dismiss="modal" class="btn btn-danger">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<!-- fin ventana para modificar un rubro de ejecucion -->

<!-- /.ventana para registrar programa presuuestal -->
<div class="modal fade" id="VentanaRegistraProgramaP" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar un nuevo programa presupuestal</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                  <form class="form-horizontal form-label-left" id="form-addProgramaP" action="<?php echo base_url(); ?>ProgramaPresupuestal/AddProgramaP" method="POST">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre programa presupuestal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreProgramaP" name="txt_NombreProgramaP" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre del programa presupuestal" required="required" type="text">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"> <span class="fa fa-save"></span> Guardar</button>
                           <button  data-dismiss="modal" class="btn btn-danger">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>
                        </div>
                      </div>
                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra un programa presupuestal-->



<!-- Ventana para modificar una meta presupuestal -->
<div class="modal fade" id="VentanaModificarProgramaP" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Programa Presupuestal</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">

                <form class="form-horizontal " id="form-ActualizarProgramaP" action="<?php echo base_url(); ?>ProgramaPresupuestal/UpdateProgramaP" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Programa presupuestal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_IdProgramaPModif" type="hidden" name="txt_IdProgramaPModif" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input id="txt_NombreProgramaPU" name="txt_NombreProgramaPU" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre de meta presupuestal" required="required" type="text">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           <button  type="submit" class="btn btn-success" >
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button  data-dismiss="modal" class="btn btn-danger">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<!-- fin ventana para modificar meta presupuestal-->
<script>
  $('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
  });
</script>
