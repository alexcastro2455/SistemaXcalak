<?php  

	include("../connection.php");
	include('../session.php');

	$idEmpleado = $_POST['idEmpleado'];
	$status_empleado_idStatusEmpleado = $_POST["status_empleado_idStatusEmpleado"];
	$sucursales_idSucursal = $_SESSION['sucursales_idSucursal'];

	if($status_empleado_idStatusEmpleado == 1)
		$mensaje = "¡Se ha activado nuevamente!";
	else
		$mensaje = "¡Se ha dado de baja correctamente!";

	$queryUpdate = "UPDATE empleados SET status_empleado_idStatusEmpleado = '$status_empleado_idStatusEmpleado'
					WHERE idEmpleado = '$idEmpleado' and sucursales_idSucursal= '$sucursales_idSucursal'";
		
	//realizamos la ejecución del query
	//$sql = mysqli_query($myConnection, $queryUpdate);

	//si se hizo la insersión entra de lo contrario no.
	if($myConnection->query($queryUpdate) == TRUE)
		$arrayResult = $mensaje;
	else
		$arrayResult = "¡Hubo un problema al momento de dar de baja!";

	//enviamos el arreglo con formato JSON
	echo $arrayResult;

	//liberamos memoria
	//mysqli_free_result($sql);
	//cerramos conexion
	mysqli_close($myConnection);

?>