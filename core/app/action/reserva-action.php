<?php 
header('Content-Type: application/json');

$base = new Database();
$pdo = $base->connect1();


$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) { 

	case 'agregar':
		//add instruction
		$clientes = PersonaData::getLikeDni($_POST["documento"]);
		if(count($clientes)>0){
		  $id_cliente=$clientes->id;	
		}else{
		  $cliente = new PersonaData();   
		  $cliente->tipo_documento = 1;
		  $cliente->documento = $_POST["documento"];
		  $cliente->nombre = $_POST["nombre"];

		  $direccion="NULL";
	  		if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}
		  $cliente->direccion = $direccion; 
		  $s = $cliente->add001();
		  $id_cliente=$s[1];
		}

		$sentenciaSQL=$pdo->prepare("INSERT INTO
			proceso(id_habitacion,id_cliente,dinero_dejado,id_tipo_pago,fecha_entrada,fecha_salida,total,id_usuario,cant_personas,id_caja,estado,fecha_creada,observacion)
			values(:id_habitacion,$id_cliente,0,1,:start,:end,0,:id_usuario,1,NULL,3,NOW(),:observacion)");

			$respuesta=$sentenciaSQL->execute(array(
				"id_habitacion" =>$_POST['id_habitacion'],
				"start" =>$_POST['start'],
				"end" =>$_POST['end'], 
				"observacion" =>$_POST['observacion'], 
				"id_usuario" =>$_SESSION["user_id"]
			));

			echo json_encode($respuesta);
		break;

	case 'agregarDefault':
		//add instruction
		$sentenciaSQL=$pdo->prepare("INSERT INTO
			events(title,color,textColor,start,end)
			values(:title,:description,:textColor,:start,:end)");

			$respuesta=$sentenciaSQL->execute(array(
				"title" =>$_POST['title'],
				"description" =>$_POST['description'],
				"textColor" =>$_POST['textColor'],
				"start" =>$_POST['start'].' 06:00:00',
				"end" =>$_POST['end'].' 23:30:00'
			));

			echo json_encode($respuesta);
		break;

	case 'addstatic':
		//add instruction
		$sentenciaSQL=$pdo->prepare("INSERT INTO
			static(s_title,s_color,s_textcolor)
			values(:s_title,:s_color,:s_textcolor)");

			$respuesta=$sentenciaSQL->execute(array(
				"s_title" =>$_POST['s_title'],
				"s_color" =>$_POST['s_color'],
				"s_textcolor" =>$_POST['s_textcolor']
			));

			echo json_encode($respuesta);
		break;

	case 'eliminar':
		//delete instruction
		$respuesta=false;
		if(isset($_POST['id'])){
			$sentenciaSQL=$pdo->prepare("DELETE FROM proceso WHERE id=:id");
			$respuesta=$sentenciaSQL->execute(array(
				"id" =>$_POST['id']
			));
			
		}
		echo json_encode($respuesta);
		break;
	case 'actualizar':
		//update instruction
		
		$sentenciaSQL=$pdo->prepare("UPDATE  proceso SET id_habitacion=:id_habitacion,fecha_entrada=:start,fecha_salida=:end,observacion=:observacion WHERE id=:id ");
		$respuesta=$sentenciaSQL->execute(array(
				"id" =>$_POST['id'],
				"id_habitacion" =>$_POST['id_habitacion'],
				"start" =>$_POST['start'],
				"observacion" =>$_POST['observacion'],
				"end" =>$_POST['end']
		));
		echo json_encode($respuesta);  
		break;
	default:
		//selecciona los eventos del calendario
		$sentenciaSQL=$pdo->prepare("SELECT id,nombre as title from habitacion");
		$sentenciaSQL->execute();

		$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultado);
		break;
}

?>