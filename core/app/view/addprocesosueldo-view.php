<?php

date_default_timezone_set('America/Lima');
  $hoy = date("Y-m-d"); 
  $hora = date("H:i:s");


if(count($_POST)>0){

   
	$cajas = CajaData::getAllAbierto(); 
 	if(count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}

	$proceso = new ProcesoSueldoData();
	$proceso->id_sueldo = $_POST['id_sueldo'];
    $proceso->id_caja = $id_caja;
    $proceso->monto = $_POST['monto'];
    $proceso->fecha = $_POST['end'];
    $proceso->tipo = $_POST['tipo_proceso'];
	$proceso->add();  
 

 $start = $_POST['start'];
 $end = $_POST['end'];
	

$id=$_POST["id_sueldo"];
print "<script>window.location='index.php?view=proceso_sueldo&id=$id&start=$start&end=$end';</script>";


}
 
?>