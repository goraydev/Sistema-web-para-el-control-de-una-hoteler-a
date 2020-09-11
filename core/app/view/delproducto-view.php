<?php


$habi = ProductoData::getById($_GET["id"]);
$habi->del();

$dels = ProcesoVentaData::getProcesoProductoo($_GET['id']);
	foreach($dels as $del):
		$eliminar = ProcesoVentaData::getById($del->id);
		$eliminar->del();
	endforeach;



Core::redir("./index.php?view=productos");
?>