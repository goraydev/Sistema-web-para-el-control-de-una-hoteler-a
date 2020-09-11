

<?php
 $session_id= session_id(); 
$tmps = TmpData::getAllTemporal($session_id);
if(count($tmps)>0){
 
$contador=0;
foreach($tmps as $te):

$entrada_producto=0; 
$entradas = ProcesoVentaData::getAllEntradas($te->id_producto);
if(count($entradas)>0){ 
	foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto; 
	endforeach; 
}else{ $entrada_producto=0; }; 
 

$salida_producto=0; 
$salidas = ProcesoVentaData::getAllSalidas($te->id_producto);
if(count($salidas)>0){
	foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto; 
		endforeach;
}else{ $salida_producto=0; };   


$producto = ProductoData::getById($te->id_producto);

$saldo=($producto->stock + $entrada_producto) - $salida_producto; 
 
if($te->cantidad_tmp>$saldo):
	$contador=$contador+1;
	print "<script>alert('Stock agotado para algunos productos.... ALERTA!!! $contador No se pudo realizar la venta');</script>";
	print "<script>window.location='index.php?view=cancelar_venta';</script>";
endif;


endforeach;                     

  


if(count($_POST)>0 and $contador=='0'){
  
	$cajas = CajaData::getAllAbierto(); 
 	if(count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}
 	
 	$total=0; 
 	$tmpes = TmpData::getAllTemporal($session_id); 
	foreach($tmpes as $p): 
		$total=($p->precio_tmp*$p->cantidad_tmp)+$total;
	endforeach;

 	
 	if(isset($_POST['tipo_id_cliente']) and $_POST['tipo_id_cliente']=='1'){
	$venta = new VentaData();  
		$venta->id_tipo_comprobante= $_POST['id_tipo_comprobante'];
		$venta->id_tipo_pago=1;
		$venta->total= $total;
		$venta->id_usuario = $_SESSION["user_id"];
		$venta->id_caja = $id_caja;
		$v=$venta->addVentaHuesped();
 
 
 
	$tmps12 = TmpData::getAllTemporal($session_id);
	foreach($tmps12 as $p):  
		
		$procesoventa = new ProcesoVentaData(); 
		$procesoventa->id_producto=$p->id_producto; 
		$procesoventa->id_caja=$id_caja; 
		$procesoventa->id_operacion=$_POST['id_operacion'];
		$procesoventa->id_venta=$v[1];
		$procesoventa->cantidad=$p->cantidad_tmp;
		$procesoventa->precio=$p->precio_tmp; 
		$procesoventa->id_usuario = $_SESSION["user_id"];
		if($_POST['pagado']==2){
		$procesoventa->fecha_creada="NULL"; 
		}  
		$procesoventa->add();
	endforeach;




  
	}else{


		if(isset($_POST['nombre_cliente']) and $_POST['nombre_cliente']!=''){
		  $cliente = new PersonaData();
		  $cliente->nombre = $_POST["nombre_cliente"];
		  $s = $cliente->addClienteVenta();
		  $id_cliente=$s[1];
		}else{
			$id_cliente='NULL';
		}
 

		$venta = new VentaData();  
		$venta->id_tipo_comprobante= $_POST['id_tipo_comprobante'];
		$venta->id_tipo_pago=1;
		$venta->total= $total; 
		$venta->id_proveedor=$id_cliente;
		$venta->id_usuario = $_SESSION["user_id"];
		$venta->id_caja = $id_caja;
		$v=$venta->addVenta();

  

	$tmps = TmpData::getAllTemporal($session_id);
	foreach($tmps as $p): 
		 
		$procesoventa = new ProcesoVentaData();
		$procesoventa->id_producto=$p->id_producto; 
		$procesoventa->id_operacion='NULL';
		$procesoventa->id_venta=$v[1];
		$procesoventa->cantidad=$p->cantidad_tmp;
		$procesoventa->precio=$p->precio_tmp; 
		$procesoventa->id_usuario = $_SESSION["user_id"];
		$procesoventa->id_caja = $id_caja;
		if($_POST['pagado']==2){
		$procesoventa->fecha_creada="NULL"; 
		}  
		$procesoventa->add();
	endforeach;

	}


	
	$dels = TmpData::getAllTemporal($session_id);
	foreach($dels as $del):
		$eliminar = TmpData::getById($del->id_tmp);
		$eliminar->del();
	endforeach;

?>
<script type="text/javascript">
	alert("La venta de productos se ha procesado satisfactoriamente");
</script>
<?php 
print "<script>window.location='index.php?view=recepcion';</script>";

}


}else{ ?>
	<script type="text/javascript">
	alert("Alerta!! No se agregó ningún producto");
</script>
<?php 
print "<script>window.location='index.php?view=venta';</script>";

}
?>