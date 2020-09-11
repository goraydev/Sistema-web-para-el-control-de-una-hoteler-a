<?php 
$session_id= session_id();
$dels = TmpData::getAllTemporal($session_id);
  foreach($dels as $del): 
    $eliminar = TmpData::getById($del->id_tmp); 
    $eliminar->del();
  endforeach;


  print "<script>window.location='index.php?view=recepcion';</script>";
?>  