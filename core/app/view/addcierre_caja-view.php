 <?php

if(count($_POST)>0){
	$caja = CajaData::getById($_POST["id_caja"]); 
	$caja->fecha_cierre = $_POST["fecha_cierre"];
	$caja->monto_cierre = $_POST["monto_cierre"];
	$caja->estado = 0;
	$caja->cerrarcaja();


print "<script>window.location='index.php?view=cierre_caja';</script>";
}
?> 