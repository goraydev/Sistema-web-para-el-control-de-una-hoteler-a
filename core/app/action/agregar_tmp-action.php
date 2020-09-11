        
<?php

$session_id= session_id(); 

if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}


if(isset($_POST['cantidad']) and isset($_POST['precio_venta'])){
$producto= TmpData::getByIdProducto($_POST['id']);
if(count($producto)>0){
 
    $temporal = TmpData::getById($producto->id_tmp);
    $temporal->cantidad_tmp = $producto->cantidad_tmp+$_POST['cantidad'];
    $temporal->updateCantidad();

}else{  
    $temporal = new TmpData();
    $temporal->id_producto = $_POST['id']; 
    $temporal->cantidad_tmp = $_POST['cantidad'];
    $temporal->precio_tmp = $_POST["precio_venta"];
    $temporal->sessionn_id = $session_id;
    $temporal->tipo_operacion = 1;
    $temporal->addTmp();  
}
}
 


if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$del = TmpData::getById($_GET["id"]);
	$del->del();
} 



		$tmps = TmpData::getAllTemporal($session_id);
		
			// si hay usuarios
			?>
			<?php
			$sumador_total=0;
			foreach($tmps as $tmp): ?>
				<tr>
                <td></td>
                <td><?php if($tmp->id_producto!=null){echo $tmp->getProduct()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
				<td><?php echo $tmp->cantidad_tmp; ?></td>
				
                
                <td>$  <?php echo number_format($tmp->precio_tmp,2,'.',','); ?></td>
                <?php $sumar_t=$tmp->cantidad_tmp*$tmp->precio_tmp; ?>
                <td>$  <?php echo number_format($sumar_t,2,'.',','); ?></td>
  				<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $tmp->id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
         
          
           </tr>
             
          
				
                
				<?php
				$sumador_total+=$sumar_t;
			endforeach ?>
            <tr style="background-color: #f3f3f3;">
                <td colspan=4><span class="pull-right">SUBTOTAL </span></td>
                <td><span class="pull-left"><?php echo '$  '.number_format(($sumador_total/1.18),2,'.',',');?></span></td>
                <td></td>
            </tr>
            <tr style="background-color: #f3f3f3;">
                <td colspan=4><span class="pull-right">IGV </span></td>
                <td><span class="pull-left"><?php echo '$  '.number_format($sumador_total-($sumador_total/1.18),2,'.',',');?></span></td>
                <td></td>
            </tr>
            <tr style="background-color: #e4e4e4;">
                <td colspan=4><span class="pull-right">TOTAL </span></td>
                <td><span class="pull-left"><?php echo '$  '.number_format($sumador_total,2,'.',',');?></span></td>
                <td></td>
            </tr>