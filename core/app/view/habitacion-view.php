<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
        <li class="active">Habitaciones</li>
    </ol>
</section> 
</div> 


 <!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>MANTENIMIENTO DE</strong> HABITACIONES</h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><i class="fa fa-hotel"></i> REGISTRAR NUEVA HABITACIÓN</a>
          </li>
          <li class="dropdown">
            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
            <i class="fa fa-cog"></i><i class="fa fa-spinner fa-spin"></i>
            </a>
            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                <li>
                  <a role="button" tabindex="0" class="tile-toggle">
                  <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                  <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                  </a>
                </li>
                <li>
                  <a role="button" tabindex="0" class="tile-refresh">
                    <i class="fa fa-refresh"></i> Refresh
                  </a>
                </li>
                <li>
                  <a role="button" tabindex="0" class="tile-fullscreen">
                  <i class="fa fa-expand"></i> Fullscreen
                  </a>
                </li>
            </ul>
          </li>
          <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">
        <div class="form-group">
          <label for="filter" style="padding-top: 5px">Buscar:</label>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
        </div>

               

              <?php $habitaciones = HabitacionData::getAll();
                if(count($habitaciones)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #827e7e;">
                        <th>Nº</th> 
                        <th>NOMBRE</th>
                        <th>CATEGORÍA</th>
                      
                        <th>DETALLES</th>
                        <th></th> 
                        <th></th> 
                        <th></th>
                        <th></th>
                        <!--
                        <th></th>
                      -->
                  </thead>
                   <?php foreach($habitaciones as $habitacion):?>
                      <tr>
                        <td><?php echo $habitacion->id; ?></td>
                        <td><?php echo $habitacion->nombre; ?></td>
                        <td><?php echo $habitacion->getCategoria()->nombre; ?></td>
                      
                        <td><?php echo $habitacion->descripcion; ?></td>
                        <td>

                          <?php $tarifas_hab = TarifaHabitacionData::getAllHabitacion($habitacion->id);
                          if(count($tarifas_hab)>0){ ?>
                            <a href="index.php?view=ha_tarifas&id=<?php echo $habitacion->id; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver tarifas</a>

                          <?php }else{ ?>
                            <a href="index.php?view=ha_tarifas&id=<?php echo $habitacion->id; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver tarifas</a>
                          <?php }; ?>
                          
                        </td>
                        <td>
                          <a href=""  data-toggle="modal" data-target="#myModal<?php echo $habitacion->id; ?>"  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        <td> <a href="index.php?view=delhabitacion&id=<?php echo $habitacion->id; ?>"  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></td>

                        <td> 
                          <?php if($habitacion->estado=='4'){ ?>
                          <a href=""  data-toggle="modal" data-target="#mantenimienthabilitar<?php echo $habitacion->id; ?>"  class="btn btn-primary btn-xs"> Habilitar</a>
                          <?php }else if($habitacion->estado=='1' or $habitacion->estado=='3'){ ?>
                          <a href=""  data-toggle="modal" data-target="#mantenimient<?php echo $habitacion->id; ?>"  class="btn btn-warning btn-xs"> Mantenimiento</a>
                          <?php }; ?>
                        </td>
                        <!--
                        <td>
                          <a href="index.php?view=delhabitacion<?php echo $habitacion->id; ?>"    class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td> 
                      -->
                      </tr> 


<div class="modal fade bs-example-modal-xm" id="mantenimienthabilitar<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> HABILITAR HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>


                  
                </div>
                </div>

              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >
                <a href="index.php?view=mhhabitacion&id=<?php echo $habitacion->id; ?>"   class="btn btn-outline btn-warning "> Habilitar habitación</a>
       
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>


 <div class="modal fade bs-example-modal-xm" id="mantenimient<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> MANTENIMIENTO HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>


                  
                </div>
                </div>

              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >
                <a href="index.php?view=mhabitacion&id=<?php echo $habitacion->id; ?>"   class="btn btn-outline btn-warning "> Pasar a mantenimiento</a>
       
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>



 
     <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateroom" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> EDITAR HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>



                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Categoria</span>
                      <select class="form-control select2" required  name="id_categoria">   
                        <?php $categorias = CategoriaData::getAll();?>
                        <?php foreach($categorias as $categoria):?>
                        <option value="<?php echo $categoria->id;?>" <?php if($habitacion->id_categoria!=null&& $habitacion->id_categoria==$categoria->id){ echo "selected";}?>><?php echo $categoria->nombre;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Detalles &nbsp;&nbsp;</span>
                      <input type="text" class="form-control" name="descripcion" value="<?php echo $habitacion->descripcion; ?>" required placeholder="Ingrese detalles">
                    </div>
                  </div>

                 
                  <input type="hidden" class="form-control" name="precio" value="0" required placeholder="Ingrese Precio">
                    


                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >
                <button type="submit" class="btn btn-outline">Actualizar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

                    <?php endforeach; ?>
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="6" class="text-center">
                            <ul class="pagination"></ul>
                          </td>
                        </tr>
                      </tfoot>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>

           </div>    


</section>

</div>
</div>

      <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addroom" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> INGRESAR NUEVA HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Categoria</span>
                      <select class="form-control select2" required  name="id_categoria">   
                        <?php $categorias = CategoriaData::getAll();?>
                        <?php foreach($categorias as $categoria):?>
                          <option value="<?php echo $categoria->id;?>"><?php echo $categoria->nombre;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Detalles &nbsp;&nbsp;</span>
                      <input type="text" class="form-control" name="descripcion" required placeholder="Ingrese detalles">
                    </div>
                  </div>

                  
                  <input type="hidden" class="form-control" name="precio" value="0" required placeholder="Ingrese Precio">
                    

                  
                   

                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline">Agregar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal --> 
      </div>

       <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
      
        
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>