<?php  

	
	include("../connection.php");

	$idServicio = $_POST['idServicio'];
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$descripcion = $_POST['descripcion'];

	$queryUpdate = "UPDATE cat_servicios SET nombre='$nombre',precio='$precio',descripcion='$descripcion' WHERE idServicio='$idServicio'";
		

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