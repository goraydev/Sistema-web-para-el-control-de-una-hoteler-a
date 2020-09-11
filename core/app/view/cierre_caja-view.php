
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">

<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");

             $u=null;
                $u = UserData::getById(Session::getUID());
                $usuario = $u->is_admin;
                $id_usuario = $u->id;

   $hora = date("H:i:s");
  $fecha_completo = date("Y-m-d H:i:s");   
             
  ?>

 
<?php $caja_abierta = CajaData::getCierreCaja(); ?>
<section class="tile tile-simple col-md-4 col-md-offset-4">
            <?php if(count($caja_abierta)>0){?>
            <div class="tile-widget dvd dvd-btm" style="text-align: center;">
              <h3 class="box-title">CIERRE DE CAJA</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form method="post"  action="index.php?view=addcierre_caja">
              <div class="tile-body p-0" style="text-align: left;">

                <table>
                  <th style="width: 50%;"></th>
                  <th style="width: 45%;"></th>
                  <tr>
                      <td><h5>FECHA CIERRE:</h5></td>
                      <td><h5 class="control-label text-red"><?php echo $hoy.' '. $hora; ?></h5></td>
                  </tr>

                  

                   <!-- INGRESOS -->
                                              <?php $montos_sin_cerrar = ProcesoData::getIngresoCaja($caja_abierta->id);
                                                    $total_sin_cerrar=0;
                                                    if(count($montos_sin_cerrar)>0){

                                                      foreach($montos_sin_cerrar as $monto_sin_cerrar):
                                                        $total_sin_cerrar=(($monto_sin_cerrar->precio*$monto_sin_cerrar->cant_noche)+$monto_sin_cerrar->total)+$total_sin_cerrar;
                                                      endforeach;

                                                    }
                                              ?> 


                                              <?php  
                                              if($caja_abierta->id!=0){ 
                                              $reporproducts = ProcesoVentaData::getIngresoCaja($caja_abierta->id);
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

                                              <?php $montos_sin_cerrar_egresos = GastoData::getEgresoCaja($caja_abierta->id);
                                                    $total_sin_cerrar_egreso=0;
                                                    if(count($montos_sin_cerrar_egresos)>0){

                                                      foreach($montos_sin_cerrar_egresos as $montos_sin_cerrar_egreso):
                                                        $total_sin_cerrar_egreso=$montos_sin_cerrar_egreso->precio+$total_sin_cerrar_egreso;
                                                      endforeach;

                                                    } 
                                              ?>

                                              <?php $montos_sin_cerrar_sueldos = ProcesoSueldoData::getSueldoCaja($caja_abierta->id);
                                                    $total_sin_cerrar_sueldos=0;
                                                    if(count($montos_sin_cerrar_sueldos)>0){ 

                                                      foreach($montos_sin_cerrar_sueldos as $montos_sin_cerrar_sueldo):
                                                        $total_sin_cerrar_sueldos=$montos_sin_cerrar_sueldo->monto+$total_sin_cerrar_sueldos;
                                                      endforeach;

                                                    } 
                                              ?>


                                              <?php  
                                              if($caja_abierta->id!=0){ 
                                              $reporproducts_es = ProcesoVentaData::getEgresoCaja($caja_abierta->id);
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
                  <tr>
                      <td><h5>MONTO CIERRE: $  </h5></td>
                      <td>
                        <input type="text" name="monto_apertura" required class="form-control text-red" placeholder="Ingrese monto" style="border-color: #dd4b47;" value="<?php echo number_format($caja_abierta->monto_apertura+$total_ingreso-$total_egreso,2,'.',','); ?>">
                      </td>
                  </tr>
                </table>
 
              </div>

            

              <!-- tile footer -->
              <div class="tile-footer dvd dvd-top">

                  <div class="input-group">
                      <input type="hidden" name="fecha_apertura" value="<?php echo $caja_abierta->fecha_apertura; ?>">
                      <input type="hidden" name="fecha_cierre" value="<?php echo $fecha_completo; ?>">
                      <input type="hidden" name="monto_apertura" value="<?php echo $caja_abierta->monto_apertura; ?>">
                      <input type="hidden" name="monto_cierre" value="<?php echo ($total_sin_cerrar+$subtotal3)-$total_sin_cerrar_egreso; ?>">
                      <input type="hidden" name="id_caja" value="<?php echo $caja_abierta->id; ?>">
                      <?php if($_SESSION['user_id']==$caja_abierta->id_usuario){ ?>
                      <input type="submit" class="btn btn-sm btn-warning btn-flat pull-right" value="Cerrar caja" >
                      <?php }else{ echo "<h2>No tienes acceso a cerra la caja</h2>";} ?>
                  </div>

              </div>
              <!-- /tile footer -->

          </form>
          <?php }else{ ?>
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">NO HAY NINGÚN CAJA QUE CERRAR</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
          
              <div class="box-body" style="text-align: left;">

                
 
              </div> 
          <?php }; ?>


</section>


 

<?php $cajas = CajaData::getAll(); ?>



<!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>LISTA DE CAJAS </strong> (ABIERTAS Y CERRADAS)</h1>
        
      </div>
      <!-- tile body -->
      <div class="tile-body">
        
         <?php if(count($cajas)>0){?>
              <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 12px;">
                <thead style="color: white; background-color: #827e7e;">
                  <th>USUARIO APERTURA</th>
                  <th>FECHA APERTURA</th>
                  <th>MONTO APERTURA</th>
                  <th>FECHA CIERRE</th>
                  <th>MONTO CIERRE</th>
                  <th>ESTADO CAJA</th>
                  <th>VOLVER A IMPRIMIR</th>
                </thead>
                
               <?php foreach($cajas as $caja):?>
              <tr>
                <td><?php if($caja->id_usuario!=null){echo $caja->getUsuario()->name;}else{ echo "<center>----</center>"; }  ?></td>
                <td><?php echo $caja->fecha_apertura; ?></td>
                <td>$   <?php echo number_format($caja->monto_apertura,2,'.',','); ?></td>


                <td><?php echo $caja->fecha_cierre; ?></td>


                <td><?php if($caja->estado==1){ echo '$   '.number_format($caja_abierta->monto_apertura+$total_ingreso-$total_egreso,2,'.',',');} 
                  else {echo '$   '.number_format($caja->monto_apertura+$caja->monto_cierre,2,'.',',');} ?>
                </td>

                <td><?php if($caja->estado==1){ echo "<label class='text-danger'>ABIERTO</label>"; }
                else {echo "<label class='text-success'>CERRADO</label>";} ?></td>
                <?php if($caja->estado==1){ ?>
                <td><label class="form-label text-danger">[RE-IMPRIMIR]</label></td>
                <?php } else{?>
                <td><a href="reporte/pdf/documentos/reporte_caja.php?id=<?php echo $caja->id; ?>" target="_blank"><label class="form-label text-success">[RE-IMPRIMIR]</label></a></td>
                <?php }; ?>
              </tr>
      
               <?php endforeach;?>

           </table>

           <?php }else{ ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> No hay ningún apertura de caja!</h4>
                
              </div>
           <?php }; ?>



             



                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->




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


<script src="plugins/select2/select2.full.min.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();


  });
</script>