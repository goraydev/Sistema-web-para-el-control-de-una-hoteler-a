<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
      <li class="active">Tarifas por habitación</li>
    </ol>
</section> 
</div> 


<!-- row --> 
<div class="row">

  <!-- col -->
  <div class="col-md-12">
    <?php if(isset($_GET['id']) and $_GET['id']!=""){ ?>
    <section class="tile">
      <div class="tile-header dvd dvd-btm">    
        <?php $habitacion = HabitacionData::getById($_GET["id"]); ?>
        <h1 class="custom-font"><strong>TARIFAS DE LA HABITACIÓN</strong> <?php echo $habitacion->nombre; ?></h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><i class="fa fa-plus"></i> Agregar tarifa</a>
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


              <?php $tarifas_ha = TarifaHabitacionData::getAllHabitacion($_GET['id']);
                if(count($tarifas_ha)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #827e7e;">
                        
                        <th>TARIFA</th>
                        <th>PRECIO</th>
                        <th></th> 
                  </thead>
                   <?php foreach($tarifas_ha as $tarifa_ha):?>
                      <tr>
                        
                        <td><?php echo $tarifa_ha->getTarifa()->nombre; ?></td>
                        <td><?php echo number_format($tarifa_ha->precio,2,'.',','); ?></td>
                        <td>
                        <a href="index.php?view=deltarifa_ha&id=<?php echo $tarifa_ha->id; ?>&id_ha=<?php echo $tarifa_ha->id_habitacion; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Quitar</a>
                        </td>
                      </tr>  



                    <?php endforeach; ?>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>

           </div>
     
</section>
<?php }else{echo "<h2>error al cargar</h2>";} ?>
</div>
 </div>  

      <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addtarifa_ha" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> AGREGAR TARIFA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                 
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    

                    <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Tarifa</span>
                      <select class="form-control select2" required  name="id_tarifa">   
                        <?php $tarifas = TarifaData::getAll();?>
                        <?php foreach($tarifas as $tarifa):?>
                          <option value="<?php echo $tarifa->id;?>"><?php echo $tarifa->nombre;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Precio</span>
                      <input type="number" class="form-control" name="precio" required placeholder="Ejem. 180">
                    </div>
                  </div>

                  <input type="hidden" name="id_habitacion" value="<?php echo $_GET['id']; ?>">

                    
                    
                  
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