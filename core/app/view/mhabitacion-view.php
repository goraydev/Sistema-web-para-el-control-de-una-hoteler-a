<?php

if(count($_GET)>0){

	$habitacion = HabitacionData::getById($_GET['id']);
	$habitacion->estado = 4;

	$habitacion->updateEstado();

print "<script>window.location='index.php?view=habitacion';</script>";


}


?>