<?php
$session_id= session_id();

$tmps = TmpData::getAllTemporalCompra($session_id);
if(count($tmps)>0){


if(count($_POST)>0){
  
	$cajas = CajaData::getAllAbierto(); 
 	if(count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}

 	$total=0;
 	$tmpes = TmpData::getAllTemporalCompra($session_id); 
	foreach($tmpes as $p): 
		$total=($p->precio_tmp*$p->cantidad_tmp)+$total;
	endforeach;
  
 		$venta = new VentaData();  
		$venta->id_tipo_comprobante= $_POST['id_tipo_comprobante'];
		$nro_comprobante="NULL";
  		if($_POST["nro_comprobante"]!=""){ $nro_comprobante=$_POST["nro_comprobante"];}
		$venta->nro_comprobante = $nro_comprobante;
		$venta->id_proveedor='NULL';
		$venta->id_tipo_pago=1;
		$venta->total= $total;
		$venta->id_usuario = $_SESSION["user_id"];
		$venta->id_caja = $id_caja;
		$v=$venta->addCompra();


	$tmps = TmpData::getAllTemporalCompra($session_id); 
	foreach($tmps as $p): 
		
		$procesoventa = new ProcesoVentaData();  
		$procesoventa->id_producto=$p->id_producto;
		$procesoventa->id_caja=$id_caja; 
		$procesoventa->id_usuario=$_SESSION["user_id"];
		$procesoventa->id_venta=$v[1];
		$procesoventa->cantidad=$p->cantidad_tmp;
		$procesoventa->precio=$p->precio_tmp; 
		$procesoventa->tipo_operacion=$p->tipo_operacion; 


		$procesoventa->addCompra();
	endforeach;
	 
	$dels = TmpData::getAllTemporalCompra($session_id);
	foreach($dels as $del):
		$eliminar = TmpData::getById($del->id_tmp);
		$eliminar->del();
	endforeach;


print "<script>window.location='index.php?view=kardex';</script>";

}


}else{ ?>
	<script type="text/javascript">
	alert("Alerta!! No se agregó ningún producto");
</script>
<?php 
print "<script>window.location='index.php?view=compra';</script>";

}

?>

