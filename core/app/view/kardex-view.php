

<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="javascript:;">Inventario</a></li>
      <li class="active"><a href="#">Kardex de Productos</a></li>
    </ol>
</section> 

</div> 




<div id="reload-full-div">
	<div class="breadcrumb-line">
		
	  <div class="row">
		 <div class="breadcrumb col-lg-12">
				<div style="background-color: #16a085;color: white;padding: 2px;font-size: 20px;
				text-align: center; text-transform: uppercase;font-weight: bold;width: 100%;">
					<span>
					resumen de saldos y movimientos de productos</span>
			    </div>
	   	  </div>
	  </div>
	</div>
	<br> 
	 <div class="row">
		 <div class="col-sm-12 col-md-12">
		 	<form role="form" autocomplete="off" class="form-validate-jquery" id="" method="get">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-2">
              <label>AÑO</label>

              <input type="hidden" name="view" value="kardex">
 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <!--
                <input type="text" id="txtMes" name="txtMes" placeholder=""
                 class="form-control input-sm" style=""> -->
                 <?php  
                    if(isset($_GET['anio']) and isset($_GET['mes']) and $_GET['anio']!=''){
                        $me= $_GET['mes'];
                        $anio= $_GET['anio'];
                    }else{
                        $me= '00';
                        $anio= date("Y"); 
                    }
                            
                  ?>
                 <select class="form-control" name="anio">
                   <option value="2017" <?php if($anio=='2017'){ echo "selected";}; ?>>2017</option>
                   <option value="2018" <?php if($anio=='2018'){ echo "selected";}; ?>>2018</option>
                   <option value="2019" <?php if($anio=='2019'){ echo "selected";}; ?>>2019</option>
                   <option value="2020" <?php if($anio=='2020'){ echo "selected";}; ?>>2020</option>
                   <option value="2021" <?php if($anio=='2021'){ echo "selected";}; ?>>2021</option>
                   <option value="2022" <?php if($anio=='2022'){ echo "selected";}; ?>>2022</option>
                 </select>
               </div>
            </div>
            <div class="col-sm-3">
              <label>MES PAGO</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <!--
                <input type="text" id="txtMes" name="txtMes" placeholder=""
                 class="form-control input-sm" style=""> -->
                 <select class="form-control" name="mes">
                  <option value="00" <?php if($me=='00'){ echo "selected";}; ?>>--- Todos ---</option>
                   <option value="01" <?php if($me=='01'){ echo "selected";}; ?>>Enero</option>
                   <option value="02" <?php if($me=='02'){ echo "selected";}; ?>>Febrero</option>
                   <option value="03" <?php if($me=='03'){ echo "selected";}; ?>>Marzo</option>
                   <option value="04" <?php if($me=='04'){ echo "selected";}; ?>>Abril</option>
                   <option value="05" <?php if($me=='05'){ echo "selected";}; ?>>Mayo</option>
                   <option value="06" <?php if($me=='06'){ echo "selected";}; ?>>Junio</option>
                   <option value="07" <?php if($me=='07'){ echo "selected";}; ?>>Julio</option>
                   <option value="08" <?php if($me=='08'){ echo "selected";}; ?>>Agosto</option>
                   <option value="09" <?php if($me=='09'){ echo "selected";}; ?>>Setiembre</option>
                   <option value="10" <?php if($me=='10'){ echo "selected";}; ?>>Octubre</option>
                   <option value="11" <?php if($me=='11'){ echo "selected";}; ?>>Noviembre</option>
                   <option value="12" <?php if($me=='12'){ echo "selected";}; ?>>Diciembre</option>
                 </select>
               </div>
            </div>
            <div class="col-sm-4">
              <button style="margin-top: 27px;" id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
              <i class="fa fa-search"></i> Consultar</button>
            </div>
          </div>
        </div>
        </form>
	   	  </div>
	  </div>









<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12">
    <section class="tile">

             <div class="tile-header dvd dvd-btm">  
                <h1 class="custom-font"><strong>Kardex</strong>  </h1>




                <ul class="controls">
                 
                  <li class="dropdown">
                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                    <i class="fa fa-print"></i><i class="fa fa-print"></i> Imprimir Reporte
                    </a>
                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                        <li><a id="print_saldos" href="reporte/pdf/documentos/reporte_kardex_todo.php?anio=<?php echo $anio; ?>&mes=<?php echo $me; ?>" target="_blanck"
								><i class="icon-file-pdf"></i> Saldos y Movimientos</a></li>
						<li class="divider"></li>
						<li><a id="print_entradas" href="reporte/pdf/documentos/reporte_kardex_entrada.php?anio=<?php echo $anio; ?>&mes=<?php echo $me; ?>" target="_blanck">
						<i class="icon-file-pdf"></i> Entradas del Mes</a></li>
						<li class="divider"></li>
						<li><a id="print_salidas" href="reporte/pdf/documentos/reporte_kardex_salida.php?anio=<?php echo $anio; ?>&mes=<?php echo $me; ?>" target="_blanck">
						<i class="icon-file-pdf"></i> Salidas del Mes</a></li>
                    </ul>
                  </li>
                  <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                </ul>
              </div>


           <div class="tile-body">
            <div class="form-group">
              <label for="filter" style="padding-top: 5px">Buscar:</label>
              <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
            </div>


              <?php $productos = ProductoData::getAll();
                if(count($productos)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #827e7e;">
                        <th>Nro</th> 
                        <th>PRODUCTO</th>
                        <th>MARCA</th>
                        <th>SALDO INICIAL</th>
                        <th>ENTRADAS</th>
                        <th>SALIDAS</th>
                        <th>SALDO</th>
                        
                  </thead>
                   <?php foreach($productos as $producto):?>
                      <tr>

                        <?php  
                            if(isset($_GET['anio']) and isset($_GET['mes']) and $_GET['anio']!='' and $_GET['mes']!='00'){

                                    $entrada_producto=0; 
                                    $entradas = ProcesoVentaData::getAllEntradasMes($producto->id,$_GET['mes'],$_GET['anio']);
                                    if(count($entradas)>0){ 
                                      foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto;  
                                      endforeach;
                                    }else{ $entrada_producto=0; }; 


                                     $salida_producto=0;
                                     $salidas = ProcesoVentaData::getAllSalidasMes($producto->id,$_GET['mes'],$_GET['anio']);
                                     if(count($salidas)>0){ 
                                     foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto;  
                                      endforeach; 
                                     }else{ $salida_producto=0; }; 

                              
                            }else{

                                    $entrada_producto=0; 
                                    $entradas = ProcesoVentaData::getAllEntradas($producto->id);
                                    if(count($entradas)>0){ 
                                      foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto;  
                                      endforeach;
                                    }else{ $entrada_producto=0; }; 



                                    $salida_producto=0;
                                     $salidas = ProcesoVentaData::getAllSalidas($producto->id);
                                     if(count($salidas)>0){ 
                                     foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto;  
                                      endforeach; 
                                     }else{ $salida_producto=0; }; 

                            }
                            
                        ?>

                        <td><?php echo $producto->codigo; ?></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td><?php if($producto->marca!="NULL"){ echo $producto->marca;}else{ echo "------"; } ?></td>
                        <td><?php echo $producto->stock; ?></td>

                        

                        
 
                        <td><?php echo $entrada_producto; ?></td>

               			    <td><?php echo $salida_producto; ?></td>
                       
                        <td><?php echo ($producto->stock + $entrada_producto) - $salida_producto; ?></td>
                        
                        
                      </tr> 
                    



                      

<?php endforeach; ?>
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
</section>

</div>
</div>



       <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
      
        
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>
