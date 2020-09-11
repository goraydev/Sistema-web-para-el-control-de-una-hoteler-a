<?php

if(count($_POST)>0){

	$producto = new ProductoData();
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

	  $id_proveedor="0";
	  if($_POST["id_proveedor"]!=""){ $id_proveedor=$_POST["id_proveedor"];}
	   

	$producto->presentacion = $presentacion;
	$producto->marca = $marca;
	$producto->descripcion = $descripcion;
	$producto->precio_compra = $precio_compra;
	$producto->precio_venta = $_POST["precio_venta"];
	$producto->stock = $_POST["stock"];
	$producto->id_proveedor = $id_proveedor;

	$producto->add();

print "<script>window.location='index.php?view=productos';</script>";


}


?>