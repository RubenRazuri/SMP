<div class="right_col" role="main">
          <div class="">
       

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Brechas e Indicadores<small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                       
                                      <ul id="myTab" class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_ServicioPubAsoc"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>  Servicio Público Asociado</a>
                                        </li>
                                        <li role="presentation" class=""><a  href="#tab_brecha" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Brecha</a>
                                        </li>
                                        <li role="presentation" class=""><a  href="#tab_Indicador" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Indicador</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_ServicioPubAsoc" aria-labelledby="profile-tab">
                                             <!-- /tabla de eservicios publicos asociados desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraServicioAsociado" >
                                                            <span class="fa fa-plus-circle"></span>
                                                                Nuevo</button>

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
                                                            <table id="table-ServicioAsociado" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>ID</th>
                                                                  <th>SERVICIO PUBLICO ASOCIADO</th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                  </div>
                                                     
                                            </div>
                                         <!-- / fin tabla servicios publicos asociados el row --> 
                                        </div>
                                           <!-- /panel de brechas desde el row -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de brechas desde el row -->
                                        
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="btn-NuevaBrecha"  class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraBrecha"> <span class="glyphicon glyphicon-plus-sign"></span> Nuevo</button>
                                                        
                                                          <div class="x_content">
                                                            <table id="table-brecha" class="table table-condensed table-striped table-bordered table-hover" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">ID</th>
                                                                  <th class="col-sm-1">ID SERV</th>
                                                                  <th >NOMBRE SERVICIO</th>
                                                                  <th >BRECHA</th>
                                                                  <th >DESCRIPCION</th>
                                                                  <th class="col-sm-1"></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de brechas desde el row -->
                                        </div>
                                           <!-- / fin panel de brechas desde el row -->
                                          
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Indicador" aria-labelledby="profile-tab">
                                            <!-- / panel de indicador desde el row -->
                                             <div role="tabpanel" class="tab-pane fade active in" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de brechas desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-xs-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraIndicador"><span class="fa fa-plus-circle"></span> Nuevo </button>
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
                                                            <table id="table-Indicador" class="table table-striped table-bordered table-hover" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>ID</th>
                                                                  <th>NOMBRE DE INDICADOR</th>
                                                                  <th>DEFINICION INDICADOR</th>
                                                                  <th>UNIDAD DE MEDIDA</th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div> 
                                            </div>
                                         <!-- / fin tabla de indicador desde el row -->
                                        </div>
                                           <!-- / fin panel de indicador  -->

                                        </div>
                                            <!-- / panel de indicador brecha -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_BrechaIndicador" aria-labelledby="profile-tab">
                                            <!-- /tabla de brechas desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-xs-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="btn-NuevoBrechaIndicador" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraBrechaIndicador"><span class="fa fa-file-o"></span> BRECHA INDICADOR</button>
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
                                                            <table id="table-brechaindicador" class="table table-striped table-bordered table-hover" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>NOMBRE BRECHA</th>
                                                                  <th>NOMBRE INDICADOR</th>
                                                                  <th>FECHA INDICADOR</th>
                                                                  <th>VALOR INDICADOR</th>
                                                                  <th>LINEA DE BASE</th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de indicador desde el row -->
                                        </div>
                                              <!-- / panel de indicador brecha  -->
                        
                                      </div>
                                    </div>

                                  </div>
                                </div>
              </div>

             
          </div>
          <div class="clearfix"></div>
        </div>
     </div>
        
<!-- /.ventana para registra una nueva brecha -->			
<div class="modal fade" id="VentanaRegistraBrecha" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nueva Brecha</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                             
            <form class="form-horizontal " id="form-addBrecha" action="" method="POST" data-toggle="validator">
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Servicio publico asociado  </span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxServPubAsoc" name="cbxServPubAsoc"  class="selectpicker" data-live-search="true"  title="Seleccion servicio publico">
                             
                              </select>
                          </div>
                       </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de la brecha<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreBrecha" name="txt_NombreBrecha" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Nombre de la brecha" required="required" type="text" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txtArea_DescBrecha" name="txtArea_DescBrecha" placeholder="Descripcion" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                        
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  type="submit" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
                          <button  class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                            
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
<!-- /.fin ventana para registra una nueva brecha-->


<!-- Ventana para modificar una brecha -->
<div class="modal fade" id="VentanaModificarBrecha" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Brecha</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                
                <form class="form-horizontal " id="form-ActualizarBrecha" action="<?php echo  base_url();?>MantenimientoBrecha/UpdateBrecha" method="POST" >
                      <div class="form-group">
                             
                             <label class="control-label col-md-3 col-sm-3 col-xs-6">Servicio Publico Asociado</label> 

                              <div class="col-md-6 col-sm-9 col-xs-6">
                                  <select id="cbxSerPubAsocModificar" name="cbxSerPubAsocModificar" class="selectpicker" data-live-search="true">
    0
                                   </select>
                              </div>
                      </div> 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de la brecha<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_IdBrechaModif" type="hidden" name="txt_IdBrechaModif" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreBrechaU" name="txt_NombreBrechaU" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txtArea_DescBrechaU" name="txtArea_DescBrechaU" required="required" name="textarea" placeholder="Descripcion de la brecha" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           <button  type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="submit" class="btn btn-danger" data-dismiss="modal">
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

<!-- fin ventana para modificar una brecha -->

<!-- /.ventana para registra un indicador -->			
<div class="modal fade" id="VentanaRegistraIndicador" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Indicador</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                              <form class="form-horizontal form-label-left" id="form-addIndicador" action="<?php echo  base_url();?>Indicador/AddIndicador" method="POST"  >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Indicador<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreIndicador" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="txt_NombreIndicador" placeholder="Nombre indicador" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Definicion indicador<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txtArea_DefIndicador" required="required" name="txtArea_DefIndicador" placeholder="Definicion Indicador" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unidad medida <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_UnidadMedida" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="txt_UnidadMedida" placeholder="Unidad de medida" required="required" type="text">
                        </div>
                      </div>
    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                                                    <button id="send" type="submit" class="btn btn-success"><span class="fa fa-save"> </span>Guardar</button>
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
<!-- /.fin ventana para registra un indicador-->

<!-- Ventana para modificar un indicador -->
<div class="modal fade" id="VentanaModificarIndicador" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar un Indicador</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                
                <form class="form-horizontal " id="form-ActualizarIndicador" action="<?php echo  base_url();?>Indicador/UpdateIndicador" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre del Indicador<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_IdIndicadorModif" type="hidden" name="txt_IdIndicadorModif" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreIndicadorU" name="txt_NombreIndicadorU" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Definicion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txtArea_DefIndicadorU" name="txtArea_DefIndicadorU" required="required" name="textarea"  class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unidad de medida<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_UnidadMedidaU" name="txt_UnidadMedidaU" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="submit" data-dismiss="modal" class="btn btn-danger">
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

<!-- fin ventana para modificar un indicador -->


<!-- /.ventana para registra una nuevo servicio publico asociado-->     
<div class="modal fade" id="VentanaRegistraServicioAsociado" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Servicio Público Asociado</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO SERVICIO ASOCIADO-->
                <form class="form-horizontal form-label-left"  id="form-addServicioAsociado" action="<?php echo  base_url();?>MSectorEntidadSpu/AddServicioAsociado" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de Servicio Público Asociado <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <textarea id="textarea_servicio_publicoA"  name="textarea_servicio_publicoA" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre de Servicio Público Asociado" required="required" type="text"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="submit" class="btn btn-danger" data-dismiss="modal">
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
<!-- /.fin ventana para registra una nueva entidad-->
<!-- /.ventana para actualizar  servicio publico asociado-->     
<div class="modal fade" id="UpdateServicioAsociado" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar Servicio Público Asociado</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO SERVICIO ASOCIADO-->
                <form class="form-horizontal form-label-left"  id="form-UpdateServicioAsociado" action="<?php echo  base_url();?>MSectorEntidadSpu/UpdateServicioAsociado" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de Servicio Público Asociado <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="id_servicio_publicoA" name="id_servicio_publicoA" type="hidden">
                        <textarea id="textarea_servicio_publicoAA"  name="textarea_servicio_publicoAA" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre de Servicio Público Asociado" required="required" type="text"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">
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
<!-- /.fin ventana para actualizar un servicio publico asociado-->