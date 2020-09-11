  
<?php 
date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d"); 
   $hora = date("H:i:s");
   $doce = date("12:00:00");

   $nuevafecha = strtotime ( '+1 day' , strtotime ( $hoy ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
?>
<style type="text/css">
.table > tbody > tr > td{
    padding: 0px !important;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate; 
    width: 100%;
} 
</style>  
 
<link rel="stylesheet" href="js/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script> 
  
<script type="text/javascript">
$(function() {
            $("#documento").autocomplete({
                source: "./?action=buscar_persona",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
          $('#documento').val(ui.item.documento); 
          $('#nombre').val(ui.item.nombre);
          $('#direccion').val(ui.item.direccion);
          $('#id').val(ui.item.id);
           }
            });
    }); 
</script>

<script type="text/javascript">
$(function() {
            $("#nombre").autocomplete({
                source: "./?action=buscar_persona_nombre",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
          $('#documento').val(ui.item.documento); 
          $('#nombre').val(ui.item.nombre);
          $('#direccion').val(ui.item.direccion);
          $('#id').val(ui.item.id);
           }
            });
    }); 
</script>

<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="index.php?view=recepcion">recepción</a></li>
      <li class="active">Procesar</li>
    </ol>
</section> 
</div> 

 <!-- row --> 
<div class="row"> 
  <!-- col -->
  <div class="col-md-12">
    <section class="tile"> 


      <?php if (isset($_GET['id_habitacion'])) { ?>
         <?php $habitacion = HabitacionData::getById($_GET['id_habitacion']);
                if(count($habitacion)>0){
                  // si hay habitacion
                  ?>
        <div class="tile-header dvd dvd-btm">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de la habitación</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <tbody style="padding: 0px;">
                  <tr style="padding: 0px;">
                    <td><h4 class="text-primary" style="margin-top: 0px !important;">Nombre:</h4></td>
                    <td><?php echo $habitacion->nombre; ?></td>
                    <td><h4 class="text-primary" style="margin-top: 0px !important;">Tipo:</h4></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $habitacion->getCategoria()->nombre; ?></div>
                    </td>
                  </tr>
                  <tr style="padding: 0px;">
                    <td><h4 class="text-primary" style="margin-top: 0px !important;">Detalles:</h4></td>
                    <td><?php echo $habitacion->descripcion; ?></td>
                    <td><h4 class="text-primary" style="margin-top: 0px !important;">Estado:</h4></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20"><span class="label label-success">DISPONIBLE</span></div>
                    </td>
                  </tr>

                  </tbody>
                </table>

              </div>
              <!-- /.table-responsive -->
            </div>

          </div>
          <!-- /.box -->
 
<!-- Modal -->
                   


<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addproceso" role="form">
        <div class="box box-info">

            <div class="box-body">
              <div class="table-responsive">

                <div class="col-md-6">
                <table class="table no-margin">
                  <tr>
                    <th colspan="4" style="text-align: center;">DATOS DEL CLIENTE  <div class="col-md-2">
                       
                     </div></th>
                  </tr>
                  <tbody style="padding: 0px;">


                    


                  <tr style="padding: 0px;">

                
                  <td colspan="2">
                     
                     









                    <div class="form-group">
                              
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-globe"></i> Tipo Documento:
                                </div>
                                <?php $tipo_documentos = TipoDocumentoData::getAll();?>
                                    <select name="tipo_documento" id="tipo_documento" required class="form-control">
                                    <?php foreach($tipo_documentos as $tipo_documento):?>
                                      <option value="<?php echo $tipo_documento->id;?>" ><?php echo $tipo_documento->nombre;?></option>
                                    <?php endforeach;?>
                                    </select>

                                <div class="input-group-addon">
                                  <i class="fa  fa-arrow-circle-o-right"></i> E-mail:
                                </div>
                                
                                <input type="text" class="form-control" name="documento" id="documento" required="required" placeholder="Ingrese e-mail para buscar">
                                <input type="hidden" id="id">
                                
                                
                               

                              </div>
                              <!-- /.input group -->
                            </div>
                             

                           

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   Nombres:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" name="nombre" id="nombre"  required placeholder="Ingrese nombres" >
                              </div>
                              <!-- /.input group -->
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   RFC:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" placeholder="Ingrese RFC" name="giro" id="giro"  required value="" >
                                <div class="input-group-addon">
                                   Teléfono:
                                </div>
                                <input type="text" class="form-control" placeholder="Ingrese teléfono" name="estado_civil" id="estado_civil"  required value="" >
                              </div>
                              <!-- /.input group -->
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   Razón social:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad"  required placeholder="Ingrese razon social" >
                              </div>
                              <!-- /.input group -->
                            </div>


                           
                           <!--
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   Profesión:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" name="ocupacion" id="ocupacion"  required placeholder="Ingrese ocupacion" >
                              </div>
                              
                            </div>
                          -->

                             
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  Procedencia:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" name="direccion" id="direccion"  placeholder="Ingrese procedencia (No es obligatorio)" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                              </div>
                              <!-- /.input group -->
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   Factura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" name="medio_transporte" id="medio_transporte"  required placeholder="Ingrese factura" >
                                <div class="input-group-addon">
                                   Folio de factura:
                                </div>
                                <input type="text" class="form-control" name="destino" id="destino"  required placeholder="Ingrese folio de factura " >
                              </div>
                              <!-- /.input group -->
                            </div>

                           

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   Nota:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" class="form-control" name="motivo" id="motivo"  required placeholder="Ingrese Nota" >
                              </div>
                              <!-- /.input group -->
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon">
                                   Toallas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <input type="text" placeholder="Cant. toallas" class="form-control" name="ocupacion" id="ocupacion"  required value="1" >
                              </div>
                              <!-- /.input group -->
                            </div>

                            <!-- /.FIN -->
                     

                    </div>
                     

                  </td>
                    
                  </tr>

                  
                  

                  </tbody>
                </table>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5">
                 <table class="table no-margin">
                 <thead>
                  <tr>
                    <th colspan="4" style="text-align: center;">DATOS DEL ALOJAMIENTO</th>
                  </tr>
                  </thead>
                  <tbody style="padding: 0px;">
                  
                                    <tr style="padding: 0px;">

                
      <td colspan="3">
       
              <!-- Date dd/mm/yyyy --> 
              <div class="form-group">
                <label>Tarifa:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-globe"></i>
                  </div> 
                  <select class="form-control" onchange="CargarTarifa(this.value);" required name="id_tarifa">
                    <?php $tarifas_ha = TarifaHabitacionData::getAllHabitacion($_GET['id_habitacion']);?>
                      <option value="">--- Selecciona ---</option>
                      <?php foreach($tarifas_ha as $tarifa_ha):?>
                        <option value="<?php echo $tarifa_ha->id;?>" ><?php echo $tarifa_ha->getTarifa()->nombre;?></option>
                      <?php endforeach;?> 
                    
                  </select> 
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group" id="mostrar_precio">
                
              </div>
 
              

              <div class="form-group">
                
                <div class="input-group">
                  <div class="input-group-addon">
                    Cant. de personas:
                  </div>
                  <select class="form-control" name="cantidad">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  
                </div>
                <!-- /.input group -->
              </div> 

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                   Estado de pago &nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <select class="form-control" name="pagado" onchange="MostrarSelectMedioPago(this.value);" required>
                    <option value="">--- Selecciona ---</option>
                    <option value="1">Pagado</option>
                    <option value="0">Falta pagar</option>
                  </select>
                </div>
                <!-- /.input group --> 
              </div>

              <!-- Date dd/mm/yyyy --> 
              <div class="form-group" id="mostrar_selectmediopago">
                
                <!-- /.input group -->
              </div> 

               <div class="form-group" id="mostrar_mediopago">
                
              </div>


              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                     Fecha salida&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <input type="text" class="form-control" name="fecha_salida" id="fecha_salida" value="<?php echo $nuevafecha; ?>" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  <div class="input-group-addon">
                    Hora salida
                  </div>
                  <input type="time" class="form-control" name="hora_salida" value="<?php echo $doce; ?>">
                </div>
                <!-- /.input group -->
              </div>

              
             
                 <div class="box-footer">
                <a href="index.php?view=recepcion" class="btn btn-danger">Cancelar</a>
                <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id; ?>">
                <button type="submit" class="btn btn-success pull-right">Registrar ingreso</button>
              </div>
             
</td>
                    
                  </tr>

                    

                  </tbody>
                </table>
              </div>

              </div>
              <!-- /.table-responsive -->
            </div>

          </div>

  </form>
          <!-- /.box -->

        <?php }else{ 
            echo"<h4 class='alert alert-success'>NO EXISTE ESTA HABITACIÓN</h4>";

         }; ?>



    <?php }else{ 
      echo"<h4 class='alert alert-success'>NO SE SELECCIONÓ HABITACIÓN</h4>";
    };?>

         
</section>

</div>
</div>
    



  <script>
  $( function() {
    $( "#fechamin" ).datepicker();
  } );
  </script>
  <script>
  $( function() {
    $( "#fechamax" ).datepicker();
  } );
  </script>
</head>
<body>
 


<script>
sumaFecha = function(d, fecha)
{
  var Fecha = new Date();
  var sFecha = fecha || (Fecha.getFullYear() + "-" + (Fecha.getMonth() +1) + "-" + Fecha.getDate());
  var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
  var aFecha = sFecha.split(sep);
  var fecha = aFecha[0]+'/'+aFecha[1]+'/'+aFecha[2];
  fecha= new Date(fecha);
  fecha.setDate(fecha.getDate()+parseInt(d));
  var anno=fecha.getFullYear();
  var mes= fecha.getMonth()+1;
  var dia= fecha.getDate();
  mes = (mes < 10) ? ("0" + mes) : mes;
  dia = (dia < 10) ? ("0" + dia) : dia;
  var fechaFinal = anno+sep+mes+sep+dia;
  return (fechaFinal);
}




function sumar() {

  m1 = document.getElementById("precio").value;
  m2 = document.getElementById("cant_noche").value;
  r = m1*m2;

  //alert(total);
  document.getElementById('spTotal').innerHTML = r;

  var fechamin = $("#fecha1").val()
  var fechaSumada = sumaFecha(m2,fechamin); /* Le sumas un dia */
  document.getElementById('fecha_salida').value = fechaSumada;

}


function CargarTarifa(val)
{
    $('#mostrar_precio').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=tarifa',
        data: 'id='+val,
        success: function(resp){
            $('#mostrar_precio').html(resp);
        }
    });
};

function CargarMediopago(val)
{
    $('#mostrar_mediopago').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=mediopago',
        data: 'id='+val,
        success: function(resp){
            $('#mostrar_mediopago').html(resp);
        }
    });
};

function MostrarDocumento(val)
{
    $('#mostrar_documento').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=documento',
        data: 'id='+val,
        success: function(resp){
            $('#mostrar_documento').html(resp);
        }
    }); 
}; 

function MostrarSelectMedioPago(val)
{
    $('#mostrar_selectmediopago').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=select_mediopago',
        data: 'id='+val,
        success: function(resp){
            $('#mostrar_selectmediopago').html(resp);
        }
    });
};


  
    
      
    
  

    
  </script>



