

<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a class="active">seleccion habitacion</a></li>
    </ol>
</section> 
</div> 



 <!-- row --> 
<div class="row"> 
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">
        <h1 class="custom-font"><strong> HABITACIONES OCUPADAS PARA</strong> REALIZAR VENTA </h1>
        
      </div>
      <div class="tile-body">
        <div class="row">
          <?php $habitaciones = ProcesoData::getProceso();
                          if(count($habitaciones)>0){
                            // si hay usuarios
                            ?>
                 
                   <?php foreach($habitaciones as $habitacion):?>

                    <div class="col-lg-2 col-xs-6">
                      <section class="tile bg-info widget-appointments">
                      <!-- small box -->

                      <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font" style="font-size: 12px;"><?php echo $habitacion->getHabitacion()->getCategoria()->nombre; ?></h1>
                            <ul class="controls"> 
                                <li ><a  href="index.php?view=proceso_venta&id=<?php echo $habitacion->id; ?>" >
                                    <i class="fa fa-shopping-cart"></i>  </a>
                                </li>
                            </ul>
                        </div> 
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body" style="padding: 1px;">
                            <h4 style="text-align: center;"><i class="fa fa-bed"></i> <?php echo $habitacion->getHabitacion()->nombre; ?></h4>
                        </div> 
                       <!-- /tile body -->

                     
                    </section>
                    </div>



                    <?php endforeach; ?>
            

               <?php }else{ 
            echo"<h4 class='alert alert-success'>No ingresó ningún Huesped</h4>";

                };
                ?>

          </div>
</div>
</section>

</div>
</div>
     

