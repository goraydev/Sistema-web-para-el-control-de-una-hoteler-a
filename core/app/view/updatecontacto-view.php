<?php

if(count($_POST)>0){

	$contacto = ContactoData::getById($_POST["id_contacto"]);
	$contacto->documento = $_POST["documento"];
	$contacto->nombre = $_POST["nombre"];
	 
	$telefono="NULL";
  if($_POST["telefono"]!=""){ $telefono=$_POST["telefono"];}

  $email="NULL";
  if($_POST["email"]!=""){ $email=$_POST["email"];}

  


	$contacto->telefono = $telefono;  
	$contacto->email = $email;

	$contacto->update();
	$id = $_POST["id_persona"];

print "<script>window.location='index.php?view=contacto&id=$id';</script>";


}


?>