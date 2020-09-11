
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">Clientes</a></li>
    </ol>
</section> 
</div> 

 <!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>DIRECTORIO DEL</strong> CLIENTE</h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><i class="fa fa-user-plus"></i> NUEVO CLIENTE</a>
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
        <?php if(isset($_GET['buscar']) and $_GET['buscar']!=""){
          $clientes = PersonaData::getLike($_GET['buscar']);
        }else{
          $clientes = PersonaData::getAll(); 
        } ?>
        <?php   
        if(count($clientes)>0){  ?>
        <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">
            <thead style="color: white; background-color: #827e7e;">
                <tr>
                  <th>Nº</th> 
                  <th>Tipo documento</th>
                  <th data-hide="phone">Documento</th>
                  <th data-hide='phone, tablet'>Nombres completos</th>
                  <th data-hide='phone, tablet'>Razón social</th>
                  <th data-hide='phone, tablet'>Dirección</th> 
                  <th data-hide='phone, tablet'>Fecha nac.</th>  
                  <!--
                  <th></th>
                -->
                  <th></th>

                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($clientes as $cliente):?> 
                      <tr>
                        <td><?php echo $cliente->id; ?></td>
                        <td><b><?php echo $cliente->getTipoDocumento()->nombre; ?></b></td>
                        <td><?php echo $cliente->documento; ?></td>
                        <td><?php echo $cliente->nombre; ?></td>
                        <td><?php if($cliente->razon_social!=NULL){ echo $cliente->razon_social;}else{ echo "--------";} ?></td>
                        <td><?php if($cliente->direccion!="NULL"){ echo $cliente->direccion; }else{ echo "--------";} ?></td>
                        <td><?php if($cliente->fecha_nac!=NULL and $cliente->fecha_nac!='0000-00-00'){ echo $cliente->fecha_nac;}else{ echo "--------";} ?></td>

                        <!--
                        <td>
                        <?php if($cliente->vip=='0'){ ?>
                        
                        <a href=""  data-toggle="modal" data-target="#myModalVip<?php echo $cliente->id; ?>"  class="btn btn-success btn-xs" style="background-color: #a928ea; border-color: #b80eca;"><i class="fa fa-card-o"></i> C. VIP</a>
                        <?php }else { ?>
                        <a href=""  data-toggle="modal" data-target="#myModalVip1<?php echo $cliente->id; ?>"  class="btn btn-success btn-xs"><i class="fa fa-card-o"></i> C. VIP</a>
                        <?php }; ?>
                        
                        </td>
                      -->
                        <td>
                        <a href="index.php?view=contacto&id=<?php echo $cliente->id; ?>"  class="btn btn-info btn-xs"><i class="fa fa-users"></i> Contactos</a>
                        </td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $cliente->id; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        <td>
                        <a href="index.php?view=delcliente&id=<?php echo $cliente->id;?>"  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr> 
                  
 <div class="modal fade bs-example-modal-xm" id="myModalVip1<?php echo $cliente->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="index.php?view=updatevip" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-users"></span> CLIENTE VIP</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
 
                  

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Puntos acumulados &nbsp;</span>
                      <input type="text" class="form-control" disabled="" name="" value="<?php echo $cliente->contador; ?>">
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Puntos alcanzar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                      <input type="text" class="form-control" disabled="" name="" value="<?php echo $cliente->limite; ?>">
                    </div>
                  </div>

                 
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_cliente" value="<?php echo $cliente->id; ?>">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>

              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>



 <div class="modal fade bs-example-modal-xm" id="myModalVip<?php echo $cliente->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="index.php?view=updatevip" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-users"></span> EDITAR  CLIENTE</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
 
                  

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Cliente vip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                      <select class="form-control" name="vip">
                        <option value="0" <?php if($cliente->vip=='0'){ echo "selected";}; ?> >Inactivo</option>
                        <option value="1" <?php if($cliente->vip=='1'){ echo "selected";}; ?>>Activo</option>
                      </select>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Ptos. acumular </span>
                      <input type="number" name="limite" class="form-control" placeholder="Ejem. 6">
                    </div>
                  </div>

                 
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_cliente" value="<?php echo $cliente->id; ?>">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
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



 <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $cliente->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecliente" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-users"></span> EDITAR  CLIENTE</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
 
                  
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Tipo de documento </span>
                      <?php $tipo_documentos = TipoDocumentoData::getAll();?>
                      <select name="tipo_documento" required class="form-control">
                      <?php foreach($tipo_documentos as $tipo_documento):?>
                        <option value="<?php echo $tipo_documento->id;?>" <?php if($cliente->tipo_documento!=null&& $cliente->tipo_documento==$tipo_documento->id){ echo "selected";}?>><?php echo $tipo_documento->nombre;?></option>
                      <?php endforeach;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Documento &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->documento; ?>" name="documento" required placeholder="Ingrese documento">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombres &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->nombre; ?>" name="nombre" required placeholder="Ingrese nombres">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Razón social &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->razon_social; ?>" name="razon_social"  placeholder="Ingrese Razón social (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Giro &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->giro; ?>" name="giro"  placeholder="Ingrese Giro (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Dirección &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->direccion; ?>" name="direccion"  placeholder="Ingrese Dirección (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Fecha nac&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                       <input type="date" name="fecha_nac" class="form-control"   value="<?php echo $cliente->fecha_nac; ?>" >
                    </div>
                  </div>

                 
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_cliente" value="<?php echo $cliente->id; ?>">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
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
                    </tbody>
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="9" class="text-center">
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
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->






   <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addclient" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-users"></span> INGRESAR NUEVO CLIENTE</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
  
                  
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Tipo de documento </span>
                      <?php $tipo_documentos = TipoDocumentoData::getAll();?>
                      <select name="tipo_documento" required class="form-control">
                      <?php foreach($tipo_documentos as $tipo_documento):?>
                        <option value="<?php echo $tipo_documento->id;?>" ><?php echo $tipo_documento->nombre;?></option>
                      <?php endforeach;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Documento </span>
                      <input type="text" class="form-control col-md-8" name="documento" required placeholder="Ingrese documento">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombres </span>
                      <input type="text" class="form-control col-md-8" name="nombre" required placeholder="Ingrese nombres">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Razón social </span>
                      <input type="text" class="form-control col-md-8" name="razon_social"  placeholder="Ingrese Razón social (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Giro </span>
                      <input type="text" class="form-control col-md-8" name="giro"  placeholder="Ingrese Giro (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Dirección </span>
                      <input type="text" class="form-control col-md-8" name="direccion"  placeholder="Ingrese Dirección (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Fecha nac </span>
                       <input type="date" name="fecha_nac" class="form-control" value="<?php echo $hoy; ?>" >
                    </div>
                  </div>

                 
                  
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