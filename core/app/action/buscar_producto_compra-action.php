
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
 


<?php $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';?>

<?php $productos = ProductoData::getAll();
                if(count($productos)>0){
                  // si hay usuarios
                  ?>
                  <div class="form-group">
                    <label for="filter" style="padding-top: 5px">Buscar:</label>
                    <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
                  </div>

                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #dd4b39;">
                        <th>CÓDIGO</th> 
                        <th>NOMBRE</th> 
                        <th>EN ESTOCK</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO VENTA</th> 
                        <th></th>  
                  </thead>
                   <?php foreach($productos as $producto):?> 
                      <tr>
                        <td><?php echo $producto->codigo; ?></td>
                        <td><?php echo $producto->nombre; ?></td> 
                        <?php $entrada_producto=0; ?>
                        <?php $entradas = ProcesoVentaData::getAllEntradas($producto->id);
                        if(count($entradas)>0){ ?>
                            <?php foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto;  endforeach; ?>
                        <?php }else{ $entrada_producto=0; }; ?>

                        
 
                        

                        <?php $salida_producto=0; ?>
                        <?php $salidas = ProcesoVentaData::getAllSalidas($producto->id);
                        if(count($salidas)>0){ ?>
                            <?php foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto;  endforeach; ?>
                        <?php }else{ $salida_producto=0; }; ?>

                   
                       
                        <?php $stock= ($producto->stock + $entrada_producto) - $salida_producto; ?>
                         <td><?php echo $stock; ?></td> 
                        <td class='col-xs-1'>
              						<div class="pull-right">
              						    <input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $producto->id; ?>"  value="1" min="1"  onkeypress="return valida(event)" >
              						</div>
                        </td>        
                        <td class='col-xs-2'>
                          <div class="pull-right">

                            <input type="text" class="form-control" style="text-align:right" disabled value="<?php echo $producto->precio_venta;?>" >

              						  <input type="hidden" class="form-control" style="text-align:right" id="precio_venta_<?php echo $producto->id; ?>"  value="<?php echo $producto->precio_venta;?>" >
              						</div>
              					</td> 
                         
                        <td><span class="pull-right"><a href="#" onclick="agregar('<?php echo $producto->id; ?>')" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</a></span></td>
                        
                      </tr> 
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


<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
<script>
    $(window).load(function(){

        $('.footable').footable();

    });
</script>