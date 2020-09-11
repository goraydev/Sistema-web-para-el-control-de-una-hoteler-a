<?php

if(count($_POST)>0){

	$cliente = new ClienteData();
	
	$cliente->email = $_POST["email"];
	$cliente->nombres = $_POST["nombres"];
	$cliente->apellidos = $_POST["apellidos"];
	$cliente->usuario = $_POST["usuario"];
	$cliente->password = $_POST["password"]; 

	$telefono="NULL";
  if($_POST["telefono"]!=""){ $telefono=$_POST["telefono"];}

  $direccion="NULL";
  if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}

	$cliente->telefono = $telefono;
	$cliente->direccion = $direccion;

	$cliente->add();

print "<script>window.location='index.php?view=cliente';</script>";


}


?>