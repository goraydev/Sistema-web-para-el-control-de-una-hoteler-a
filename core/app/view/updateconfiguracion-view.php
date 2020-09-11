<?php

if(count($_POST)>0){
 
	$empresa = ConfiguracionData::getById($_POST["id_configuracion"]);
	$nombre="NULL";
	if($_POST["nombre"]!=""){ $nombre=$_POST["nombre"];}
	$empresa->nombre = $nombre;

	$direccion="NULL";
	if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}
	$empresa->direccion = $direccion;

	$estado="NULL";
	if($_POST["estado"]!=""){ $estado=$_POST["estado"];}
	$empresa->estado = $estado;

	$telefono="NULL";
	if($_POST["telefono"]!=""){ $telefono=$_POST["telefono"];}
	$empresa->telefono = $telefono;

	$fax="NULL";
	if($_POST["fax"]!=""){ $fax=$_POST["fax"];}
	$empresa->fax = $fax;

	$rnc="NULL";
	if($_POST["rnc"]!=""){ $rnc=$_POST["rnc"];}
	$empresa->rnc = $rnc;

	$registro_empresarial="NULL";
	if($_POST["registro_empresarial"]!=""){ $registro_empresarial=$_POST["registro_empresarial"];}
	$empresa->registro_empresarial = $registro_empresarial;

	$ciudad="NULL";
	if($_POST["ciudad"]!=""){ $ciudad=$_POST["ciudad"];}
	$empresa->ciudad = $ciudad;
	$empresa->update();

print "<script>window.location='index.php?view=configuracion';</script>";


}

?>