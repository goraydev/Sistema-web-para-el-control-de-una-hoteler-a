<?php

if(count($_POST)>0){

	$cliente = new PersonaData();
	$cliente->tipo_documento = $_POST["tipo_documento"];
	$cliente->documento = $_POST["documento"];
	$cliente->nombre = $_POST["nombre"];

	$razon_social="NULL";
  if($_POST["razon_social"]!=""){ $razon_social=$_POST["razon_social"];}

  
  $direccion="NULL";
  if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}

 
 

	$cliente->razon_social = $razon_social;
	$cliente->direccion = $direccion;
 
	$cliente->addProveedor();

print "<script>window.location='index.php?view=proveedores';</script>";


}


?>