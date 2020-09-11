<?php

if(count($_POST)>0){

	$producto = ProductoData::getById($marca=$_POST["id_producto"]);
	$producto->codigo = $_POST["codigo"];
	$producto->nombre = $_POST["nombre"];
 
		$marca="NULL";
	  if($_POST["marca"]!=""){ $marca=$_POST["marca"];}

	  $presentacion="NULL";
	  if($_POST["presentacion"]!=""){ $presentacion=$_POST["presentacion"];}

	  $descripcion="NULL";
	  if($_POST["descripcion"]!=""){ $descripcion=$_POST["descripcion"];}

	  $precio_compra="0";
	  if($_POST["precio_compra"]!=""){ $precio_compra=$_POST["precio_compra"];}

	$producto->presentacion = $presentacion;
	$producto->marca = $marca;
	$producto->descripcion = $descripcion;
	$producto->precio_compra = $precio_compra;
	$producto->precio_venta = $_POST["precio_venta"];
	$producto->stock = $_POST["stock"];


	$producto->update();

print "<script>window.location='index.php?view=productos';</script>";


}


?>