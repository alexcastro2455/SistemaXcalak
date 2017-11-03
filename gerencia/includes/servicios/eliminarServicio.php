<?php  
	include("../connection.php");

	$idServicio = $_POST['idServicio'];

	$queryInsert = "DELETE FROM cat_servicios WHERE idServicio = '$idServicio'";

	//realizamos la ejecución del query
	$sql = mysqli_query($myConnection, $queryInsert);

	//si se hizo la insersión entra de lo contrario no.
	if($sql)
		$arrayResult = "0";//["respuesta" => "¡Registro insertado correctamente!"];
	else
		$arrayResult = "2"; //["respuesta" => "¡Hubo un problema al momento de insertar!"];

	//enviamos el arreglo con formato JSON
	echo $arrayResult; //json_encode($arrayResult);

	//liberamos memoria
	//mysqli_free_result($resultadoCorreo);
	//mysqli_free_result($sql);
	//cerramos conexion
	mysqli_close($myConnection);

?>