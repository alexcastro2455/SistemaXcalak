<?php  
	include("../connection.php");
	include('../session.php');

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

	//query a la BD consultando las credenciales
	$sqlComprobacion = "SELECT idEmpleado FROM empleados WHERE correo = '$correo'";

	//ejecuto la consulta
	$resultadoCorreo = mysqli_query($myConnection, $sqlComprobacion);

	///si el numero de filas es 0, entonces no existe el correo
	if(mysqli_num_rows($resultadoCorreo) == 0)
	{
		$queryInsert = "INSERT INTO empleados(nombre, apellido, direccion, lugarOrigen, estadoOrigen, correo, telefono, password, tipo_usuario_idTipoUsuario, puestos_trabajo_idPuestoTrabajo, status_empleado_idStatusEmpleado, sucursales_idSucursal) VALUES ('$nombre', '$apellido', '$direccion','$lugarOrigen', '$estadoOrigen', '$correo', '$telefono', '$password', 2, '$puestos_trabajo_idPuestoTrabajo', '$status_empleado_idStatusEmpleado', '$sucursales_idSucursal')";

		//realizamos la ejecución del query
		$sql = mysqli_query($myConnection, $queryInsert);

		//si se hizo la insersión entra de lo contrario no.
		if($sql)
			$arrayResult = "1";//["respuesta" => "¡Registro insertado correctamente!"];
		else
			$arrayResult = "2"; //["respuesta" => "¡Hubo un problema al momento de insertar!"];

		//enviamos el arreglo con formato JSON
		echo $arrayResult; //json_encode($arrayResult);
	}else echo "3";

	//liberamos memoria
	//mysqli_free_result($resultadoCorreo);
	//mysqli_free_result($sql);
	//cerramos conexion
	mysqli_close($myConnection);

?>