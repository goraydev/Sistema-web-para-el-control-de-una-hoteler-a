<?php
if (isset($_GET['term'])){
	
$base = new Database();
$con = $base->connect();
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con) 
{
	$fetch = mysqli_query($con,"SELECT * FROM persona where documento like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id=$row['id'];
		$row_array['value'] = $row['documento']." | ".$row['nombre'];
		$row_array['id']=$row['id'];
		$row_array['documento']=$row['documento'];
		$row_array['nombre']=$row['nombre'];
		$row_array['direccion']=$row['direccion'];
		array_push($return_arr,$row_array);
    }  
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>