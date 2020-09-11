

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





<section class="tile tile-simple col-md-4 col-md-offset-4">
      
            <div class="tile-widget dvd dvd-btm" style="text-align: center;">
              <h3 class="box-title">APERTURA INICIAL DE CAJA</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form method="post"  action="index.php?view=agregar_caja" id="addcaja">
              <div class="tile-body p-0" style="text-align: left;">

                <table>
                  <th style="width: 50%;"></th>
                  <th style="width: 45%;"></th>
                  <tr>
                      <td><h5>FECHA APERTURA:</h5></td>
                      <td><h5 class="control-label text-red"><?php echo $hoy.' '. $hora; ?></h5></td>
                  </tr>
    
                  <tr>
                      <td><h5>MONTO APERTURA:</h5></td>
                      <td><input type="text" name="monto_apertura" onchange="this.value=this.value.replace(/\.$/, '')"  onKeyUp="if (isNaN(this.value)) this.value=this.value.replace(/[^0-9.]/g,'')" required class="form-control text-red" placeholder="Ingrese monto" style="border-color: #dd4b47;"></td>

                  </tr>
                </table>
 
              </div>

            

              <!-- tile footer -->
              <div class="tile-footer dvd dvd-top">

                  <div class="input-group"> 
                      <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-left">Refrescar</a>
                      <input type="hidden" name="fecha_apertura" value="<?php echo $fecha_completo; ?>">
                      <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                      <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                      <?php $cajas_abiertas = CajaData::getAllAbierto(); 
                       if(count($cajas_abiertas)>0){$caja_abierta='1';}else{$caja_abierta='0';}
                      ?>
                      <input type="hidden" name="" value="<?php echo $caja_abierta; ?>" id="caja_abierta">
                      <?php if($caja_abierta=='0'){ ?>
                      <input type="submit" class="btn btn-sm btn-success btn-flat pull-right" value="Dar apertura" >
                      <?php }; ?>
                  </div>

              </div>
              <!-- /tile footer -->

          </form>


</section>
<script>
  $("#addcaja").submit(function(e){
    caja = $("#caja_abierta").val();
     
    if(caja=="1"){
      alert("HAY UNA CAJA ABIERTA, NO PUEDES ABRIR OTRA CAJA, NECESITAS CERRARLA");
      e.preventDefault();
    }
  });
</script>




<?php $cajas = CajaData::getAllAbierto(); ?>

<!-- tile -->
                            <section class="tile  col-md-12">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>CAJAS ABIERTAS EN FECHAS DE  </strong>HOY</h1>
                                </div>
                                <!-- /tile header -->
 
                                <!-- tile body -->
                                <div class="tile-body p-0">
                                    <?php if(count($cajas)>0){?>
                                    <table class="table table-condensed" style="font-size: 12px;">
                                        <thead style="background-color: #16a085;
    color: white;">
                                        <tr>
                                          <th>FECHA DE APERTURA</th>
                                          <th>MONTO APERTURA</th>
                                          <th>EGRESOS</th>
                                          <th>VENTA TOTAL</th>

                                          <th>VENTA TOTAL + APERTURA</th>
                                          <th>USUARIO RESPONSABLE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr> 
                                            <td><?php echo $cajas->fecha_apertura; ?></td>
                                            <td>$   <?php echo number_format($cajas->monto_apertura,2,'.',','); ?></td>

                                            <!-- INGRESOS -->
                                              <?php $montos_sin_cerrar = ProcesoData::getIngresoCaja($cajas->id);
                                                    $total_sin_cerrar=0;
                                                    if(count($montos_sin_cerrar)>0){

                                                      foreach($montos_sin_cerrar as $monto_sin_cerrar):
                                                        $total_sin_cerrar=(($monto_sin_cerrar->precio*$monto_sin_cerrar->cant_noche)+$monto_sin_cerrar->total)+$total_sin_cerrar;
                                                      endforeach;

                                                    }
                                              ?> 


                                              <?php  
                                              if($cajas->id!=0){ 
                                              $reporproducts = ProcesoVentaData::getIngresoCaja($cajas->id);
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

                                              <?php $montos_sin_cerrar_egresos = GastoData::getEgresoCaja($cajas->id);
                                                    $total_sin_cerrar_egreso=0;
                                                    if(count($montos_sin_cerrar_egresos)>0){

                                                      foreach($montos_sin_cerrar_egresos as $montos_sin_cerrar_egreso):
                                                        $total_sin_cerrar_egreso=$montos_sin_cerrar_egreso->precio+$total_sin_cerrar_egreso;
                                                      endforeach;

                                                    } 
                                              ?>

                                              <?php $montos_sin_cerrar_sueldos = ProcesoSueldoData::getSueldoCaja($cajas->id);
                                                    $total_sin_cerrar_sueldos=0;
                                                    if(count($montos_sin_cerrar_sueldos)>0){ 

                                                      foreach($montos_sin_cerrar_sueldos as $montos_sin_cerrar_sueldo):
                                                        $total_sin_cerrar_sueldos=$montos_sin_cerrar_sueldo->monto+$total_sin_cerrar_sueldos;
                                                      endforeach;

                                                    } 
                                              ?>


                                              <?php  
                                              if($cajas->id!=0){ 
                                              $reporproducts_es = ProcesoVentaData::getEgresoCaja($cajas->id);
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

                                            <td>$   <?php echo number_format($total_egreso,2,'.',','); ?></td>
                                            <td>$   <?php echo number_format($total_ingreso,2,'.',','); ?></td>
                                                <?php $total=($cajas->monto_apertura+$total_ingreso)-$total_egreso; ?>
                                            <td>$   <?php echo number_format($total,2,'.',','); ?></td>
                                            <td><?php if($cajas->id_usuario!=null){echo $cajas->getUsuario()->name;}else{ echo "<center>----</center>"; }  ?></td>
                                          </tr> 
                                        </tbody>
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

