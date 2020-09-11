
<style type="text/css">
  
  .hh:hover{
    background-color: white;
  }
  .bg-orange:hover{
  background-color: #ea964d !important;
}

</style>
<div class="row">

 <section class="content-header"> 
      <h1 >
        <i class='fa fa-sign-out'></i> CHECK OUT
        <small>Avance</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a class="active">Check out</a></li>
        
      </ol>
</section>
</div> 

<div class="row">
<section class="content">

<div class="box box box-danger">
         

            <!-- /.box-header -->
            <div class="box-body">

          <?php $habitaciones = ProcesoData::getProceso();
                          if(count($habitaciones)>0){
                            // si hay usuarios 
                            ?>
                 
                   <?php foreach($habitaciones as $habitacion):?>

                    <div class="col-lg-3 col-xs-6">
                      <div class="hh">
                      <!-- small box -->
                 
                      <div class="small-box bg-orange">

                        <div class="inner">
                          <h3><?php echo $habitacion->getHabitacion()->nombre; ?></h3>

                          <p><?php echo $habitacion->getHabitacion()->getCategoria()->nombre; ?></p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-ocupado1" style="color:#e3e3e3;"></i>
                        </div>

                       <a href="index.php?view=proceso_salida&id=<?php echo $habitacion->id; ?>"  data-target="#myModal<?php echo $habitacion->id; ?>" class="small-box-footer">Procesar Venta <i class="fa fa-spinner"></i></a>
                        
                      </div>
                    </div>
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

     

