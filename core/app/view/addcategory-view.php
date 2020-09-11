<?php

if(count($_POST)>0){

	$categoria = new CategoriaData();
	$categoria->nombre = $_POST["nombre"];



  if(isset($_FILES["imagen"])){
    $imagen = new Upload($_FILES["imagen"]);
    if($imagen->uploaded){
      $imagen->Process("img/categoria/");
      if($imagen->processed){
        $categoria->imagen = $imagen->file_dst_name;
        $prod = $categoria->add_whit_image();
      }
    }else{

  $prod= $categoria->add();
    }
  }
  else{
  $prod= $categoria->add();

  }


print "<script>window.location='index.php?view=categoria';</script>";

}

?>