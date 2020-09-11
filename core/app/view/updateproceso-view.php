<?php

if(count($_POST)>0){ 

	$proceso = ProcesoData::getById($_POST["id_proceso"]); 
	$proceso->id_habitacion = $_POST["id_habitacion"]; 
	$proceso->id_tarifa = $_POST["id_tarifa"]; 
	$proceso->precio = $_POST["precio"];
	$proceso->updateHabitacionTarifa(); 

	$habitacion = HabitacionData::getById($_POST["id_habitacion"]);
	$habitacion->estado = 2;
	$habitacion->updateEstado();

	$habitacion1 = HabitacionData::getById($_POST["id_habitacion_pre"]);
	$habitacion1->estado = 3;
	$habitacion1->updateEstado();

 
print "<script>window.location='index.php?view=recepcion';</script>";


}

?>