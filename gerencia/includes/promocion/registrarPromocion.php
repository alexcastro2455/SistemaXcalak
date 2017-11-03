<?php  
//registrarPromocion.php


include("../connection.php");
	
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$fechaInicial = $_POST['fechaInicial'];
	$fechaTermino = $_POST['fechaTermino'];
	$descuento = $_POST['descuento'];


	$queryInsert = "INSERT INTO promociones(nombre, descripcion, fechaInicial, fechaTermino, descuento) VALUES ('$nombre', '$descripcion', '$fechaInicial', '$fechaTermino', $descuento)";


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