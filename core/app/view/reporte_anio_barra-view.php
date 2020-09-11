
                                <div class="tile-body">

                                    <div class="row">

                                        
                                        <div class="col-md-12">

                                            <h4 class="custom-font"><strong>diagrama de barra del año: </strong> <?php echo $_POST['anio']; ?></h4>
                                            <div id="bar-example" style="height: 250px;"></div>

                                        </div>

                                       

                                    </div>

                                </div>
                                <!-- /tile body --> 


<?php
$array = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
?>




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

        <script>
            $(window).load(function(){


               

                // Morris bar chart

                Morris.Bar({
                    element: 'bar-example',
                    data: [



                    <?php 
$numero1=0;
foreach ($array as $valor) { 

$numero1= $numero1+1;
?>

  

 
                   <!-- INGRESOS -->
                                              <?php $montos_sin_cerrar = ProcesoData::getReporteMensual($_POST['anio'],$numero1);
                                                    $total_sin_cerrar=0;
                                                    if(count($montos_sin_cerrar)>0){

                                                      foreach($montos_sin_cerrar as $monto_sin_cerrar):
                                                        $total_sin_cerrar=(($monto_sin_cerrar->precio*$monto_sin_cerrar->cant_noche)+$monto_sin_cerrar->total)+$total_sin_cerrar;
                                                      endforeach;
                                                    }
                                              ?> 

 
                                              <?php  
                                              $reporproducts = ProcesoVentaData::getIngresoFechaGrafico($_POST['anio'],$numero1);
                                              $subtotal3=0;
                                              if(count($reporproducts)>0){ ?>
                                                 <?php foreach($reporproducts as $reporproduct):?>
                                                      <?php $subtotal1=$reporproduct->cantidad*$reporproduct->precio; ?>
                                                  <?php $subtotal3=$subtotal1+$subtotal3; ?>
                                                  <?php endforeach; ?>
                                              <?php }else{$subtotal3=0;} ?>
                                              

                                              <!-- FIN INGRESOS -->
                                            

                                             <!-- EGRESOS -->

                                              <?php $montos_sin_cerrar_egresos = GastoData::getIngresoGraficoFechas($_POST['anio'],$numero1);
                                                    $total_sin_cerrar_egreso=0;
                                                    if(count($montos_sin_cerrar_egresos)>0){

                                                      foreach($montos_sin_cerrar_egresos as $montos_sin_cerrar_egreso):
                                                        $total_sin_cerrar_egreso=$montos_sin_cerrar_egreso->precio+$total_sin_cerrar_egreso;
                                                      endforeach;

                                                    }  
                                              ?>


                                              <?php $montos_sin_cerrar_sueldos = ProcesoSueldoData::getIngresoGraficoFechas($_POST['anio'],$numero1);
                                                    $total_sin_cerrar_sueldos=0;
                                                    if(count($montos_sin_cerrar_sueldos)>0){ 

                                                      foreach($montos_sin_cerrar_sueldos as $montos_sin_cerrar_sueldo):
                                                        $total_sin_cerrar_sueldos=$montos_sin_cerrar_sueldo->monto+$total_sin_cerrar_sueldos;
                                                      endforeach;

                                                    } 
                                              ?>

                                              <?php  
                                           
                                              $reporproducts_es = ProcesoVentaData::getFechaGraficoEgreso($_POST['anio'],$numero1);
                                              $subtotal4=0;
                                              if(count($reporproducts_es)>0){ ?>
                                                 <?php foreach($reporproducts_es as $reporproduct_e):?>
                                                      <?php $subtotal1=$reporproduct_e->cantidad*$reporproduct_e->precio; ?>
                                                  <?php $subtotal4=$subtotal1+$subtotal4; ?>
                                                  <?php endforeach; ?>
                                              <?php }else{$subtotal4=0;} ?>


                                            
                                            <?php $total_egreso= $total_sin_cerrar_egreso+$total_sin_cerrar_sueldos+$subtotal4; ?>
                                            <!-- Fin Total egreso -->

                                            <!-- Total ingreso -->
                                            <?php $total_ingreso = $total_sin_cerrar+$subtotal3; ?>
                                            <!-- Fin Total ingreso -->
                                            <?php ?>


                                            <?php
                                                $mes=$numero1;


                                                    if($mes=='01'){ $mes= 'Enero';}
                                                    else if($mes=='02'){ $mes= 'Febrero';}
                                                    else if($mes=='03'){ $mes= 'Marzo';}
                                                    else if($mes=='04'){ $mes= 'Abril';}
                                                    else if($mes=='05'){ $mes= 'Mayo';}
                                                    else if($mes=='06'){ $mes= 'Junio';}
                                                    else if($mes=='07'){ $mes= 'Julio';}
                                                    else if($mes=='08'){ $mes= 'Agosto';}
                                                    else if($mes=='09'){ $mes= 'Set.';}
                                                    else if($mes=='10'){ $mes= 'Octubre';}
                                                    else if($mes=='11'){ $mes= 'Nov.';} 
                                                    else if($mes=='12'){ $mes= 'Diciembre';}

                                            ?>


                                             { y: '<?php echo $mes; ?>', a: <?php echo $total_ingreso; ?>,  b:  <?php echo $total_egreso; ?> },


<?php } ?>  
                        
                    ],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Ingresos', 'Egresos'],
                    barColors:['#1693A5','#ff4a43']
                });



                


            });
        </script>
        <!--/ Page Specific Scripts -->






    </body>

<!-- Mirrored from www.tattek.sk/Webadmin-noAngular/charts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 16:49:36 GMT -->
</html>
