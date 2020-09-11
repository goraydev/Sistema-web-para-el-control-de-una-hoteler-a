
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
 

    <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
 
<div class="row">

 <section class="content-header">
      <h1 >
        <span class="fa fa-hotel"></span> PROCESO DE VENTA DE PRODUCTO
        <small>Avance</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Punto de venta</a></li>
        <li class="active">Proceso venta</li>
      </ol>
</section>
</div> 
 
<?php 
if(isset($_GET['id'])){
$habitacion = ProcesoData::getById($_GET['id']);
if(count($habitacion)>0){ ?>
<div class="row">

<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addventa" role="form">
	<input type="hidden" name="id_operacion" value="<?php echo $habitacion->id; ?>">
	<section>

		<div class="col-md-6">
			<br> 

            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top: 2px solid black;">
                  <b>Nombre habitación</b> <a class="pull-right"><?php echo $habitacion->getHabitacion()->nombre; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tipo habitación</b> <a class="pull-right"><?php echo $habitacion->getHabitacion()->getCategoria()->nombre; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Costo habitación</b> <a class="pull-right"><b>$   <?php echo number_format($habitacion->precio,2,'.',','); ?></b></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
   
         </div>
         <div class="col-md-6">
		<br>

            <div class="box-body box-profile">

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top: 2px solid black;">
                  <b>Nombre cliente</b> <a class="pull-right"><?php echo $habitacion->getCliente()->nombre; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Documento cliente</b> <a class="pull-right"><?php echo $habitacion->getCliente()->documento; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Fecha entrada</b> <a class="pull-right"><?php echo $habitacion->fecha_entrada; ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
  
         </div>

        <div class="col-md-12">
          

              <div class="box-footer" style="background-color: #2b3c51;">
              	<div class="col-md-2">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
					<span class="glyphicon glyphicon-plus"></span> Agregar productos
				</button>
			    </div>

				<div class="col-md-3">
				<select class="form-control pull-right" name="pagado">
					<option value="1">PAGADO</option>
					<option value="2">FALTA PAGAR</option>
				</select>
			    </div>
				
                <button type="submit" class="btn btn-success pull-right" >
					<span class="glyphicon glyphicon-save"></span> Terminar venta
				</button>
              </div>

         
        </div>

        <div class="col-md-12">
        	<div id="resultados"></div>
        	
        </div>

	</section>
</form>
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
            
            
	<script> 
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var parametros={"page":page,"q":q};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./?action=buscar_producto',
				data: parametros,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="core/pedidos/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				} 
			})
		}
	</script>
	<script>
	function agregar (id)
		{
			var precio_venta=$('#precio_venta_'+id).val();
			var cantidad=$('#cantidad_'+id).val();
			var descripcion=$('#descripcion_'+id).val();
			//Inicia validacion
			if (isNaN(cantidad)) 
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta_'+id).focus();
			return false;
			}
			
			//Fin validacion
		var parametros={"id":id,"precio_venta":precio_venta,"cantidad":cantidad};	
		$.ajax({
        type: "POST",
        url: "./?action=agregar_tmp",
        data: parametros, 
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
		
			
		
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "./?action=agregar_tmp",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

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