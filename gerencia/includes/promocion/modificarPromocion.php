<?php  
//modificarPromocion.php

include("../connection.php");
	include('../session.php');

	$idPromocion = $_POST['idPromocion'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$fechaInicial = $_POST['fechaInicial'];
	$fechaTermino = $_POST['fechaTermino'];
	$descuento = $_POST['descuento'];

	$queryUpdate = "UPDATE promociones SET nombre = '$nombre', descripcion='$descripcion',fechaInicial='$fechaInicial',fechaTermino='$fechaTermino', descuento= '$descuento' WHERE idPromocion = '$idPromocion'";
		
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