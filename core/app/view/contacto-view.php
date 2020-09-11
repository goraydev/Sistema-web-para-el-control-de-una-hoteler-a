<?php if(isset($_GET['id']) and $_GET['id']!=""){ ?>
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">Contactos</a></li>
    </ol>
</section> 
</div> 

 <!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>DIRECTORIO DEL</strong> CONTACTOS</h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><i class="fa fa-user-plus"></i> NUEVO CONTACTO</a>
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
        <?php 
        $contactos = ContactoData::getAllCliente($_GET['id']); 
        if(count($contactos)>0){  ?>
        <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">
            <thead style="color: white; background-color: #827e7e;">
                <tr>
                  <th>Nº</th> 
                  <th data-hide="phone">Documento</th>
                  <th data-hide='phone, tablet'>Nombres completos</th>
                  <th data-hide='phone, tablet'>Teléfono</th>
                  <th data-hide='phone, tablet'>E-mail</th> 
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($contactos as $cliente):?> 
                      <tr>
                        <td><?php echo $cliente->id; ?></td>
                        <td><?php echo $cliente->documento; ?></td>
                        <td><?php echo $cliente->nombre; ?></td>
                        <td><?php if($cliente->telefono!=NULL){ echo $cliente->telefono;}else{ echo "--------";} ?></td>
                        <td><?php if($cliente->email!="NULL"){ echo $cliente->email; }else{ echo "--------";} ?></td>
                        
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $cliente->id; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        <td>
                        <a href="index.php?view=delcontacto&id=<?php echo $cliente->id;?>"  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr> 
                  

                       

 <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $cliente->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecontacto" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-users"></span> EDITAR  CONTACTO</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
 

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Documento </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->documento; ?>" name="documento" required placeholder="Ingrese documento">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombres </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->nombre; ?>" name="nombre" required placeholder="Ingrese nombres">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Teléfono </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->telefono; ?>" name="telefono"  placeholder="Ingrese Teléfono (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> E-mail </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $cliente->email; ?>" name="email"  placeholder="Ingrese E-mail (OPCIONAL)">
                    </div>
                  </div>

                 
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_contacto" value="<?php echo $cliente->id; ?>">
                <input type="hidden" name="id_persona" value="<?php echo $_GET['id']; ?>">
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
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addcontacto" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-users"></span> INGRESAR NUEVO CONTACTO</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
 
                  

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
                      <span class="input-group-addon"> Teléfono </span>
                      <input type="text" class="form-control col-md-8" name="telefono"  placeholder="Ingrese Teléfono (OPCIONAL)">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> E-mail </span>
                      <input type="text" class="form-control col-md-8" name="email"  placeholder="Ingrese E-mail (OPCIONAL)">
                    </div>
                  </div>


                 
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_persona" value="<?php echo $_GET['id']; ?>">
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

<?php }else{echo "No se puede abrir";} ?>