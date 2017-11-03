<?php  
//modificarPrecioHabitacion.php

include("../connection.php");
	

	$idPrecioHabitacion = $_POST['idPrecioHabitacion'];
	$tipo_habitacion_idTipoHabitacion = $_POST['tipo_habitacion_idTipoHabitacion'];
	$precioHabitacion = $_POST['precioHabitacion'];

	$queryUpdate = "UPDATE precio_habitaciones SET precioHabitacion='$precioHabitacion',tipo_habitacion_idTipoHabitacion='$tipo_habitacion_idTipoHabitacion' WHERE idPrecioHabitacion='$idPrecioHabitacion'";
		
	//realizamos la ejecución del query
	//$sql = mysqli_query($myConnection, $queryUpdate);

	//si se hizo la insersión entra de lo contrario no.
	if($myConnection->query($queryUpdate) == TRUE)
		$arrayResult = "1";
	else
		$arrayResult = "2";

	//enviamos respuesta
	echo $arrayResult;

	//cerramos conexion
	mysqli_close($myConnection);


?>