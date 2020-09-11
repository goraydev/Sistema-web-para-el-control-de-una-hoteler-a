<?php if(isset($_POST['start']) and $_POST['start']!=''){ ?>
                                <div class="tile-body">

                                    <div class="row">

                                        
                                        <div class="col-md-12">

                                            <h4 class="custom-font">
                                              <strong>diagrama de barra desde: </strong> 
                                              <?php echo $_POST['start'].' - '. $_POST['end']; ?>
                                            </h4>

                                            <h4>
                                              <a href="" onclick="window.print();" ><i class="fa fa-print" style="color: #da0e36"></i> </a>
                                            </h4>

                                            <div id="bar-example" style="height: 450px;"></div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <!-- /tile body -->






        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>



        <script src="assets/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="assets/js/vendor/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/js/vendor/flot/jquery.flot.orderBars.js"></script>
        <script src="assets/js/vendor/flot/jquery.flot.stack.min.js"></script>
        <script src="assets/js/vendor/flot/jquery.flot.pie.min.js"></script>
        <script src="assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>
        <script src="assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>

        <script src="assets/js/vendor/gaugejs/gauge.min.js"></script>

        <script src="assets/js/vendor/raphael/raphael-min.js"></script> 
        <script src="assets/js/vendor/d3/d3.v2.js"></script>
        <script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>

        <script src="assets/js/vendor/morris/morris.min.js"></script>
 
        <script src="assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="assets/js/vendor/countTo/jquery.countTo.js"></script>



 
                   <!-- INGRESOS -->
                                              <?php $montos_sin_cerrar = ProcesoData::getIngresoRangoFechas($_POST['start'],$_POST['end']);
                                                    $total_sin_cerrar=0;
                                                    if(count($montos_sin_cerrar)>0){

                                                      foreach($montos_sin_cerrar as $monto_sin_cerrar):
                                                        $total_sin_cerrar=(($monto_sin_cerrar->precio*$monto_sin_cerrar->cant_noche)+$monto_sin_cerrar->total)+$total_sin_cerrar;
                                                      endforeach;

                                                    }
                                              ?>  


                                              <?php  
                                             
                                              $reporproducts = ProcesoVentaData::getIngresoRangoFechasEgreso($_POST['start'],$_POST['end']);
                                              $subtotal3=0;
                                              if(count($reporproducts)>0){ ?>
                                                 <?php foreach($reporproducts as $reporproduct):?>
                                                      <?php $subtotal1=$reporproduct->cantidad*$reporproduct->precio; ?>
                                                  <?php $subtotal3=$subtotal1+$subtotal3; ?>
                                                  <?php endforeach; ?>
                                              <?php }else{$subtotal3=0;} ?>
                                              

                                              <!-- FIN INGRESOS -->




                                              <!-- EGRESOS -->

                                              <?php $montos_sin_cerrar_egresos = GastoData::getIngresoRangoFechas($_POST['start'],$_POST['end']);
                                                    $total_sin_cerrar_egreso=0;
                                                    if(count($montos_sin_cerrar_egresos)>0){

                                                      foreach($montos_sin_cerrar_egresos as $montos_sin_cerrar_egreso):
                                                        $total_sin_cerrar_egreso=$montos_sin_cerrar_egreso->precio+$total_sin_cerrar_egreso;
                                                      endforeach;

                                                    } 
                                              ?>

                                              <?php $montos_sin_cerrar_sueldos = ProcesoSueldoData::getIngresoRangoFechas($_POST['start'],$_POST['end']);
                                                    $total_sin_cerrar_sueldos=0;
                                                    if(count($montos_sin_cerrar_sueldos)>0){ 

                                                      foreach($montos_sin_cerrar_sueldos as $montos_sin_cerrar_sueldo):
                                                        $total_sin_cerrar_sueldos=$montos_sin_cerrar_sueldo->monto+$total_sin_cerrar_sueldos;
                                                      endforeach;

                                                    } 
                                              ?>


                                              <?php  
                                           
                                              $reporproducts_es = ProcesoVentaData::getIngresoRangoFechasEgreso($_POST['start'],$_POST['end']);
                                              $subtotal4=0;
                                              if(count($reporproducts_es)>0){ ?>
                                                 <?php foreach($reporproducts_es as $reporproduct_e):?>
                                                      <?php $subtotal1=$reporproduct_e->cantidad*$reporproduct_e->precio; ?>
                                                  <?php $subtotal4=$subtotal1+$subtotal4; ?>
                                                  <?php endforeach; ?>
                                              <?php }else{$subtotal4=0;} ?>
                                              


                                              
                                            <!-- Total egreso -->
                                            <?php $total_egreso=$total_sin_cerrar_egreso+$total_sin_cerrar_sueldos+$subtotal4; ?>
                                            <!-- Fin Total egreso -->

                                            <!-- Total ingreso -->
                                            <?php $total_ingreso=$total_sin_cerrar+$subtotal3; ?>
                                            <!-- Fin Total ingreso -->
                                            <?php ?>


        <script>
            $(window).load(function(){


               

                // Morris bar chart

                Morris.Bar({
                    element: 'bar-example',
                    data: [
                        { y: '<?php echo $_POST['start'].' - '. $_POST['end']; ?>', a: <?php echo $total_ingreso; ?>,  b: <?php echo $total_egreso; ?> }
                    ],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Ingresos S/ ', 'Egresos S/ '],
                    barColors:['#1693A5','#ff4a43']
                });



                


            });
        </script>
        <!--/ Page Specific Scripts -->






    </body>

<!-- Mirrored from www.tattek.sk/Webadmin-noAngular/charts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 16:49:36 GMT -->
</html>
<?php }else{
    print "<script>window.location='index.php?view=pre_reporte_fecha_barra';</script>";
} ?>