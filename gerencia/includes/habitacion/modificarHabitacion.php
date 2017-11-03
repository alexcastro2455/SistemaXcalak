<?php  

	include("../connection.php");
	include('../session.php');

	$idHabitacion = $_POST['idHabitacion'];
	$numCamas = $_POST['numCamas'];
	$numPersonas = $_POST['numPersonas'];
	$maxPersonasExtra = $_POST['maxPersonasExtra'];
	$numHabitacion = $_POST['numHabitacion'];
	//$rutaFoto = addslashes(file_get_contents($_FILES['rutaFoto']['tmp_name']));
	$tipo_habitacion_idTipoHabitacion = $_POST['tipo_habitacion_idTipoHabitacion'];
	$status_habitacion_idStatusHabitacion = $_POST['status_habitacion_idStatusHabitacion'];
	$sucursales_idSucursal = $_SESSION['sucursales_idSucursal'];
	$tipo_cama_idTipoCama = $_POST['tipo_cama_idTipoCama'];
//rutaFoto=$rutaFoto

	$queryUpdate = "UPDATE habitaciones SET numCamas=$numCamas,numPersonas=$numPersonas,maxPersonasExtra=$maxPersonasExtra,numHabitacion=$numHabitacion,tipo_habitacion_idTipoHabitacion=$tipo_habitacion_idTipoHabitacion,status_habitacion_idStatusHabitacion=$status_habitacion_idStatusHabitacion,tipo_cama_idTipoCama=$tipo_cama_idTipoCama WHERE idHabitacion= '$idHabitacion' and sucursales_idSucursal='$sucursales_idSucursal'";
	
	//realizamos la ejecución del query
	//$sql = mysqli_query($myConnection, $queryUpdate);

	//si se hizo la insersión entra de lo contrario no.
	if($myConnection->query($queryUpdate) == TRUE)
		$arrayResult = "1";
	else
		$arrayResult = "2";

	//enviamos el arreglo con formato JSON
	echo $arrayResult;

	//liberamos memoria
	//mysqli_free_result($sql);
	//cerramos conexion
	mysqli_close($myConnection);

?>