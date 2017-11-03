<?php  

	include("../connection.php");
	include('../session.php');

	$idEmpleado = $_POST['idEmpleado'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];
	$lugarOrigen = $_POST['lugarOrigen'];
	$estadoOrigen = $_POST['estadoOrigen'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$password = $_POST['password'];
	$puestos_trabajo_idPuestoTrabajo = $_POST['puestos_trabajo_idPuestoTrabajo'];
	$status_empleado_idStatusEmpleado = "1";//$db->real_escape_string(['status_empleado_idStatusEmpleado']);
	$sucursales_idSucursal = $_SESSION['sucursales_idSucursal'];

	$queryUpdate = "UPDATE empleados SET nombre= '$nombre', apellido='$apellido',direccion='$direccion',
lugarOrigen='$lugarOrigen',estadoOrigen='$estadoOrigen',correo='$correo',telefono='$telefono',password='$password', puestos_trabajo_idPuestoTrabajo='$puestos_trabajo_idPuestoTrabajo',status_empleado_idStatusEmpleado='$status_empleado_idStatusEmpleado' 
WHERE idEmpleado = '$idEmpleado' and sucursales_idSucursal='$sucursales_idSucursal'";
		
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