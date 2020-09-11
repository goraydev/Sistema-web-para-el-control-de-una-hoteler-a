<?php

if(count($_POST)>0){

	$tarifa = new TarifaHabitacionData();
	$tarifa->id_habitacion = $_POST["id_habitacion"];
	$tarifa->id_tarifa = $_POST["id_tarifa"];
	$tarifa->precio = $_POST["precio"];
	$tarifa->add();

	$id=$_POST["id_habitacion"];
print "<script>window.location='index.php?view=ha_tarifas&id=$id';</script>";

}

?>