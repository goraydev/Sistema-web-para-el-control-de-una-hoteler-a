<?php

if(count($_POST)>0){

	$cliente = PersonaData::getById($_POST["id_cliente"]);
	$cliente->limite = $_POST["limite"];
	$cliente->vip = $_POST["vip"];
	$cliente->updateVip(); 

print "<script>window.location='index.php?view=cliente';</script>";


}

?>