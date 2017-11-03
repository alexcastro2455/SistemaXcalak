<?php  
	include("../connection.php");

	$idPrecioHabitacion = $_POST['idPrecioHabitacion'];

	$queryInsert = "DELETE FROM precio_habitaciones WHERE idPrecioHabitacion = '$idPrecioHabitacion'";

	//realizamos la ejecución del query
	$sql = mysqli_query($myConnection, $queryInsert);

	//si se hizo la insersión entra de lo contrario no.
	if($sql)
		$arrayResult = "0";//["respuesta" => "¡Registro insertado correctamente!"];
	else
		$arrayResult = "2"; //["respuesta" => "¡Hubo un problema al momento de insertar!"];

	//enviamos el arreglo con formato JSON
	echo $arrayResult; //json_encode($arrayResult);

	
	//cerramos conexion
	mysqli_close($myConnection);

?>