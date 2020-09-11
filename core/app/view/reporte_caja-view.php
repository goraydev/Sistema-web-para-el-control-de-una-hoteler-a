<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">

<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>

<style type="text/css">
  table.dataTable thead .sorting:after {
    opacity: 0.0;
    content: "\e150";
}

table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after {
    opacity: 0.0;
}
</style>


<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Reportes</a></li>
      <li class="active">Reporte de caja</li>
    </ol>
</section> 
</div> 






<style type="text/css">
  
  .hh:hover{
    background-color: white;
  }
  .small-box-footer {
    position: relative;
    text-align: center;
    padding: 0px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.nav-tabs-custom>.nav-tabs>li>a {
    color: #3c8dbc;
    font-weight: bold;
    border-radius: 0 !important;
}
.nav-tabs-custom>.nav-tabs>li.active {
    border-top-color: #00a65a;
}
.h5, h5 {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>

 

<br>

<?php $cajas = CajaData::getAllAbierto(); 
      if(count($cajas)>0){ $id_caja=$cajas->id;
      }else{$id_caja=0;} 


if($id_caja!=0){
?>

<?php $caja_abierta=CajaData::getById($id_caja); ?>
<section class="tile tile-simple col-md-4">
        <div class="tile-widget dvd dvd-btm" style="text-align: center;">
            <h5 class="box-title"><b>REPORTE DE CAJA</b></h5>
             <!-- /.box-tools -->
        </div>
      <!-- /.box-header -->


            <!-- /.box-header -->
            <form method="post"  action="index.php?view=agregar_caja" id="addcaja">
              <div class="tile-body p-0" style="text-align: left;">

                

   
                <!-- INGRESOS -->
                                              <?php $montos_sin_cerrar = ProcesoData::getIngresoCaja($id_caja);
                                                    $total_sin_cerrar=0;
                                                    if(count($montos_sin_cerrar)>0){

                                                      foreach($montos_sin_cerrar as $monto_sin_cerrar):
                                                        $total_sin_cerrar=(($monto_sin_cerrar->precio*$monto_sin_cerrar->cant_noche)+$monto_sin_cerrar->total)+$total_sin_cerrar;
                                                      endforeach;

                                                    }
                                              ?> 


                                              <?php  
                                              if($id_caja!=0){ 
                                              $reporproducts = ProcesoVentaData::getIngresoCaja($id_caja);
                                              $subtotal3=0;
                                              if(count($reporproducts)>0){ ?>
                                                 <?php foreach($reporproducts as $reporproduct):?>
                                                      <?php $subtotal1=$reporproduct->cantidad*$reporproduct->precio; ?>
                                                  <?php $subtotal3=$subtotal1+$subtotal3; ?>
                                                  <?php endforeach; ?>
                                              <?php }else{$subtotal3=0;} ?>
                                              <?php }else{$subtotal3=0;} ?> 

                                              <!-- FIN INGRESOS -->




                                              <!-- EGRESOS -->

                                              <?php $montos_sin_cerrar_egresos = GastoData::getEgresoCaja($id_caja);
                                                    $total_sin_cerrar_egreso=0;
                                                    if(count($montos_sin_cerrar_egresos)>0){

                                                      foreach($montos_sin_cerrar_egresos as $montos_sin_cerrar_egreso):
                                                        $total_sin_cerrar_egreso=$montos_sin_cerrar_egreso->precio+$total_sin_cerrar_egreso;
                                                      endforeach;

                                                    } 
                                              ?>
 
                                              <?php $montos_sin_cerrar_sueldos = ProcesoSueldoData::getSueldoCaja($id_caja);
                                                    $total_sin_cerrar_sueldos=0;
                                                    if(count($montos_sin_cerrar_sueldos)>0){ 

                                                      foreach($montos_sin_cerrar_sueldos as $montos_sin_cerrar_sueldo):
                                                        $total_sin_cerrar_sueldos=$montos_sin_cerrar_sueldo->monto+$total_sin_cerrar_sueldos;
                                                      endforeach;

                                                    } 
                                              ?>


                                              <?php  
                                              if($id_caja!=0){ 
                                              $reporproducts_es = ProcesoVentaData::getEgresoCaja($id_caja);
                                              $subtotal4=0;
                                              if(count($reporproducts_es)>0){ ?>
                                                 <?php foreach($reporproducts_es as $reporproduct_e):?>
                                                      <?php $subtotal1=$reporproduct_e->cantidad*$reporproduct_e->precio; ?>
                                                  <?php $subtotal4=$subtotal1+$subtotal4; ?>
                                                  <?php endforeach; ?>
                                              <?php }else{$subtotal4=0;} ?>
                                              <?php }else{$subtotal4=0;} ?>


                                              
                                            <!-- Total egreso -->
                                            <?php $total_egreso=$total_sin_cerrar_egreso+$total_sin_cerrar_sueldos+$subtotal4; ?>
                                            <!-- Fin Total egreso -->

                                            <!-- Total ingreso -->
                                            <?php $total_ingreso=$total_sin_cerrar+$subtotal3; ?>
                                            <!-- Fin Total ingreso -->
                                            <?php ?>
                <table class="table mb-0">
                 
                  <tr>
                      <td><h5>FECHA:</h5></td>
                      <td><h5 class="control-label text-red"><?php echo $hoy; ?></h5></td>
                  </tr>
                   <tr>
                      <td><h5><br>Apertura caja:</h5></td>
                      <td>
                        <h5 class="control-label text-red"><br>$   <?php echo number_format($caja_abierta->monto_apertura,2,'.',','); ?></h5></td>
                  </tr>
                  <tr>
                      <td><h5><br>Alquiler habitación:</h5></td>
                      <td>
                        <h5 class="control-label text-red"><br>$   <?php echo number_format($total_sin_cerrar,2,'.',','); ?></h5></td>
                  </tr>
                  <tr>
                      <td><h5><br>Servicio habitación:</h5></td>
                      <td>
                        <h5 class="control-label text-red"><br>$   <?php echo number_format($subtotal3,2,'.',','); ?></h5></td>
                  </tr>
                  <tr>
                      <td><h5><br>Egresos:</h5></td>
                      <td>
                        <h5 class="control-label text-red"><br>$  <?php echo number_format($total_egreso,2,'.',','); ?></h5></td>
                  </tr>
                  <tr style="border-top: 2px solid #00a65a">
                      <td><h5><br>TOTAL:</h5></td>
                      <td>
                        <h5 class="control-label text-red"><br>$   <?php echo number_format($caja_abierta->monto_apertura+$total_ingreso-$total_egreso,2,'.',','); ?></h5></td>
                  </tr>
    
                </table>
 
              </div>

             

             

          </form>


</section>






<section>
<div class="row">

  <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" style="background-color: #d2d6de;">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tabla alquiler</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tabla servicio a la habitación</a></li>
              <li class="pull-right text-red"><a href="reporte/pdf/documentos/reporte_diario_caja.php" target="_blank" class="text-muted"><i class="fa fa-print"></i> IMPRIMIR</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php $reportediarios = ProcesoData::getIngresoCaja($id_caja);
                if(count($reportediarios)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: black; background-color: #d2d6de;">
                        <th>Nº</th> 
                        <th>Habitación</th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                        <th>Hora ingreso</th>
                        <th>Hora salida</th> 
                  </thead> 
                   <?php $numero=0;?>
                   <?php $total=0;?>
                   <?php foreach($reportediarios as $reportediario):?>
                   <?php $numero=$numero+1;?>
                      <tr>
                        <td><?php echo $numero; ?></td>
                        <td><?php echo $reportediario->getHabitacion()->nombre; ?></td>
                        <td><b>$    <?php echo number_format($reportediario->precio,2,'.',','); ?></b></td>
                        <td><b>$    <?php echo number_format($reportediario->cant_noche,2,'.',','); ?></b></td>
                        <?php $subtotal= ($reportediario->precio*$reportediario->cant_noche)+$reportediario->total ?>
                        <td>$    <?php echo number_format($subtotal,2,'.',','); ?></td>
                        <td><?php echo date($reportediario->fecha_entrada); ?></td>
                        <td><?php echo date($reportediario->fecha_salida); ?></td>
                      </tr> 
                            <?php $total=$subtotal+$total; ?>
                    <?php endforeach; ?>

                     <tfoot style="color: black; background-color: #e3e4e6;">
                        <th colspan="4"><p class="pull-right">Total</p></th>
                        <th><b>$    <?php echo number_format($total,2,'.',','); ?> </b></th> 
                        <th></th>
                        <th></th>
                    </tfoot>

                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <?php $reporproducts = ProcesoVentaData::getIngresoCaja($id_caja);
                if(count($reporproducts)>0){
                  // si hay usuarios 
                  ?>
                  <table  id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: black; background-color: #d2d6de;">
                        <th>Nº</th> 
                        <th>Habitación</th>
                        <th>Precio tarifa</th>
                        <th>Cantidad</th> 
                        <th>Precio unitario</th>
                        <th>Total</th>
                        <th>Hora </th> 
                  </thead>
                   <?php $numero=0;?>
                   <?php $subtotal2=0;?>
                   <?php foreach($reporproducts as $reporproduct):?>
                   <?php $numero=$numero+1;?>
                   <?php if($reporproduct->fecha_creada!=NULL){ ?>
                      <tr>
                        <td><?php echo $numero; ?></td>
                        <td><?php echo $reporproduct->getProceso()->getHabitacion()->nombre; ?></td>
                        <td><?php echo $reporproduct->getProducto()->nombre; ?></td>
                        <td><b><?php echo $reporproduct->cantidad; ?></b></td>
                        <td><b>$   <?php echo number_format($reporproduct->precio,2,'.',','); ?></b></td>
                        <?php $subtotal1=$reporproduct->cantidad*$reporproduct->precio; ?>
                        <td><b>$   <?php echo number_format($subtotal1,2,'.',','); ?></b></td>
                        <td><?php echo date($reporproduct->fecha_creada); ?></td>
                      </tr> 
                    <?php $subtotal2=$subtotal1+$subtotal2; ?>
                    <?php }; ?>
                    <?php endforeach; ?>

                    <tfoot style="color: black; background-color: #e3e4e6;">
                        <th colspan="5"><p class="pull-right">Total</p></th>
                        <th><b>$    <?php echo number_format($subtotal2,2,'.',','); ?></b> </th> 
                        <th></th>
                    </tfoot>

                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY NINGUNA VENTA HOY </h4>";

                };
                ?>
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

    </div>
</div>

</section>


<?php }else{
  echo "<p class='danger'>No tiene ninguna caja abierta</p>";
} ?>


       <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
        <script src="assets/js/main.js"></script>
         <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>  
