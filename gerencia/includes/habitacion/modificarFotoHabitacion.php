<?php  

	include("../connection.php");
	include('../session.php');

	$idHabitacion = $_POST['idHabitacion'];
	$rutaFoto = addslashes(file_get_contents($_FILES['rutaFoto']['tmp_name']));
//
	$queryUpdate = "UPDATE habitaciones SET rutaFoto='$rutaFoto' WHERE idHabitacion= '$idHabitacion'";
		
	//realizamos la ejecución del query
	//$sql = mysqli_query($myConnection, $queryUpdate);
	
	//si se hizo la insersión entra de lo contrario no.
	if($myConnection->query($queryUpdate) == TRUE)
		$arrayResult = "";
	else
		$arrayResult = "¡Hubo un problema al momento de actualizar la foto!";

	//enviamos el arreglo con formato JSON
	echo $arrayResult;

	//liberamos memoria
	//mysqli_free_result($sql);
	//cerramos conexion
	mysqli_close($myConnection);

?>