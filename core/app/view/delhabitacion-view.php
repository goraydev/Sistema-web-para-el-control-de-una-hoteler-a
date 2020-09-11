<?php


$habi = HabitacionData::getById($_GET["id"]);
$habi->del();

$dels = ProcesoData::getProcesoHabitacion($_GET['id']);
	foreach($dels as $del):
		$eliminar = ProcesoData::getById($del->id);
		$eliminar->del();
	endforeach;

Core::redir("./index.php?view=habitacion");
?>