<?php


	$proceso = ProcesoSueldoData::getById($_GET["id"]);
	$proceso->updateAnular();

	 $id=$_GET['id_su'];


print "<script>window.location='index.php?view=sueldo';</script>";





?>