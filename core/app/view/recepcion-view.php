<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">

<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">recepción</a></li>
    </ol>
</section> 
</div> 

 
 <!-- row --> 
<div class="row"> 
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">
        <h1 class="custom-font"><strong> VISTA GENERAL</strong> RECEPCIÓN</h1>
        <ul class="controls">
          <li class="remove">
            <a style="color: #f0ad4e;"><i class="fa fa-arrow-circle-left" style="color: #f0ad4e;"></i> Mantenimiento</a>
          </li>
          <li class="remove">
            <a style="color: #16a085;"><i class="fa fa-arrow-circle-left" style="color: #16a085;"></i> Disponible</a>
          </li>
          <li class="remove">
            <a style="color: #5bc0de;"><i class="fa fa-spinner" style="color: #5bc0de;"></i> Limpieza</a>
          </li>
          <li class="remove">
            <a style="color: #d9534f;"><i class="fa fa-arrow-circle-right" style="color: #d9534f;"></i> Ocupado</a>
          </li>
          
        </ul>
      </div>
      <div class="tile-body">
          <div class="row">
            <?php if(isset($_GET['buscar']) and $_GET['buscar']!=""){ ?>
                  <?php $cliente=PersonaData::getLike($_GET['buscar']); ?>
                  <?php $procesos = ProcesoData::getProcesoCliente($cliente->id);
                  if(count($procesos)>0){ ?> 
                   <?php foreach($procesos as $proceso):?>
                  <div class="col-lg-2 col-xs-6">
                    <section class="tile bg-danger widget-appointments">
                       <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 12px;">Ocupado</h1>
                                    <ul class="controls"> 
                                      <li ><a  href="index.php?view=proceso_salida&id=<?php echo $proceso->id; ?>">
                                            <i class="fa fa-arrow-circle-right"></i>  </a>
                                      </li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center;"><?php echo $proceso->getHabitacion()->nombre; ?></h4>
                                </div>
                                <!-- /tile body -->
                     </section>
                    </div>
                     <?php endforeach; ?>
            

               <?php }else{ echo"<h4 class='alert alert-success'>No se encontró Huesped en ninguna habitación</h4>";};
                ?>

            <?php }else{ ?>
            <?php $habitaciones = HabitacionData::getAll();
                          if(count($habitaciones)>0){ 
                            // si hay usuarios 
                            ?>
                   <?php foreach($habitaciones as $habitacion):?>
                
                    <div class="col-lg-2 col-xs-6">
                      <!-- small box -->
                      <?php if($habitacion->estado==1){?>
                      <section class="tile bg-greensea widget-appointments">
                      
                      <?php } else if($habitacion->estado==2){?>
                      <?php $proceso = ProcesoData::getByRecepcion($habitacion->id);?>
                      <section class="tile bg-danger widget-appointments">
                      
                      <?php } else if($habitacion->estado==3){?>
                      <section class="tile bg-info widget-appointments">
                     
                      <?php  } else if($habitacion->estado==4){?>
                      <section class="tile bg-warning widget-appointments">
                     
                      <?php  }; ?>
 
                             

                            <?php if($habitacion->estado==1){?>
                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 12px;">Disponible<br></h1>
                                    <ul class="controls"> 
                                      <li >
                                        <?php $tarifas_hab = TarifaHabitacionData::getAllHabitacion($habitacion->id);
                                        if(count($tarifas_hab)>0){ ?>
                                          <a href="index.php?view=proceso&id_habitacion=<?php echo $habitacion->id; ?>">
                                            <i class="fa fa-arrow-circle-left"></i>  </a>

                                        <?php }else{ ?>
                                          <a  data-toggle="modal" data-target="#myModalTarifa<?php echo $habitacion->id; ?>">
                                            <i class="fa fa-arrow-circle-left"></i>  </a>
                                        <?php }; ?>

                                        
                                      </li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center;"><i class="fa fa-bed"></i> <?php echo $habitacion->nombre; ?></h4>
                                </div> 
                                <!-- /tile body -->
                            <?php } else if($habitacion->estado==2){?>

                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 12px;">Ocupado: <?php echo $habitacion->nombre; ?><br></h1>
                                    <ul class="controls"> 
                                      <li ><a href="index.php?view=proceso_salida&id=<?php echo $proceso->id; ?>" >
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                      </li>
                                    </ul>
                                </div>  
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center; font-size: 12px;"><?php echo substr($proceso->getCliente()->nombre, 0,20); ?></h4>
                                </div>
                                <!-- /tile body -->



                                <div class="modal fade bs-example-modal-xm" id="myModalCheckOut<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-info">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" style="color: black;"><span class="fa fa-hotel"></span> Habitación <?php echo $habitacion->nombre; ?></h4>
                                              </div>
                                               
                                              <div class="modal-footer"> 
                                                <center>
                                                <a href="index.php?view=proceso_cambiar&id=<?php echo $proceso->id; ?>" class="btn btn-outline btn-warning pull-left"> CAMBIAR HABITACIÓN?</a>

                                                <a href="index.php?view=proceso_salida&id=<?php echo $proceso->id; ?>" class="btn btn-outline btn-primary pull-left">IR A PRE-CUENTA</a>
                                                </center>
                                               
                                              </div>
                                           
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                      </div>


                            <?php } else if($habitacion->estado==3){?>
                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 12px;">Limpieza<br></h1>
                                    <ul class="controls"> 
                                      <li ><a   data-toggle="modal" data-target="#myModal<?php echo $habitacion->id; ?>">
                                            <i class="fa fa-spinner"></i>  </a>
                                      </li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center;"><?php echo $habitacion->nombre; ?></h4>
                                </div>
                                <!-- /tile body -->
                            <?php  } else if($habitacion->estado==4){?>
                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 12px;">Mantenimiento<br></h1>
                                    <ul class="controls"> 
                                      
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center;"><?php echo $habitacion->nombre; ?></h4>
                                </div>
                                <!-- /tile body -->
                            <?php  }; ?>
                     
                      </section>

                    </div>
               
                 

<div class="modal fade bs-example-modal-xm" id="myModalTarifa<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-spinner"></span> NECESITA CONFIGURAR TARIFAS PARA ESTA HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> HABITACIÓN </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                 

                </div>
                </div>

              </div>
              <div class="modal-footer"> 
                <a href="index.php?view=ha_tarifas&id=<?php echo $habitacion->id; ?>" class="btn btn-outline btn-primary pull-left"> Agregar tarifa a la habitación</a>

               
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>




  <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-spinner"></span> ESTÁ A PUNTO DE TERMINAR LA LIMPIEZA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> HABITACIÓN </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> TIPO </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->getCategoria()->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> DETALLES </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->descripcion; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <a href="index.php?view=limpieza&id=<?php echo $habitacion->id; ?>" class="btn btn-outline">Finalizar limpieza</a>
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>










                    <?php endforeach; ?>
            

               <?php }else{ 
            echo"<h4 class='alert alert-success'>Necesita agregar habitaciones en CONFIGURACIÓN</h4>";

                };
                ?>

                <?php }; ?>
          </div>

        </div>
      </div>
    
</section>
</div>
</div>


