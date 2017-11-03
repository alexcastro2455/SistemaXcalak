<?php  
//registrarPromocion.php


include("../connection.php");

	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$descripcion = $_POST['descripcion'];


	$queryInsert = "INSERT INTO cat_servicios(nombre, precio, descripcion) VALUES ('$nombre','$precio','$descripcion')";
	
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