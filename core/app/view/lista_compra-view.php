
<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>



<div class="row">

 <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Reportes</a></li>
        <li class="active">Reporte compras</li>
      </ol>
</section>
</div>


<h3 >
        <span class="fa fa-file-text-o"></span> REPORTE POR FECHAS
        <small>Avance</small>
      </h3>



<br>
<div class="row">

      <div  class="col-md-12">
          <div class="box box-success box-solid">
            
            <!-- /.box-header -->
            <form method="get"  action="" >
              <div class="box-body">

                <input type="hidden" name="view" value="lista_compra">

              <div class="col-md-3">
                <div class="row">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon text-green"><i class="fa fa-calendar"></i> Fecha inicio</span>
                      <input type="date" name="start" class="form-control" value="<?php if(isset($_GET['start'])){ echo $_GET['start']; } ?>">
                    </div>
                  </div>
                 </div>
              </div>

              <div class="col-md-3">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon text-green" ><i class="fa fa-calendar"></i> Fecha fin</span>
                      <input type="date" name="end" class="form-control" value="<?php if(isset($_GET['end'])){ echo $_GET['end']; } ?>">  
                    </div>
                  </div>  
              </div>

              

              <div class="col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <button  type="submit" class="btn btn-success pull-right" ><i class='fa fa-file-pdf-o'></i> Buscar</button> 
                    </div>
                  </div> 
              </div>
                
 
              </div>
 
             

          </form>

          </div>
          <!-- /.box -->
      </div>

</div>


<?php if(isset($_GET['start']) and $_GET['start']!="" and isset($_GET['end']) and $_GET['end']!=""){ ?>
<section>
<div class="row">

  <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->

          <div class="nav-tabs-custom">
            
                <?php if(isset($_GET['start']) and $_GET['start']!="" and isset($_GET['end']) and $_GET['end']!=""){
                  $compras = VentaData::getFiltroFechas($_GET['start'],$_GET['end']);
                }else{ 
                  $compras = VentaData::getAll(); 
                } ?> 
                <?php  
                if(count($compras)>0){  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: black; background-color: #d2d6de;">
         
                        <th >Comprobante</th>
                        <th >Nro. comprobante</th>
                        <th >Fecha</th>
                        <th>Proveedor</th>
                        <th data-hide="phone">Total</th>
                        <th data-hide='phone, tablet'>Responsable</th> 

                        <th></th>
                  </thead> 
                   <?php foreach($compras as $compra):?> 
                      <tr> 
           
                        <td><b><?php echo $compra->getTipoComprobante()->nombre; ?></b></td>
                        <td><?php echo $compra->nro_comprobante; ?></td>
                        <td><?php echo $compra->fecha_creada; ?></td>
                        <td><?php if($compra->id_proveedor!=NULL){ echo $compra->getProveedor()->razon_social;}else{ echo "--------";} ?></td>
                        <td><?php echo number_format($compra->total,2,'.',','); ?></td>
                        <td><?php if($compra->id_usuario!=NULL){ echo $compra->getUsuario()->name;}else{ echo "--------";} ?></td>
                         
                        
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $compra->id; ?>"  class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver detalles</a>

                         <div class="modal fade bs-example-modal-lg" id="myModal<?php echo $compra->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
          
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateroom" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">DETALLES COMPRA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
                      <table id="tbldetalle" class="table table-xxs">
                                <thead>
                                  <tr class="bg-blue">
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Cant.</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Importe</th> 
                                   
                                    
                                  </tr>
                                </thead> 
                                <tbody >
                                <?php $detalles = ProcesoVentaData::getByAllCompra($compra->id); ?>
                                    <?php $sumador_total=0; ?>
                                  <?php foreach($detalles as $detalle): ?>
                                  <tr> 
                                          <td></td>
                                          <td><?php if($detalle->id_producto!=null){echo $detalle->getProducto()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
                                          <td><?php echo $detalle->cantidad; ?></td>
                                          <td>$  <?php echo number_format($detalle->precio,2,'.',','); ?></td>
                                          <?php $sumar_t=$detalle->cantidad*$detalle->precio; ?>
                                          <td>$  <?php echo number_format($sumar_t,2,'.',','); ?></td>
                                  
                                   
                                    
                                     </tr>
                                      
                                    
                                  
                                          
                                  <?php
                                  $sumador_total+=$sumar_t;
                                endforeach ?>
                                      <tr style="background-color: #f3f3f3;">
                                          <td colspan=4><span class="pull-right">SUBTOTAL </span></td>
                                          <td><span class="pull-left"><?php echo '$  '.number_format(($sumador_total/1.18),2,'.',',');?></span></td>
                                      
                                      </tr>
                                      <tr style="background-color: #f3f3f3;">
                                          <td colspan=4><span class="pull-right">IGV </span></td>
                                          <td><span class="pull-left"><?php echo '$  '.number_format($sumador_total-($sumador_total/1.18),2,'.',',');?></span></td>
                                         
                                      </tr>
                                      <tr style="background-color: #e4e4e4;">
                                          <td colspan=4><span class="pull-right">TOTAL </span></td>
                                          <td><span class="pull-left"><?php echo '$  '.number_format($sumador_total,2,'.',',');?></span></td>
                                          
                                      </tr>
                                </tbody>
                                
                              </table>
                  
                 
                  
                </div>
                </div>

              </div>
          
            
            </div>
            <!-- /.modal-content -->
         
        </div>
        <!-- /.modal -->
      </div>
                              

                        </td>
                      </tr> 
                  

   
                    <?php endforeach; ?>
                    </tbody>
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="7" class="text-center">
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

    </div>
</div>

</section>


<?php }; ?>





       
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
    
