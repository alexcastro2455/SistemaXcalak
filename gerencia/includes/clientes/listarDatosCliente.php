<?php  
//clientes/listarDatosCliente.php


	include("../connection.php");

	$idCliente = $_GET['idCliente'];

	$query = "SELECT r.*, sr.`status` as estatusReserva, sp.`status` as estatusPago, c.nombre, c.apellido, th.tipo as tipoHabitacion
FROM reservaciones as r
inner join status_reservacion as sr
on r.status_reservacion_idStatusReservacion = sr.idStatusReservacion
inner join status_pago sp
on r.status_pago_idStatusPago = sp.idStatusPago
inner join clientes as c
on r.clientes_idCliente = c.idCliente
inner join tipo_habitacion as th
on r.tipo_habitacion_idTipoHabitacion = th.idTipoHabitacion
where r.clientes_idCliente = '$idCliente' and r.status_reservacion_idStatusReservacion != 1";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo['idReservacion'] = $data['idReservacion'];
				$subArreglo['numHabitaciones'] = $data['numHabitaciones'];
				$subArreglo['comentarios'] = utf8_encode($data['comentarios']);
				$subArreglo['numPersonas'] = $data['numPersonas'];
				$subArreglo['fechaReserva'] = $data['fechaReserva'];
				$subArreglo['fechaLlegada'] = $data['fechaLlegada'];
				$subArreglo['fechaSalida'] = $data['fechaSalida'];
				$subArreglo['numReservacion'] = $data['numReservacion'];
				$subArreglo['clientes_idCliente'] = $data['clientes_idCliente'];
				$subArreglo['status_reservacion_idStatusReservacion'] = $data['status_reservacion_idStatusReservacion'];
				$subArreglo['status_pago_idStatusPago'] = $data['status_pago_idStatusPago'];
				$subArreglo['tipo_habitacion_idTipoHabitacion'] = $data['tipo_habitacion_idTipoHabitacion'];
				$subArreglo['estatusReserva'] = utf8_encode($data['estatusReserva']);
				$subArreglo['estatusPago'] = ($data['estatusPago']);
				$subArreglo['nombre'] = utf8_encode($data['nombre']);
				$subArreglo["apellido"] = utf8_encode($data["apellido"]);
				$subArreglo["tipoHabitacion"] = $data["tipoHabitacion"];
				$subArreglo['botones'] = '<a id="btnModificar" class="mytool iconPadding" title="Ver datos" onClick="ConsultarCliente('.$data['idReservacion'].')"><i class="fa fa-eye"></i></a>';
				
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