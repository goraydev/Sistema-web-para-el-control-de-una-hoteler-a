<?php

if(count($_POST)>0){

	$gasto = GastoData::getById($_POST["id_gasto"]);

	$gasto->updateEstado();

print "<script>window.location='index.php?view=egresos';</script>";


}

?>