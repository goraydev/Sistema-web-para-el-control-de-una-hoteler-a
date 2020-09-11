<?php

if(count($_POST)>0){


	$proceso = new SueldoData();
	$proceso->id_usuario = $_POST['id_usuario'];
    $proceso->monto = $_POST['monto'];
    $proceso->dia_pago = $_POST['dia_pago'];
    $proceso->fecha_comienzo = $_POST['fecha_comienzo']; 
	$proceso->add();  

	$usuario = UserData::getById($_POST["id_usuario"]);
	$usuario->update_pago();


	

  print "<script>window.location='index.php?view=sueldo';</script>";


}
 
?>