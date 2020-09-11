<?php 

$empresa = ConfiguracionData::getById($_POST["id_config"]);
if(isset($_FILES["logo"])){ 
		$logo = new Upload($_FILES["logo"]); 
		if($logo->uploaded){ 
			$logo->Process("img/");
			if($logo->processed){ 
				$empresa->logo = $logo->file_dst_name;
				$empresa->update_logo();
			}
		}
	}


print "<script>window.location='index.php?view=configuracion';</script>";

?>