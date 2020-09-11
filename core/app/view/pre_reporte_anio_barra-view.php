
<?php 
    date_default_timezone_set('America/Lima');
    $hoy = date("Y-m-d");
    $hora = date("H:i:s"); 
    $anio= date("Y");   
    $inicio=date("Y-01-01"); 
    $fin=date("Y-12-31") ;    
?>
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="javascript:;">Gráficos</a></li>
      <li class="active"><a href="#">Reporte por Año</a></li>
    </ol>
</section> 

</div> 

    <div class="breadcrumb-line">
        
      <div class="row">
         <div class="breadcrumb col-lg-12">
                <div style="background-color: #16a085;color: white;padding: 2px;font-size: 20px;
                text-align: center; text-transform: uppercase;font-weight: bold;width: 100%;">
                    <span>
                    Generar diagrama de barra por<b> "AÑO"</b></span>
                </div>
          </div>
      </div>
    </div>
    <!-- =================================== -->
    <!-- Different data widgets ============ -->
    <!-- =================================== -->



    <!-- tile -->
                            <section class="tile col-md-6 col-md-offset-3">

                               
                                <!-- /tile header -->

                                <!-- tile body -->
                            <form method="post" action="index.php?view=reporte_anio_barra" >
                                <div class="tile-body">

                                    <h4 class="custom-font"><strong>Selecciona</strong> AÑO</h4>
                                    <select class="form-control" name="anio">
                                        <option value="2017">2017</option>
                                        <option value="2018" selected>2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                    </select>

                                 

                                </div>
                                <!-- /tile body -->
                                <div class="tile-footer">
                                    <div class="form-group text-center">
                                        <a href="index.php?view=reserva" class="btn btn-rounded btn-danger ripple">Cancelar</a>
                                        <button class="btn btn-rounded btn-success ripple" type="submit"><i class="fa fa-open-eye"></i> Ver gráfico</button>
                                    </div>
                                </div>
                            </form>

                            </section>
                            <!-- /tile -->

