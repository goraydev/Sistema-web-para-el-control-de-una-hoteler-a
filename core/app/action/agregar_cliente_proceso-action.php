        
<?php

$session_id= session_id(); 

if (isset($_POST['documento'])){$documento=$_POST['documento'];}
if (isset($_POST['nombre'])){$nombre=$_POST['nombre'];}


if(isset($_POST['documento']) and isset($_POST['nombre'])){
  
    $cliente = new PersonaData();
      $cliente->tipo_documento = $_POST["tipo_documento"];
      $cliente->documento = $_POST["documento"];
      $cliente->nombre = $_POST["nombre"]; 
      $cliente->fecha_nac = $_POST["fecha_nac"]; 

      $direccion="NULL";
        if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}
      $cliente->direccion = $direccion;

      $nacionalidad="NULL";
        if($_POST["nacionalidad"]!=""){ $nacionalidad=$_POST["nacionalidad"];}
      $cliente->nacionalidad = $nacionalidad;

      $estado_civil="NULL";
        if($_POST["estado_civil"]!=""){ $estado_civil=$_POST["estado_civil"];}
      $cliente->estado_civil = $estado_civil;

      $ocupacion="NULL";
        if($_POST["ocupacion"]!=""){ $ocupacion=$_POST["ocupacion"];}
      $cliente->ocupacion = $ocupacion;

      $medio_transporte="NULL";
        if($_POST["medio_transporte"]!=""){ $medio_transporte=$_POST["medio_transporte"];}
      $cliente->medio_transporte = $medio_transporte;

      $destino="NULL";
        if($_POST["destino"]!=""){ $destino=$_POST["destino"];}
      $cliente->destino = $destino;

      $motivo="NULL";
        if($_POST["motivo"]!=""){ $motivo=$_POST["motivo"];}
      $cliente->motivo = $motivo;

      $s = $cliente->add(); 

      $cliente_proceso = new ClienteProcesoData();
      $cliente_proceso->id_cliente=$s[1];
      $cliente_proceso->sesion=$session_id;
      $cliente_proceso->addPro();

}
 


if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$del = ClienteProcesoData::getById($_GET["id"]);
	$del->del();
} 



		$tmps = ClienteProcesoData::getAllTemporal($session_id);
		
			// si hay usuarios
			?>
            <table class="table" border="1">
                <thead>
                    <th>Tipo documento</th>
                    <th>Documento</th>
                    <th>Nombres completos</th>
                    <th></th>
                </thead>
			<?php
			$sumador_total=0;
            
			foreach($tmps as $tmp): ?>
				<tr>
                    <td><?php if($tmp->id_cliente!=null){echo $tmp->getCliente()->getTipoDocumento()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
                    <td><?php if($tmp->id_cliente!=null){echo $tmp->getCliente()->documento;}else{ echo "<center>----</center>"; }  ?></td>
                    <td><?php if($tmp->id_cliente!=null){echo $tmp->getCliente()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
    				
      				<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $tmp->id ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
         
          
                </tr>
             
          
				
                
				<?php
				
			endforeach ?>
            </table>