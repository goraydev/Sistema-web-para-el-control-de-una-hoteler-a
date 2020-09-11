<?php

if(count($_POST)>0){
	
	$nivel = CategoriaData::getById($_POST["id_categoria"]);
	$nivel->nombre = $_POST["nombre"];
	$nivel->update();

	if(isset($_FILES["imagen"])){ 
		$imagen = new Upload($_FILES["imagen"]);
		if($imagen->uploaded){
			$imagen->Process("img/categoria/");
			if($imagen->processed){
				$nivel->imagen = $imagen->file_dst_name;
				$nivel->update_image();
			}
		}
	}

	 
print "<script>window.location='index.php?view=categoria';</script>";


}


?>