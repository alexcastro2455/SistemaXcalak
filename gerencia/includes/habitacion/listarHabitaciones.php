<?php  
//listarHabitaciones.php

	
	include("../connection.php");
	include('../session.php');

	//session_star();
	$idSucursal = $_SESSION['sucursales_idSucursal'];

	$query = "SELECT h.idHabitacion, h.numCamas, h.numPersonas, h.maxPersonasExtra, h.numHabitacion, h.rutaFoto, h.tipo_habitacion_idTipoHabitacion, h.status_habitacion_idStatusHabitacion, h.sucursales_idSucursal, h.tipo_cama_idTipoCama,
		th.tipo, th.descripcion, sh.`status`, tc.tipo as tipoCama
		FROM habitaciones as h
		inner join tipo_habitacion as th
		on h.tipo_habitacion_idTipoHabitacion = th.idTipoHabitacion
		inner join status_habitacion as sh
		on h.status_habitacion_idStatusHabitacion = sh.idStatusHabitacion
		inner join tipo_cama as tc
		on h.tipo_cama_idTipoCama = tc.idTipoCama
		WHERE h.sucursales_idSucursal = '$idSucursal'";

	
	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
					$subArreglo["idHabitacion"] = $data["idHabitacion"];
					$subArreglo["numCamas"] = $data["numCamas"];
					$subArreglo["numPersonas"] = $data["numPersonas"];
					$subArreglo["maxPersonasExtra"] = $data["maxPersonasExtra"];
					$subArreglo["numHabitacion"] = $data["numHabitacion"];
					$subArreglo["rutaFoto"] = base64_encode($data["rutaFoto"]);
					$subArreglo["tipo_habitacion_idTipoHabitacion"] = $data["tipo_habitacion_idTipoHabitacion"];
					$subArreglo["status_habitacion_idStatusHabitacion"] = $data["status_habitacion_idStatusHabitacion"];
					$subArreglo["sucursales_idSucursal"] = $data["sucursales_idSucursal"];
					$subArreglo["tipo_cama_idTipoCama"] = $data["tipo_cama_idTipoCama"];
					$subArreglo["tipo"] = $data["tipo"];
					$subArreglo["status"] = $data["status"];
					$subArreglo["tipoCama"] = $data["tipoCama"];

					$arreglo[] = $subArreglo;
				//$arreglo["data"][] = $data;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);
?>