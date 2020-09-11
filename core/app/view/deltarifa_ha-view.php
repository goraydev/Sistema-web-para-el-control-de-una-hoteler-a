<?php


$tarifa_ha = TarifaHabitacionData::getById($_GET["id"]);
$tarifa_ha->del();

$id=$_GET['id_ha'];

Core::redir("./index.php?view=ha_tarifas&id=$id");
?>