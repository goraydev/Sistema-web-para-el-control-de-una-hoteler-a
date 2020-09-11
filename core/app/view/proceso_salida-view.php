<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	 
<?php 
$clientes = PersonaData::getAll();

date_default_timezone_set('America/Lima');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");

?>

	<link rel="stylesheet" href="plugins/select2/select2.min.css">


<style type="text/css">
	
	.list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #ecf0f5;
    border: 1px solid #ddd;
}
 
</style>
<body onload="document.getElementById('numero2').focus();">
<div class="row">

 <section class="content-header">
      <h3 >
       <i class='fa fa-sign-out'></i> PROCESO CHECK OUT 
        <small>Avance</small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Check out</a></li>
        <li class="active">Proceso check out</li>
      </ol>
</section>
</div>

<?php 
if(isset($_GET['id'])){
$habitacion = ProcesoData::getById($_GET['id']);
if(count($habitacion)>0){ ?>
<div class="row"> 
 

 <?php 
$cliente = PersonaData::getById($habitacion->id_cliente);

 ?>

	<input type="hidden" name="id_operacion" value="<?php echo $habitacion->id; ?>">
	<section>
		<div class="row">
		<div class="col-md-3">
			<br>
 
            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top: 2px solid black;">
                  <b>Nombre habitación</b> <a class="pull-right"><?php echo $habitacion->getHabitacion()->nombre; ?></a>
                </li>
                <li class="list-group-item"> 
                  <b>Tipo </b> <a class="pull-right"><?php echo $habitacion->getHabitacion()->getCategoria()->nombre.' / Tarifa: '. $habitacion->getTarifaHabitacion()->getTarifa()->nombre; ?></a>
                </li>
                
                
              </ul>
            </div>
            <!-- /.box-body -->
   
         </div>
         <div class="col-md-5">
		<br>

            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top: 2px solid black;">
                  <b>Nombre </b> <a href="#"  data-toggle="modal" data-target="#mostrar_cliente"  class="pull-right"><?php echo $habitacion->getCliente()->nombre; ?></a>
                </li>
                <li class="list-group-item">
                  <b>E-mail cliente</b> <a class="pull-right"><?php echo $habitacion->getCliente()->documento; ?></a>
                </li>
                
                <!-- Modal -->
                <div class="modal fade bs-example-modal-lg" id="mostrar_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                              <th data-hide="phone">E-mail</th>
                              <th data-hide='phone, tablet'>Nombres completos</th>
                              <th data-hide='phone, tablet'>RFC</th>  
                              <th data-hide='phone, tablet'>Procedencia</th> 
                              <th data-hide='phone, tablet'>Razón social</th> 
                              <th data-hide='phone, tablet'>Teléfono</th> 
                              <th data-hide='phone, tablet'>Nro toallas</th> 
                               
                              <th data-hide='phone, tablet'>Factura</th> 
                              <th data-hide='phone, tablet'>Nro de folio</th> 
                              <th data-hide='phone, tablet'>Nota</th> 
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php $tmps = ClienteProcesoData::getAllProceso($habitacion->id); 
                            foreach($tmps as $p):  ?>
                                  <tr> 
                                    
                                    <td><b><?php echo $p->getCliente()->getTipoDocumento()->nombre; ?></b></td>
                                    <td><?php echo $p->getCliente()->documento; ?></td>
                                    <td><?php echo $p->getCliente()->nombre; ?></td>
                                    
                                    <td><?php if($p->getCliente()->giro!=NULL and $p->getCliente()->giro!='0000-00-00'){ echo $p->getCliente()->giro;}else{ echo "--------";} ?></td>
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



              </ul>
            </div>
            <!-- /.box-body -->
  
         </div>

         <div class="col-md-4">
		<br>
<?php 
$fecha1 = new DateTime($habitacion->fecha_entrada);//fecha inicial
  $fecha2 = new DateTime($hoy.' '.$hora);//fecha de cierre

  $horaf = $fecha1->diff($fecha2);
  $minutos = $fecha1->diff($fecha2);

  $contar_dias=$horaf->format('%d');
  $contar_hora=$horaf->format('%H');
  $contar_minutos=$horaf->format('%i');
  $contar_horas=$contar_hora+($contar_dias*24);
?>

            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top: 2px solid black;">
                  <b>Fecha y Hora entrada</b> <b><a class="pull-right" style="color: #dd4b39;"><?php echo $habitacion->fecha_entrada; ?></a></b>
                </li>
                <li class="list-group-item">
                  <b>Fecha y Hora salida</b> <b><a class="pull-right" style="color: #dd4b39;"><?php echo $habitacion->fecha_salida; ?></a></b>
                </li>
                
              </ul>
            </div>
            <!-- /.box-body -->
  
         </div>


        </div>


<?php 

      $total_alojamiento=0; 
      if($contar_horas<=24 and $contar_dias==0 ){

        $total_alojamiento=$habitacion->getHabitacion()->precio * 1;

      }else if($contar_dias!=0 and $contar_hora<=12){

       $total_alojamiento=$habitacion->getHabitacion()->precio * $contar_dias;


      }else if($contar_dias!=0 and $contar_hora>12 ){

        $total_alojamiento=$habitacion->getHabitacion()->precio * ($contar_dias + 1);

      };
  

  ?>




   		<div class="col-md-12">
          <div class="box box-default" >
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
              	<tr style="background-color: #dcd6d6;">
                  <th style="width: 10px;border-right: 1px solid #a09e9e;"></th>
                  <th colspan="4" style="border-right:1px solid #a09e9e;">Costo del alojamiento</th>
                  <th style="width: 100px"></th>
                </tr> 
                <tr>
                  <th style="width: 10px;border-right: 1px solid #a09e9e;">#</th>
                  
                  <th>Costo por tarifa </th>
                  <th>Cant. noches</th>
                  <th style="border-right:1px solid #a09e9e;" colspan="2">Carga por salir tarde</th>
                  
                  <th style="width: 40px"></th>
                </tr>
             <form action="index.php?view=addsalida" method="post" name="sumar">
                <tr>
                  <td style="border-right: 1px solid #a09e9e;">1.</td>
            
                  <td >$  <?php echo number_format($habitacion->precio,2,'.',','); ?></td>
                  <td ><b> <?php echo $habitacion->cant_noche; ?></b></td>
                  <script>
                  function fncSumar(){ 
                  caja=document.forms["sumar"].elements;
                  var numero = Number(caja["numero"].value);
                  var numero1 = Number(caja["numero1"].value);
                  var numero2 = Number(caja["numero2"].value);
                  var subtotal = Number(caja["subtotal"].value);
                  resultado=numero2;
                  total=resultado+subtotal;
                  if(!isNaN(resultado)){
                  caja["resultado"].value=(numero*numero1)+numero2;
                  }
                  if(!isNaN(total)){
                  caja["total"].value=resultado+subtotal;
                  }
                  }
                  </script>

                 
                  <input type="hidden" name="numero" size="2" value="<?php echo $habitacion->precio; ?>" onKeyUp="fncSumar()">
                  
                  <input type="hidden" name="numero1" size="2" value="<?php echo $habitacion->cant_noche; ?>" onKeyUp="fncSumar()" >

                  <td style="border-right: 1px solid #a09e9e;" colspan="2"><input type="number" value="0" id="numero2" name="numero2" size="2" onKeyUp="fncSumar()" onchange="fncSumar()" min="0"></td>

                  <td><input type="text" value="<?php echo $habitacion->precio*$habitacion->cant_noche; ?>" style="border-color: red;" readonly="readonly" name="resultado"/></td>
                
                </tr>

                <tr style="background-color: #dcd6d6;">
                  <th style="width: 10px;border-right: 1px solid #a09e9e;"></th>
                  <th colspan="4" style="border-right: 1px solid #a09e9e;">Servicio al cuarto</th>
                  <th style="width: 100px"></th>
                </tr>

                 <tr>
                  <th style="width: 10px;border-right: 1px solid #a09e9e;">#</th>
                  <th>Descripción</th>
                  <th>Precio unitario</th>
                  <th style="border-right:1px solid #a09e9e;">Cantidad</th>
                  <th style="border-right:1px solid #a09e9e;">Estado</th>
                  <th style="width: 40px"> <?php if($habitacion->pagado=='0'){ ?><h4 style="color: red;">FALTA PAGAR</h4><?php }else{ ?><h4 style="color: blue;">PAGADO</h4><?php }; ?></th>
                </tr>

                <?php $total=0;?>
                <?php $productos = ProcesoVentaData::getByAll($_GET['id']);
                      if(count($productos)>0){ ?>
                 	
                   <?php foreach($productos as $producto):?>

		                <tr>
		                  <td style="border-right: 1px solid #a09e9e;">1.</td>

		                  <td><?php echo $producto->getProducto()->nombre; ?></td>
		                  <td><b>$  <?php echo number_format($producto->precio,2,'.',','); ?></b></td>
		                  <td ><?php echo $producto->cantidad; ?></td>
                      <?php if($producto->fecha_creada!=NULL){ ?>
                      <td style="border-right: 1px solid #a09e9e;"><p class="text-green">Pagado</p></td>
                      <?php }else{ ?>
                      <td style="border-right: 1px solid #a09e9e;"><p class="text-red">Falta Pagar</p></td>
                      <?php }; ?>

                      <?php if($producto->fecha_creada!=NULL){ ?>
                      <?php $sub_total=0; ?>
                      <?php }else{ ?>
                      <?php $sub_total=$producto->precio*$producto->cantidad; ?>
                      <?php }; ?>
		                  <td><span class="badge"><b>$   <?php echo number_format($sub_total,2,'.',','); ?></b></span></td>
		                </tr>
		            	<?php $total=$sub_total+$total; ?>
                    <?php endforeach; ?>
            

               <?php }else{ 
           

                };
                ?>


                <tr style="background-color: #dcd6d6;">
                  <th style="width: 10px;border-right: 1px solid #a09e9e;"></th>
                  <th colspan="4" style="border-right: 1px solid #a09e9e;"><p style="float: right;font-size: 18px;">Total $  </p></th>
                  <input type="hidden" name="subtotal" value="<?php echo $total; ?>" onKeyUp="fncSumar()">

                  <?php if($habitacion->pagado=='1'){ $sumarrr=0;}else{ $sumarrr= $habitacion->precio*$habitacion->cant_noche; } ?>
                  <th style="width: 100px;"><b><input type="text" style="border-color: green;" readonly name="total" value="<?php echo $total + $sumarrr; ?>"></b></th>
                </tr>


                 <?php if($habitacion->pagado=='0'){ ?>
                <tr style="background-color: #dcd6d6;">
                  <th style="width: 10px;border-right: 1px solid #a09e9e;"></th>
                  <th colspan="4" style="border-right: 1px solid #a09e9e;"><p style="float: right;font-size: 14px;">Tipo de pago</p></th>
                 
                  <th style="width: 100px;"><b>
                    <select class="form-control" onchange="CargarMediopago(this.value);" required name="id_tipo_pago">
                    
                      <option value="">--- Selecciona ---</option>
                      <option value="1" >EFECTIVO</option>
                      <option value="2" >TARJETA</option>
                      <option value="3" >DEPÓSITO</option>
                       
                    
                    </select> </b>
                  </th>
                </tr>


                <tr style="background-color: #dcd6d6;">
                  <th style="width: 10px;border-right: 1px solid #a09e9e;"></th>
                  <th colspan="4" style="border-right: 1px solid #a09e9e;"><p style="float: right;font-size: 14px;">Nro operación</p></th> 
                 
                  <th style="width: 100px;" id="mostrar_mediopago">
                    
                  </th>
                </tr>
                <?php }else{ ?> 

                  <input type="hidden" name="id_tipo_pago" value="<?php echo $habitacion->id_tipo_pago; ?>">
                  <input type="hidden" name="nro_operacion" value="<?php echo $habitacion->nro_operacion; ?>">


                <?php }; ?>

 
               


                
              </table>
            </div>
           
             <div class="box-footer clearfix">
              
                 <a href="index.php?view=recepcion" class="btn btn-danger"><i class='fa fa-sign-out'></i> Cancelar</a>
	            
	                <input type="hidden" name="id_operacion" value="<?php echo $habitacion->id; ?>">
	                <input type="hidden" name="fecha_salida" value="<?php echo $hoy.' '.$hora; ?>">
	                <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->getHabitacion()->id; ?>">
                 
	                <button type="submit" name="boleta" class="btn btn-success pull-right"><i class='fa fa-print'></i> Imprimir Boleta</button>
                  <button type="submit" name="factura" class="btn btn-warning pull-right" style="margin-right: 10px;"><i class='fa fa-print'></i> Imprimir Factura</button>
 
                  <button type="submit" name="ticket" class="btn btn-primary pull-right" style="margin-right: 10px;"><i class='fa fa-print'></i> Imprimir Ticket</button>
	            
        
            </div>
        </form>
           
          </div>
         </div>

        

	</section>

</div>
<?php }else{
	echo "<h4 class='alert alert-success'>NECESITA SELECCIONAR UNA HABITACIÓN CON HUESPED</h4>";
}; ?>

<?php }; ?>
   


		<!-- Carga los datos ajax -->
	
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					 
			
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">ACEPTAR</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
				  </div>
				   <div class="modal-body">
					  
					   
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
                    
                   </div>
			
				
				</div>
			  </div>
			</div>
            
            


	
		
	
		
	

<script src="plugins/select2/select2.full.min.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();


  });


  function CargarMediopago(val)
{
    $('#mostrar_mediopago').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=salida_mediopago',
        data: 'id='+val,
        success: function(resp){
            $('#mostrar_mediopago').html(resp);
        }
    });
};


function MostrarSelectMedioPago(val)
{
    $('#mostrar_selectmediopago').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=select_mediopago',
        data: 'id='+val,
        success: function(resp){
            $('#mostrar_selectmediopago').html(resp);
        }
    });
};
</script>





