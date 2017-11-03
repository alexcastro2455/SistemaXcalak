<?php  
//registrarPrecioHabitaciones.php

include("../connection.php");

	$tipo_habitacion_idTipoHabitacion = $_POST['tipo_habitacion_idTipoHabitacion'];
	$precioHabitacion = $_POST['precioHabitacion'];


	$queryInsert = "INSERT INTO precio_habitaciones(precioHabitacion, tipo_habitacion_idTipoHabitacion) VALUES ('$precioHabitacion','$tipo_habitacion_idTipoHabitacion')";
	
	//realizamos la ejecución del query
	$sql = mysqli_query($myConnection, $queryInsert);

	//si se hizo la insersión entra de lo contrario no.
	if($sql)
		$arrayResult = "1";//["respuesta" => "¡Registro insertado correctamente!"];
	else
		$arrayResult = "2"; //["respuesta" => "¡Hubo un problema al momento de insertar!"];

	//enviamos respuesta
	echo $arrayResult; //json_encode($arrayResult);


	//cerramos conexion
	mysqli_close($myConnection);
?>