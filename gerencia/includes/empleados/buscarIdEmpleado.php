<?php  

	include("../connection.php");
	include('../session.php');

	//session_star();
	$idEmpleado = $_POST['idEmpleado'];
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
		where e.idEmpleado = '$idEmpleado' and e.sucursales_idSucursal = '$idSucursal'";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$arreglo[] = $data;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($arreglo);
		}

		//liberamos memoria
		//mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);

?>