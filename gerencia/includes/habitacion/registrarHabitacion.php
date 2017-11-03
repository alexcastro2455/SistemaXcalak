<?php  
	include("../connection.php");
	include('../session.php');

	$numCamas = $_POST['numCamas'];
	$numPersonas = $_POST['numPersonas'];
	$maxPersonasExtra = $_POST['maxPersonasExtra'];
	$numHabitacion = $_POST['numHabitacion'];
	$rutaFoto = addslashes(file_get_contents($_FILES['rutaFoto']['tmp_name'])); //
	$tipo_habitacion_idTipoHabitacion = $_POST['tipo_habitacion_idTipoHabitacion'];
	$status_habitacion_idStatusHabitacion = $_POST['status_habitacion_idStatusHabitacion'];
	$sucursales_idSucursal = $_SESSION['sucursales_idSucursal'];
	$tipo_cama_idTipoCama = $_POST['tipo_cama_idTipoCama']; 

	 $queryInsert = "INSERT INTO habitaciones(numCamas, numPersonas, maxPersonasExtra, numHabitacion, rutaFoto, tipo_habitacion_idTipoHabitacion, status_habitacion_idStatusHabitacion, sucursales_idSucursal, tipo_cama_idTipoCama) VALUES ('$numCamas','$numPersonas','$maxPersonasExtra','$numHabitacion','$rutaFoto','$tipo_habitacion_idTipoHabitacion','$status_habitacion_idStatusHabitacion','$sucursales_idSucursal','$tipo_cama_idTipoCama')";

	 //echo $queryInsert;

	//realizamos la ejecución del query
	$sql = mysqli_query($myConnection, $queryInsert);

	//si se hizo la insersión entra de lo contrario no.
	if($sql)
		$arrayResult = "1";//["respuesta" => "¡Registro insertado correctamente!"];
	else
		$arrayResult = "2"; //["respuesta" => "¡Hubo un problema al momento de insertar!"];

	//enviamos el arreglo con formato JSON
	echo $arrayResult; //json_encode($arrayResult);


	//cerramos conexion
	mysqli_close($myConnection);

?>