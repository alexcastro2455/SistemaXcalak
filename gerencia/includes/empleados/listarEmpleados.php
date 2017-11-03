<?php  

	include("../connection.php");
	include('../session.php');

	//session_star();
	$idSucursal = $_SESSION['sucursales_idSucursal'];

	$query = "SELECT e.idEmpleado, e.nombre, e.apellido, e.direccion, e.lugarOrigen, e.estadoOrigen, e.correo, e.telefono, e.`password`, e.tipo_usuario_idTipoUsuario, e.puestos_trabajo_idPuestoTrabajo, e.status_empleado_idStatusEmpleado, e.sucursales_idSucursal, 
		tu.tipoUsuario, pt.puesto, se.`status`
		FROM empleados as e
		inner join tipo_usuario as tu
		on e.tipo_usuario_idTipoUsuario = tu.idTipoUsuario
		inner join puestos_trabajo as pt
		on e.puestos_trabajo_idPuestoTrabajo = pt.idPuestoTrabajo 
		inner join status_empleado as se
		on e.status_empleado_idStatusEmpleado = se.idStatusEmpleado
		where e.tipo_usuario_idTipoUsuario = 2 and e.sucursales_idSucursal = '$idSucursal'";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo["idEmpleado"] = $data["idEmpleado"];
				$subArreglo["nombre"] = utf8_encode($data["nombre"]);
				$subArreglo["apellido"] = utf8_encode($data["apellido"]);
				$subArreglo["direccion"] = utf8_encode($data["direccion"]);
				$subArreglo["lugarOrigen"] = utf8_encode($data["lugarOrigen"]);
				$subArreglo["estadoOrigen"] = utf8_encode($data["estadoOrigen"]);
				$subArreglo["correo"] = $data["correo"];
				$subArreglo["telefono"] = $data["telefono"];
				$subArreglo["password"] = $data["password"];
				$subArreglo["tipo_usuario_idTipoUsuario"] = $data["tipo_usuario_idTipoUsuario"];
				$subArreglo["puestos_trabajo_idPuestoTrabajo"] = $data["puestos_trabajo_idPuestoTrabajo"];
				$subArreglo["status_empleado_idStatusEmpleado"] = $data["status_empleado_idStatusEmpleado"];
				$subArreglo["sucursales_idSucursal"] = $data["sucursales_idSucursal"];
				$subArreglo["tipoUsuario"] = $data["tipoUsuario"];
				$subArreglo["puesto"] = $data["puesto"]; 
				$subArreglo["status"] = $data["status"];

				$arreglo["data"][] = $subArreglo;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);

?>