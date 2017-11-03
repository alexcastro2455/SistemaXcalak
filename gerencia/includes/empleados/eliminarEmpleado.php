<?php  
	include("../connection.php");
	include('../session.php');

	$idEmpleado = $_POST['idEmpleado'];
	$sucursales_idSucursal = $_SESSION['sucursales_idSucursal'];

	$queryInsert = "DELETE FROM empleados WHERE idEmpleado = '$idEmpleado' and sucursales_idSucursal = '$sucursales_idSucursal'";

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