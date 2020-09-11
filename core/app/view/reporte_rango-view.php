
<?php 
     date_default_timezone_set('America/Lima');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
 if(isset($_POST['start'])){                   
?>

<style type="text/css">
  table.dataTable thead .sorting:after {
    opacity: 0.0;
    content: "\e150";
}

table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after {
    opacity: 0.0;
}
</style>
<div class="row">

 <section class="content-header">
      <h3>
        <span class="fa fa-file-text-o"></span> REPORTE POR RANGO DE FECHA 
        <small>Avance</small>
      </h3> 
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Reportes</a></li>
        <li class="active">Reporte Por rango</li>
      </ol>
</section>
</div>




<style type="text/css">
  
  .hh:hover{
    background-color: white;
  }
  .small-box-footer {
    position: relative;
    text-align: center;
    padding: 0px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.nav-tabs-custom>.nav-tabs>li>a {
    color: #3c8dbc;
    font-weight: bold;
    border-radius: 0 !important;
}
.nav-tabs-custom>.nav-tabs>li.active {
    border-top-color: #00a65a;
}
.h5, h5 {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>



<br>


<div class="row">
<?php  echo 'INICIO: '.$_POST['start']; ?><br>
<?php  echo 'FINAL: '.$_POST['end']; ?>
  <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" style="background-color: #d2d6de;">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tabla alquiler</a></li>
              
              <li class="pull-right text-red"><a href="javascript:print();"  class="text-muted"><i class="fa fa-print"></i> IMPRIMIR</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1"> 
                <?php $reportediarios = ProcesoData::getIngresoRangoFechas($_POST['start'],$_POST['end']);
                if(count($reportediarios)>0){
                  // si hay usuarios 
                  ?>
                  <table id="example1" class="table table-bordered table-hover">

                  <thead style="color: black; background-color: #d2d6de;">
                        <th>Nº</th> 
                        <th>Cliente</th> 
                        <th>Cliente Nombres</th> 
                        <th>Habitación</th>

                        <th>Total</th>
                        <th>Hora ingreso</th>
                        <th>Hora salida</th> 
                        <th>Usuario</th>
                  </thead> 
                   <?php $numero=0;?>
                   <?php $total=0;?>
                   <?php foreach($reportediarios as $reportediario):?>
                   <?php $numero=$numero+1;?>
                      <tr>
                        <td><?php echo $numero; ?></td>
                        <td><?php echo $reportediario->getCliente()->documento; ?></td>
                        <td><a href="#"  data-toggle="modal" data-target="#mostrar_cliente<?php echo $reportediario->id; ?>" ><?php echo $reportediario->getCliente()->nombre; ?></a>

                          <!-- Modal -->
                          <div class="modal fade bs-example-modal-lg" id="mostrar_cliente<?php echo $reportediario->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header"> 
                               
                          
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                              <h4 class="modal-title" id="myModalLabel">Lista de huéspedes</h4>
                              </div>
                               <div class="modal-body">
                                
                                <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">
                                  <thead style="color: white; background-color: #827e7e;">
                                      <tr>
                                      
                                        <th>Tipo documento</th>
                                        <th data-hide="phone">Documento</th>
                                        <th data-hide='phone, tablet'>Nombres completos</th>
                                        <th data-hide='phone, tablet'>Fecha nac.</th>  
                                        <th data-hide='phone, tablet'>Procedencia</th> 
                                        <th data-hide='phone, tablet'>Nacionalidad</th> 
                                        <th data-hide='phone, tablet'>Estado civil</th> 
                                        <th data-hide='phone, tablet'>Ocupación</th> 
                                        <th data-hide='phone, tablet'>Medio transporte</th> 
                                        <th data-hide='phone, tablet'>Destino</th> 
                                        <th data-hide='phone, tablet'>Motivo</th> 
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $tmps = ClienteProcesoData::getAllProceso($reportediario->id); 
                                      foreach($tmps as $p):  ?>
                                            <tr>
                                              
                                              <td><b><?php echo $p->getCliente()->getTipoDocumento()->nombre; ?></b></td>
                                              <td><?php echo $p->getCliente()->documento; ?></td>
                                              <td><?php echo $p->getCliente()->nombre; ?></td>
                                              
                                              <td><?php if($p->getCliente()->fecha_nac!=NULL and $p->getCliente()->fecha_nac!='0000-00-00'){ echo $p->getCliente()->fecha_nac;}else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->direccion!="NULL"){ echo $p->getCliente()->direccion; }else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->nacionalidad!="NULL"){ echo $p->getCliente()->nacionalidad; }else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->estado_civil!="NULL"){ echo $p->getCliente()->estado_civil; }else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->ocupacion!="NULL"){ echo $p->getCliente()->ocupacion; }else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->medio_transporte!="NULL"){ echo $p->getCliente()->medio_transporte; }else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->destino!="NULL"){ echo $p->getCliente()->destino; }else{ echo "--------";} ?></td>
                                              <td><?php if($p->getCliente()->motivo!="NULL"){ echo $p->getCliente()->motivo; }else{ echo "--------";} ?></td>

                                              
                                            </tr> 
                                        

                                      <?php endforeach; ?>
                                         
                                          
                                        </table>
                                                               
                             
                              
                                        
                                </div>
                          
                            
                            </div>
                            </div>
                          </div>
                          <!-- /.Modal -->

                        </td>

                        


                        <td><?php echo $reportediario->getHabitacion()->nombre; ?></td>
                       
                        <?php $subtotal= $reportediario->cant_noche*$reportediario->precio; ?>
                        <td>$   <?php echo number_format($subtotal,2,'.',','); ?></td>
                        <td><?php echo date($reportediario->fecha_entrada); ?></td>
                        <td><?php echo date($reportediario->fecha_salida); ?></td>
                        <td><?php echo $reportediario->getUsuario()->name;; ?></td>
                      </tr> 
                            <?php $total=$subtotal+$total; ?>
                    <?php endforeach; ?>

                     <tfoot style="color: black; background-color: #e3e4e6;">
                        <th colspan="4"><p class="pull-right">Total</p></th>
                        <th><b>$   <?php echo number_format($total,2,'.',','); ?> </b></th> 
                        <th></th>
                        <th></th>
                        <th></th>
                    </tfoot>

                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>
              </div>
              
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

    </div>
</div>

</section>


<?php } ?>

     
      
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
   
  });
</script>

<script>
  $(function () {
    $("#example2").DataTable();
   
  });
</script>
