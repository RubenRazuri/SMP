 $(document).on("ready" ,function(){           
            //Inicio cargar combo unidad ejecutora
           //PARA LIMPIAR LOS DATOS DE LOS MODALES
                  //listar();

                /*$('.modal').on('hidden.bs.modal', function(){ 
                  $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
                  $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
                });*/
             //FIN PARA LIMPIAR LOS DATOS DE LOS MODALES
              
             
              $("#MostrarCarteraAnios").click(function(){
                  Aniocartera=$("#Aniocartera").val();
                  $('select[name=cbCartera]').val(Aniocartera);
                  $('select[name=cbCartera]').change();
                  $('.selectpicker').selectpicker('refresh'); 
              });


              $('#VentanaRegistraPIP').on('hidden.bs.modal', function () {
                  $(this).find("input,textarea,select").val('').end();

              });

            listaMontosTemporales();
            listaProyectoIprogramadoA();//para mostrar y actualizar
            var AnioCartera=$("#Aniocartera").val();
            if(AnioCartera=="")
            {
                cartera="2017";
                listaProyectoIprogramado(cartera);/*llamar proyecto de inversion programado*/
                
            }else
            {
                //alert(AnioCartera);
                cartera=AnioCartera;
                 $('#Aniocartera option:contains("2016")').attr('selected','selected');
                listaProyectoIprogramado(cartera);/*llamar proyecto de inversion programado*/  
            }

            $("#cbCartera").change(function(){
              var cartera=$("#cbCartera").val();
               listaProyectoIprogramado(cartera);/*llamar proyecto de inversion programado*/
            })
             ultimaProgramacion();
             $("#btn-siguiente").click(function()//para que cargue el como una vez echo click sino repetira datos
                    {
                    
                    //PARA OBTENER LOS DATOS Y GRABAR EN EL BOTON SIGUIENTE
                    var id_ue=$("#cbxUnidadEjecutora").val();
                    var id_naturaleza_inv=$("#cbxNatI").val();
                    var id_tipologia_inv=$("#cbxTipologiaInv").val();
                    var id_tipo_inversion=$("#cbxTipoInv").val();
                    var id_grupo_funcional_inv=$("#cbxGrupoFunc").val();
                    var id_nivel_gob=$("#cbxNivelGob").val();
                    var id_meta_pres=$("#cbxMetaPresupuestal").val();
                    var id_programa_pres=$("#cbxProgramaPres").val();
                    var codigo_unico_pi=$("#txtCodigoUnico").val();
                    var nombre_pi=$("#txtNombrePip").val();
                    var costo_pi=$("#txtCostoPip").val();
                    var devengado_ac_pi=$("#txtDevengado").val();
                    var distrito=$("#distritosM").val();
                    var id_estado_ciclo=$("#cbxEstadoCicloInv").val();
                    var id_fuente_finan=$("#cbxFuenteFinanc").val();
                    var id_modalidad_ejec=$("#cbxModalidadEjec").val();
                    GuardarProyectos(id_ue,id_naturaleza_inv,id_tipologia_inv,id_tipo_inversion,id_grupo_funcional_inv,id_nivel_gob,id_meta_pres,id_programa_pres,codigo_unico_pi,nombre_pi,costo_pi,devengado_ac_pi,distrito,id_estado_ciclo,id_fuente_finan,id_modalidad_ejec);
                    listaCarteraInversionFechaActual();//para llenar el combo de agregar division funcional  
                    listaBrechaProgramar();//Se lista la brecha para su programcion
                    listaUltimoProyectoInversion();

                    });

             $("#cbxBrechaP").change(function(){//para cargar en agregar division funcionañ
                   listarServicioPublico();
             });
           
               var listarServicioPublico=function()
                {
                    html="";
                    $("#cbxServicioP").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/ServicioPublico/GetServicioAsociado",
                        type:"POST",
                        success:function(respuesta){
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_serv_pub_asoc"]+"> "+ registros[i]["nombre_serv_pub_asoc"]+" </option>";   
                            };
                            $("#cbxServicioP").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
              //AGREGAR UNA PROGRAMACION
                $("#form-addProgramacion").submit(function(event)
                {
                    event.preventDefault();
                    $.ajax({
                        url:base_url+"index.php/Programacion/AddProgramacion",
                        type:$(this).attr('method'),
                        data:$(this).serialize(),
                        success:function(resp){
                        swal("REGISTRADO!", resp, "success");
                          //$('#table-brecha').dataTable()._fnAjaxUpdate();    //SIRVE PARA REFRESCAR LA TABLA 
                          $('#table-ProyectoInversionProgramado').dataTable()._fnAjaxUpdate();
                        }
                    });
                    $('#form-addProgramacion')[0].reset();
                    $('#VentanaRegistraPIP').modal("hide");
                    //$('#table-ProyectoInversionProgramado').dataTable()._fnAjaxUpdate();//programacion  
                   // location.reload(); RECARGAR
                    location.reload(true);  
                }); 
                //Actualizar programacion
   
                //FIN ACTUALIZAR PROGRAMACION   
             // TRAER DATOS DE LA CARTERA ACTUAL PARA SU PROGRAMACION

                var  listaCarteraInversionFechaActual=function()
                {
                    $.ajax({
                        "url":base_url +"index.php/CarteraInversion/GetCarteraInvFechAct",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              id_cartera=registros[i]["id_cartera"];
                              fechaActual=registros[i]["AnioActual"];
                              $("#textidCartera").val(id_cartera);
                             $("#txtCartera").val(fechaActual);
                              $("#AnioProgramado").val(fechaActual+suma);

                              $("#AnioProgramadoOpeMant").val(fechaActual+suma);
                              
                            };
                        }
                    });
                }

                //GUARDAR LOS MONTOS PROGRAMADOS EN UNA TABLA TEMPORAL
                $("#btn-GuardarMontoProgramado").click(function()
                {
                   var AnioProgramado=$("#AnioProgramado").val();
                   var txt_MontoProgramado=$("#txt_MontoProgramado").val();
                   var monto_opera_mant_prog='';
                   event.preventDefault(); 
                   $.ajax({
                           "url":base_url +"index.php/Programacion/AddProgramacionTemp",
                            type:"POST",
                            data:{AnioProgramado:AnioProgramado,txt_MontoProgramado:txt_MontoProgramado,monto_opera_mant_prog:monto_opera_mant_prog},
                            success:function(respuesta){
                              alert(respuesta); 
                              listaMontosTemporales();
    
                            }
                          });
                   
                  //$('#table-Programacion').dataTable()._fnAjaxUpdate();//para actualizar mi datatablet datatablet   funcion  

                });
          //FIN GUARDAR LOS MONTOS PROGRAMADOS EN UNA TABLA TEMPORAL 

             //GUARDAR LOS MONTOS PROGRAMADOS DE OPERACION Y MANTENIMIENTO EN UNA TABLA TEMPORAL
                $("#btn-GuardarMontoOperaMant").click(function()
                {
                   var AnioProgramadoOpeMant=$("#AnioProgramadoOpeMant").val();
                   var txt_MontoProgramado='';
                   var txt_MontoOperacionMante=$("#txt_MontoOperacionMante").val();
                  
                   event.preventDefault(); 
                   $.ajax({
                           "url":base_url +"index.php/Programacion/AddProgramacionOperMantTemp",
                            type:"POST",
                            data:{AnioProgramadoOpeMant:AnioProgramadoOpeMant,txt_MontoProgramado:txt_MontoProgramado,txt_MontoOperacionMante:txt_MontoOperacionMante},
                            success:function(respuesta){
                              alert(respuesta); 
                                listaMontosTemporales();
                            }
                          });
                });
          //FIN GUARDAR LOS MONTOS PROGRAMADOS DE OPERACION Y MANTENIMIENTO EN UNA TABLA TEMPORAL    
          // TRAER DATOS DEL ULTIMO PROYECTO DE INVERSION PARA SU PROGRAMACION
                var  listaUltimoProyectoInversion=function()
                {
                    $.ajax({
                        "url":base_url +"index.php/ProyectoInversion/GetProyectoInversionUltimo",
                        type:"POST",
                        success:function(respuesta){
                          // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              UltimoProyecto=registros[i]["nombre_pi"];
                              idpip=registros[i]["id_pi"];
                             $("#txtProyectoInversUlt").val(UltimoProyecto);
                             $("#textidpip").val(idpip);
                            };

                        }
                    });
                }
          //FIN TRAER DATOS DEL ULTIMO PROYECTO DE INVERSION PARA SU PROGRAMACION   */
			   //TRAER DATOS EN UN COMBO DE NATURALEZA DE INVERSION
           var listaBrechaProgramar=function()
                {
                    html="";
                    $("#cbxBrechaP").html(html); //nombre del selectpicker UNIDAD EJECUTORA
                    event.preventDefault(); 
                    $.ajax({
                        "url":base_url +"index.php/MantenimientoBrecha/GetBrecha",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              html +="<option value="+registros[i]["id_brecha"]+"> "+ registros[i]["nombre_brecha"]+" </option>";   
                            };
                            $("#cbxBrechaP").html(html);//
                            $('.selectpicker').selectpicker('refresh'); 
                        }
                    });
                }
          //FIN TRAER DATO

           $("#cbxEstadoCicloInv").change(function(){//para cargar en agregar division funcionañ
                    var opcion=$("#cbxEstadoCicloInv").val();
                    if(opcion<=5)
                    {
                      document.getElementById("btn-ProgramarOperacMante").disabled=true;
                      document.getElementById("btn-ProgramarMontos").disabled=false;

                    }
                    else
                    {
                       document.getElementById("btn-ProgramarOperacMante").disabled=false;
                       document.getElementById("btn-ProgramarMontos").disabled=true;

                    }
             });

           //AÑADIR 
 });

                var  ultimaProgramacion=function()
                {
                    $.ajax({
                        "url":base_url +"index.php/CarteraInversion/GetCarteraInvFechAct",
                        type:"POST",
                        success:function(respuesta){
                           // alert(respuesta);
                         var registros = eval(respuesta);
                            for (var i = 0; i <registros.length;i++) {
                              id_cartera=registros[i]["id_cartera"];
                              fechaActual=registros[i]["AnioActual"];
                              //para el control de la cabecera de la programacion y los años
                              $("#AnioProgramadoActual").html(fechaActual+1);
                              $("#AnioProgramadoActual1").html(fechaActual+2);
                              $("#AnioProgramadoActual2").html(fechaActual+2);

                              //monto para operacion y mantenimiento
                               $("#AnioProgramadoActualM").html(fechaActual+1);
                               $("#AnioProgramadoActualM1").html(fechaActual+2);
                               $("#AnioProgramadoActualM2").html(fechaActual+3);
                            };
                        }
                    });
                }

function  GuardarProyectos(id_ue,id_naturaleza_inv,id_tipologia_inv,id_tipo_inversion,id_grupo_funcional_inv,id_nivel_gob,id_meta_pres,id_programa_pres,codigo_unico_pi,nombre_pi,costo_pi,devengado_ac_pi,distrito,id_estado_ciclo,id_fuente_finan,id_modalidad_ejec){
   event.preventDefault();
    
    $.ajax({
    url:base_url+"index.php/ProyectoInversion/AddProyecto",
    type:"POST",
    data:{id_ue:id_ue,id_naturaleza_inv:id_naturaleza_inv,id_tipologia_inv:id_tipologia_inv,id_tipo_inversion:id_tipo_inversion,id_grupo_funcional_inv:id_grupo_funcional_inv,id_nivel_gob:id_nivel_gob,id_meta_pres:id_meta_pres,id_programa_pres:id_programa_pres,codigo_unico_pi:codigo_unico_pi,nombre_pi:nombre_pi,costo_pi:costo_pi,devengado_ac_pi:devengado_ac_pi,distrito:distrito,id_estado_ciclo:id_estado_ciclo,id_fuente_finan:id_fuente_finan,id_modalidad_ejec:id_modalidad_ejec},
    success:function(respuesta){
      
      alert(respuesta);
      var registros = eval(respuesta);
    }
  });
}
var suma=0;
var fechaActual="";
  var listaMontosTemporales=function()
  {
    html1="";
    $.ajax({
    "url":base_url+"index.php/Programacion/GetMontosTemporales",
     success:function(respuesta)
                      {
                         var registros = eval(respuesta);  
                          
                         html1+="<thead> <tr> <th  class='active'><h5>AÑO </h5></th> <th class='active'><h5>MONTOS PROGRAMADOS</h5></th><th colspan='12' class='active'><h5>MONTO OPERACIÓN MANTENIMIENTO</h5></th> </tr></thead>"
                         for (var i = 0; i <registros.length;i++) {
                              html1 +="<tbody> <tr><th>"+registros[i]["año_prog"]+"</th><th>"+registros[i]["monto_prog"]+"</th><th>"+registros[i]["monto_opera_mant_prog"]+"</th></tr>";    
                          //alert(suma);
                           };               
                             html1 +="</tbody>";
                         $("#table-Programacion").html(html1);
                         suma=suma+1;
                         if(suma<4){
                           $("#AnioProgramado").val(fechaActual+suma);
                           $("#AnioProgramadoOpeMant").val(fechaActual+suma);
                         }
                         else
                         {
                            document.getElementById("btn-GuardarMontoProgramado").disabled=true;
                         }           
                      }
                    });
  }
 var listaProyectoIprogramado=function(AnioCartera)
                {
                    $.fn.dataTable.ext.errMode = 'throw';
                    var table=$("#table-ProyectoInversionProgramado").DataTable({
                     "processing":true,
                      "scrollY": 350,
                      "scrollX": true,
                      "scrollCollapse": true,
                      "paging":         true,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/Programacion/GetProgramacion",
                                    "method":"POST",
                                     data:{"AnioCartera":AnioCartera},
                                    "dataSrc":"",
                                    },
                                "columns":[
                                    {"data":"id_pi","visible":false},
                                    {"data":"codigo_unico_pi",  
                                    "mRender": function ( data, type, full ) {
                                     return '<a style="font-weight:normal;font-size:15" type="button" class="Verdetalle btn btn-link" data-toggle="modal" data-target="#VerDetallehorizontal" href="/codigo_unico_pi/' + data + '">' + data+ '</a>';
                                      }
                                                  
                                    },
                                    {"data":"nombre_estado_ciclo"},
                                    {"data":"nombre_pi"},
                                    {"data":"prioridad_prog"},
                                    {"data":"nombre_brecha"},
                                    {"data":"Inv_2018"},
                                    {"data":"Inv_2019"},
                                    {"data":"Inv_2020"},

                                    {"data":"OyM_2018"},
                                    {"data":"OyM_2019"},
                                    {"data":"OyM_2020"},

                                    {"data":"nombre_tipo_inversion","visible":false},
                                    {"data":"nombre_tipologia_inv","visible":false},
                                    {"data":"nombre_naturaleza_inv","visible":false},
                                    {"data":"nombre_nivel_gob","visible":false},                                   
                                    {"data":"nombre_ue","visible":false},
                                    {"data":"provincias","visible":false},

                                    {"data":"distritos","visible":false},

                                    {"data":"nombre_funcion","visible":false},
                                    {"data":"nombre_div_funcional","visible":false},
                                    {"data":"nombre_grup_funcional","visible":false},

                                    {"data":"costo_pi","visible":false},
                                    {"data":"pim_meta_pres","visible":false},
                                    {"data":"nombre_serv_pub_asoc","visible":false},
                                    {"data":"nombre_brecha","visible":false},
                                    {"data":"nombre_programa_pres","visible":false},
                                    {"data":"fecha_registro_pi","visible":false},
                                    {"data":"fecha_viabilidad_pi","visible":false},

                                    {"defaultContent":"<button type='button' class='VerProyecto btn btn-success btn-xs' data-toggle='modal' data-target='#VerDetalleProyectoInversion'>Ver Ficha</button>"}

                                ],

                                "language":idioma_espanol

                                                                

                    });
                     /*setInterval( function () {
                                  table.ajax.reload( null, false ); // user paging is not reset on reload
                              }, 30000 ); */
                      /*$('#table-ProyectoInversionProgramado tbody').on('click', 'tr', function () {
                            var data = table.column(this).data();
                            var txt_IdfuncionM=data.codigo_unico_pi;
                            alert(txt_IdfuncionM);
                        } );*/

                     
                     ListaProyectoInversionData("#table-ProyectoInversionProgramado",table);  //obtener data de funcion para agregar  AGREGAR    
                     Listahorizontal("#table-ProyectoInversionProgramado",table);  //obtener data de funcion para agregar  AGREGAR 

                      $('a.toggle-visVer').on( 'click', function (e) 
                        {
                                e.preventDefault();
                                var column =table.column( $(this).attr('data-column'));
                                console.log(column);
                                column.visible(!column.visible() );
                                for (var i =8; i <= 35; i++) {
                                  table.column(i).visible( true );
                                }
                              

                         } );
                      $('a.toggle-visRestablecer').on( 'click', function (e) 
                        {
                                e.preventDefault();
                                var column =table.column( $(this).attr('data-column'));
                                console.log(column);
                                column.visible(!column.visible() );
                               for (var i =13; i <= 35; i++) {
                                  table.column(i).visible( false );
                                }
                         } ); 
                }
var listaProyectoIprogramadoA=function()//para actualizar programacion
                {
                    var table=$("#table-modificarprogramacion").DataTable({
                     "processing":true,
                     "serverSide":false,
                     destroy:true,
                         "ajax":{
                                    "url":base_url+"index.php/Programacion/GetProgramacionModificar",
                                    "method":"POST",
                                    "dataSrc":""
                                    },
                                "columns":[
                                     {"data":"id_prog"},
                                    {"data":"id_cartera","visible":false},
                                    {"data":"año_apertura_cartera"},
                                    {"data":"id_brecha","visible":false},
                                    {"data":"nombre_brecha"},
                                    {"data":"id_pi","visible":false},
                                    {"data":"nombre_pi"},
                                    {"data":"monto_prog"},
                                    {"data":"año_prog"},
                                    {"data":"prioridad_prog"},
                                    {"data":"monto_opera_mant_prog"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary btn-xs' data-toggle='modal' data-target='#ModificarProgramacion'>Editar</button>"}
                                ],

                                "language":idioma_espanol
                    }); 
               ActualizarProgramacionInversionData("#table-modificarprogramacion",table);  //ACTUALIZAR PROGRAMACION     
                

                
                }
                         
        /*fin listar proyecto de inversion  programado*/
                      var  ActualizarProgramacionInversionData=function(tbody,table){
                             $(tbody).on("click","button.editar",function(){
                              var data=table.row( $(this).parents("tr")).data();
                              var id_prog=$('#texIdeProyecto').val(data.id_prog);

                              var monto_prog=$('#txtMontoProgramado').val(data.monto_prog);
                              var AnioProgramado=$('#txtañoProgramado').val(data.año_prog);
                              var prioridad_prog=$('#txtPrioridad').val(data.prioridad_prog);
                              var monto_opera_mant_prog=$('#txtOperacioMantenimiento').val(data.monto_opera_mant_prog);
                              var tipo_prog=$('#txtTipoProgramacion').val(data.tipo_prog);

                              var año_apertura_cartera=data.año_apertura_cartera;
                              var id_brecha=data.id_brecha;
                             // console.log(data);
                             $("#txtCarteraM").val(año_apertura_cartera); //para asignar un valor
                          });
                      }

                    //para poder ver la programacion en horizontal programacion
                    var Listahorizontal=function(tbody,table){
                      
                       $(tbody).on("click","a.Verdetalle",function(){
                        var data=table.row( $(this).parents("tr")).data();
                        //var CodigoUnicoH=$("#CodigoUnicoH").val(data.codigo_unico_pi);
                         html="";
                         var progr = new Array();
                          progr.length=0;
                            $("#CodigoUnicoH").append("");
                            $("#CodigoUnicoH").append(data.codigo_unico_pi);
                            $("#nombre_estado_cicloH").append("");
                            $("#nombre_estado_cicloH").append(data.nombre_estado_ciclo);
                           
                              progr[0]=data.codigo_unico_pi;
                              progr[1]=data.nombre_tipo_inversion;
                              progr[2]=data.nombre_estado_ciclo;
                              progr[3]=data.nombre_tipologia_inv;
                              progr[4]=data.nombre_naturaleza_inv;
                              progr[5]=data.nombre_pi;
                              progr[6]=data.nombre_nivel_gob;
                              progr[7]=data.prioridad_prog;
                              progr[8]=data.nombre_ue;
                              progr[9]="Apúrimac";
                              progr[10]=data.provincias;
                              progr[11]=data.distritos;
                              progr[12]=data.nombre_funcion;
                              progr[13]=data.nombre_div_funcional;
                              progr[14]=data.costo_pi;
                              progr[15]="";
                              progr[16]="0.0";
                              progr[17]="";
                              progr[18]="";
                              progr[19]=data.nombre_serv_pub_asoc;
                              progr[20]=data.nombre_brecha;
                              progr[21]=data.nombre_programa_pres;
                              progr[22]=data.fecha_registro_pi;
                              progr[23]=data.fecha_viabilidad_pi;

                              progr[24]=data.Inv_2018;
                              progr[25]=data.Inv_2019;
                              progr[26]=data.Inv_2020;

                              progr[27]=data.OyM_2018;
                              progr[28]=data.OyM_2019;
                              progr[29]=data.OyM_2020;



                        //para ver yodo envio opcion 1
                          html+="<thead> <tr><th colspan='22'><center>Detalle</center></th> <th colspan='2'><center>Programación</center></th> <th colspan='3' ><center>Programación Del Monto de Inversión</center></th>  <th colspan='3'><center>Programación del Monto de Operación y Mantenimiento</center></th></tr>" 
                          html+="<tr> <th  class='active'><h6>Código Único </h6></th> <th class='active'><h6>Tipo De Inversión</h6></th><th class='active'><h6>Ciclo de Inversión</h6> </th><th class='active'><h6>Tipologia</h6></th> </th><th class='active'><h6>Naturaleza</h6></th> </th><th class='active'><h6>Inversión</h6></th> </th><th class='active'><h6>Nivel De Gobierno</h6></th> <th class='active'><h6>Prioridad</h6></th> <th class='active'><h6>U.Ejecutora</h6></th> <th class='active'><h6>Departamento</h6></th> <th class='active'><h6>Provicias</h6></th> <th class='active'><h6>Distritos</h6></th>  <th class='active'><h6>Función</h6></th><th class='active'><h6>Div.Funcional</h6></th> <th class='active'><h6>Costo Inversión</h6></th> <th class='active'><h6>Dev.Acum Año anterior</h6></th> <th class='active'><h6>PIM Año Actual</h6></th> <th class='active'><h6>Fuente Finan.</h6></th> <th class='active'><h6>Rubro</h6></th><th class='active'><h6>Servicio</h6></th> <th class='active'><h6>Brecha Asociada</h6></th> <th class='active'><h6>Programa Presup.</h6></th> <th class='active'><h6>Fecha Registro</h6></th> <th class='active'><h6>Fecha Viabilidad</h6></th><th class='active'><h6>2018</h6></th><th class='active'><h6>2019</h6></th><th class='active'><h6>2020</h6></th><th class='active'><h6>2018</h6></th><th class='active'><h6>2019</h6></th><th class='active'><h6>2020</h6></th></tr></thead>"
                          html+="<tbody><tr class='warning'>";
                          for (var i = 0; i<30; i++) {
                          html +="<td>"+progr[i]+"</td>";
                          };
                          html +="</tr></tbody></table>";
                          $("#DetalleProgramacionHori").html(html);





                    });//fin para poder ver la programacion horizontal

                }


                /*fin listar proyecto de inversion  programado*/
                var ListaProyectoInversionData=function(tbody,table){
                       $(tbody).on("click","button.VerProyecto",function(){
                            var progrVeProgramacion = new Array();
                             var progrVe = new Array();
                             html="";
                             progrVe.length=0;
                             progrVeProgramacion.length=0;
                        var data=table.row( $(this).parents("tr")).data();
                        var Id_ProyectoInver=data.id_pi;
                              
                            
                              progrVe[0]=data.codigo_unico_pi;
                              progrVe[1]=data.nombre_tipo_inversion;
                              progrVe[2]=data.nombre_estado_ciclo;
                              progrVe[3]=data.nombre_tipologia_inv;
                              progrVe[4]=data.nombre_naturaleza_inv;
                              progrVe[5]=data.nombre_pi;
                              progrVe[6]=data.nombre_nivel_gob;
                              progrVe[7]=data.prioridad_prog;
                              progrVe[8]=data.nombre_ue;
                              progrVe[9]="Apúrimac";
                              progrVe[10]=data.provincias;
                              progrVe[11]=data.distritos;
                              progrVe[12]=data.nombre_funcion;
                              progrVe[13]=data.nombre_div_funcional;
                              progrVe[14]=data.costo_pi;
                              progrVe[15]="";
                              progrVe[16]="0.0";
                              progrVe[17]="";
                              progrVe[18]="";
                              progrVe[19]=data.nombre_serv_pub_asoc;
                              progrVe[20]=data.nombre_brecha;
                              progrVe[21]=data.nombre_programa_pres;
                              progrVe[22]=data.fecha_registro_pi;
                              progrVe[23]=data.fecha_viabilidad_pi;


                              
                              progrVeProgramacion[24]=data.Inv_2018;
                              progrVeProgramacion[25]=data.Inv_2019;
                              progrVeProgramacion[26]=data.Inv_2020;

                              progrVeProgramacion[27]=data.OyM_2018;
                              progrVeProgramacion[28]=data.OyM_2019;
                              progrVeProgramacion[29]=data.OyM_2020;
                              progrVeProgramacion[30]=data.id_pi;

                               html+="<thead> <tr> <th colspan='12' class='active'><h5>DATOS DEL PROYECTOS DE INVERSIÓN</h5></th>  </tr></thead>"
                            for (var i = 0; i <1;i++) {
                              $("#CodigoProgramacion").val(progrVeProgramacion[30]); 
                              html +="<tbody> <tr><th class='success'> Código único </th><th  colspan='12'>"+progrVe[0]+"</th></tr> <tr><th class='success'>Nombre del proyeto</th><th  colspan='5'>"+progrVe[5]+"</th></tr>";    
                              html +="<tr><th class='success'>Fecha de registro</th><th  colspan='5'>"+progrVe[22]+"</th></tr> <tr><th class='success'>Fecha de viabilidad</th><th  colspan='5'>"+progrVe[23]+"</th></tr>";
                             //localizacion geografica
                              html+="<thead> <tr> <th colspan='12' class='active'>LOCALIZACIOÓN GEOGRAFICA DEL PROYECTO DE INVERSIÓN</th>  </tr></thead>";
                              html+="<thead> <tr> <th colspan='4' class='active'>DEPARTAMENTO</th> <th colspan='4' class='active'>PROVINCIA</h5></th><th colspan='4' class='active'><h5>DISTRITO</h5></th> </tr></thead>";

                              html +="<tr>";
                              html +="<th th  colspan='4'> "+progrVe[9]+"</th><th  colspan='4'>"+progrVe[10]+"</th><th  colspan='4'>"+progrVe[11]+"</th></tr> <tr>";
                              html +="</tr>";  

                              //META PRESUPUESTAL
                              html+="<thead> <tr> <th colspan='12' class='active'>META PRESUPUESTAL</th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre meta presupuestal</th><th  colspan='5'>"+""+"</th></tr> <tr>";
                              html +="<th class='success'>Año meta presupuestal</th><th colspan='5'>"+""+"</th></tr> <tr>";
                              html +="<th class='success'>PIM </th><th colspan='5'>"+""+"</th></tr> <tr>";
                              html +="<th class='success'>N° Meta </th><th colspan='5'>"+""+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN RESPONSABILIDAD FUNCIONAL
                              //TIPO DE INVERSIÓN
                              html+="<thead> <tr> <th colspan='12' class='active'>TIPO DE INVERSIÓN</th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre tipo inversion</th><th  colspan='5'>"+progrVe[3]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN TIPO DE INVERSIÓN
                              //TIPO DE INVERSIÓN
                              html+="<thead> <tr> <th colspan='12' class='active'>NIVEL  DE GOBIERNO</th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nivel de Gobierno</th><th  colspan='5'>"+""+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN TIPO DE INVERSIÓN
                              //MODALIDAD DE EJECUCION
                              html+="<thead> <tr> <th colspan='12' class='active'>MODALIDAD DE EJECUCIÓN</th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Modalidad Ejecucion</th><th  colspan='5'>"+""+"</th></tr> <tr>";
                              html +="<th class='success'>Fecha</th><th  colspan='5'>"+""+"</th></tr> <tr>";

                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION
                               //FUENTE DE FINANCIAMIENTO
                              html+="<thead> <tr> <th colspan='12' class='active'>FUENTE DE FINANCIAMIENTO</th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre fuente de financiamiento</th><th  colspan='5'>"+""+"</th></tr> <tr>";
                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION
                               //FUENTE DE FINANCIAMIENTO
                              html+="<thead> <tr> <th colspan='12' class='active'>FUENTE DE FINANCIAMIENTO</th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre fuente de financiamiento</th><th  colspan='5'>"+""+"</th></tr> <tr>";
                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION


                              html+="<thead> <tr> <th class='active' colspan='12'>NATURALEZA DE INVERSIÓN</th>   </tr></thead>";
                              html +="<tr><th class='success'>Naturaleza de Inversion</th><th  colspan='5'>"+progrVe[4]+"</th></tr> <tr></tr>"; 

                              //programacion
                              html+="<thead> <tr> <th colspan='12' class='active'><h5><center>PROGRAMACIÓN</center></h5></th>  </tr></thead>";
                              html+="<thead> <tr> <th colspan='4' class='active'><h5>2018</h5></th> <th colspan='4' class='active'><h5>2019</h5></th><th colspan='4' class='active'><h5>2020</h5></th> </tr></thead>";

                              html +="<tr>";
                              html +="<th th  colspan='4'> "+progrVeProgramacion[24]+"</th><th  colspan='4'>"+progrVeProgramacion[25]+"</th><th  colspan='4'>"+progrVeProgramacion[26]+"</th></tr> <tr>";
                              html +="<th th  colspan='4'> "+progrVeProgramacion[27]+"</th><th  colspan='4'>"+progrVeProgramacion[28]+"</th><th  colspan='4'>"+progrVeProgramacion[29]+"</th></tr> <tr>";

                              html +="</tr>"; 

                              //programacion

                              html +="</tbody>";
                             };
                             html +="</tbody>";        
                            $("#table-detalleProgramacion").html(html);

                                //para ver yodo envio opcion 1
                                 /* var opcion=2;//para que me muestre todos los registros 
                                 MostrarDetalleProyecto(Id_ProyectoInver,opcion);*/
                                /*var txt_codigofuncionM=$('#txt_codigofuncionM').val(data.codigo_funcion);
                                var txt_nombrefuncionM=$('#txt_nombrefuncionM').val(data.nombre_funcion);*/

                    });

                }
                var MostrarDetalleProyecto=function(Id_ProyectoInver,opcion){
                    event.preventDefault(); 
                    html="";
                    $("table-detalleProyectoInversion").html(html);
                    html1="";
                    $("table-detalleProyectoInversion").html(html1);
                    $.ajax({
                        "url":base_url +"index.php/Programacion/BuscarProyectoInversion",
                        type:"POST",
                        data:{Id_ProyectoInver:Id_ProyectoInver,opcion:opcion},
                        success:function(respuesta){
                            //alert(respuesta);
                         var registros = eval(respuesta);

                            html+="<thead> <tr> <th colspan='12' class='active'><h5>DATOS DEL PROYECTOS DE INVERSIÓN</h5></th>  </tr></thead>"
                            for (var i = 0; i <1;i++) {
                              $("#CodigoProgramacion").val(registros[i]['id_pi']); 
                              html +="<tbody> <tr><th class='success'> Código único </th><th  colspan='12'>"+registros[i]["codigo_unico_pi"]+"</th></tr> <tr><th class='success'>Nombre del proyeto</th><th  colspan='5'>"+registros[i]["nombre_pi"]+"</th></tr>";    
                              html +="<tr><th class='success'>Fecha de registro</th><th  colspan='5'>"+registros[i]["fecha_registro_pi"]+"</th></tr> <tr><th class='success'>Fecha de viabilidad</th><th  colspan='5'>"+registros[i]["fecha_viabilidad_pi"]+"</th></tr>";
                              
                              //localizacion geografica
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>LOCALIZACIOÓN GEOGRAFICA DEL PROYECTO DE INVERSIÓN</h5></th>  </tr></thead>";
                              html+="<thead> <tr> <th colspan='4' class='active'><h5>DEPARTAMENTO</h5></th> <th colspan='4' class='active'><h5>PROVINCIA</h5></th><th colspan='4' class='active'><h5>DISTRITO</h5></th> </tr></thead>";

                              html +="<tr>";
                              html +="<th th  colspan='4'> "+registros[i]["departamento"]+"</th><th  colspan='4'>"+registros[i]["provincia"]+"</th><th  colspan='4'>"+registros[i]["distrito"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN localizacon geografica
                              //RESPONSABILIDAD FUNCIONAL
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>RESPONSABILIDAD FUNCIONAL DEL PROGRAMA DE INVERSIÓN</h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Función</th><th  colspan='5'>"+registros[i]["codigo_funcion"]+":"+registros[i]["nombre_funcion"]+"</th></tr> <tr>";
                              html +="<th class='success'>Division Funcional</th><th colspan='5'>"+registros[i]["codigo_div_funcional"]+"</th></tr> <tr>";
                              html +="<th class='success'>Grupo Funcional</th><th colspan='5'>"+registros[i]["codigo_grup_funcional"]+":"+registros[i]["nombre_grup_funcional"]+"</th></tr> <tr>";
                              html +="<th class='success'>Sector</th><th colspan='5'>"+registros[i]["nombre_sector"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN RESPONSABILIDAD FUNCIONAL
                              //META PRESUPUESTAL
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>META PRESUPUESTAL<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre meta presupuestal</th><th  colspan='5'>"+registros[i]["nombre_meta_pres"]+"</th></tr> <tr>";
                              html +="<th class='success'>Año meta presupuestal</th><th colspan='5'>"+registros[i]["año_meta_pres"]+"</th></tr> <tr>";
                              html +="<th class='success'>PIM </th><th colspan='5'>"+registros[i]["pim_meta_pres"]+"</th></tr> <tr>";
                              html +="<th class='success'>N° Meta </th><th colspan='5'>"+registros[i]["numero_meta_pres"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN RESPONSABILIDAD FUNCIONAL
                               //UNIDAD EJECUTORA
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>UNIDAD EJECUTORA<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre Unidad ejecutora</th><th  colspan='5'>"+registros[i]["nombre_ue"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN UNIDAD EJECUTORA
                              //TIPO DE INVERSIÓN
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>TIPO DE INVERSIÓN<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre tipo inversion</th><th  colspan='5'>"+registros[i]["nombre_tipo_inversion"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN TIPO DE INVERSIÓN
                              //TIPO DE INVERSIÓN
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>NIVEL  DE GOBIERNO<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nivel de Gobierno</th><th  colspan='5'>"+registros[i]["nombre_nivel_gob"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //FIN TIPO DE INVERSIÓN

                              //MODALIDAD DE EJECUCION
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>MODALIDAD DE EJECUCIÓN<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Modalidad Ejecucion</th><th  colspan='5'>"+registros[i]["nombre_modalidad_ejec"]+"</th></tr> <tr>";
                              html +="<th class='success'>Fecha</th><th  colspan='5'>"+registros[i]["fecha_modalidad_ejec_pi"]+"</th></tr> <tr>";

                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION
                              //FUENTE DE FINANCIAMIENTO
                              html+="<thead> <tr> <th colspan='12' class='active'><h5>FUENTE DE FINANCIAMIENTO<h5></th>  </tr></thead>";
                              html +="<tr>";
                              html +="<th class='success'>Nombre fuente de financiamiento</th><th  colspan='5'>"+registros[i]["nombre_fuente_finan"]+"</th></tr> <tr>";
                              html +="</tr>";  
                              //MODALIDAD DE EJECUCION


                              html+="<thead> <tr> <th class='active' colspan='12'>NATURALEZA DE INVERSIÓN</th>   </tr></thead>";
                              html +="<tr><th class='success'>Naturaleza de Inversion</th><th  colspan='5'>"+registros[i]["nombre_naturaleza_inv"]+"</th></tr> <tr></tr>";  

                              html +="</tbody>";
                            };    
                            $("#table-detalleProyectoInversion").html(html);

                            /*programacion*/
                            
                             html1 +="<div class='row'>";
                            for (var i = 0; i <registros.length;i++) {
                              //PROGRAMACION
                                      if(i==0){
                                           html1+="<div class='col-sm-4' style='background-color:lavender;'>"+registros[i]["año_prog"]+"</div>";
                                      }
                                      if(i==2){
                                        html1 +="<div class='col-sm-4'  style='background-color:lavender;'>"+registros[i]["año_prog"]+"</div>";
                                      }
                                      if(i==2){
                                        html1 +="<div class='col-sm-4' style='background-color:lavender;'>"+registros[i]["año_prog"]+"</div>";
                                      }
                              //FIN PROGRAMACION   
                            }; 
                             for (var i = 0; i <registros.length;i++){
                              //PROGRAMACION
                                      if(i==0){
                                           html1 +="<div class='col-sm-4'>"+registros[i]["monto_prog"]+"</div>";
                                      }
                                      if(i==1){
                                        html1 +="<div class='col-sm-4'>"+registros[i]["monto_prog"]+"</div>";
                                      }
                                      if(i==2){
                                        html1 +="<div class='col-sm-4'>"+registros[i]["monto_prog"]+"</div>";
                                      }
                              //FIN PROGRAMACION   
                            };   
                             html1 +="</div>"; 
                             html1 +="</tbody>";        
                            $("#table-detalleProgramacion").html(html1);


                        }
                    });

                }
			   
 /*function listar()
          {
            event.preventDefault();
            $.ajax({
              "url":base_url+"index.php/Programacion/GetProgramacion",
              type:"POST",
              success:function(respuesta){
                console.log(respuesta);
              }
            });
          }*/
               
       