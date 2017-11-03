<?php  
//listarHabitaciones.php

	
	include("../connection.php");

	//session_star();
	$idHabitacion = $_POST["idHabitacion"];

	$query = "SELECT * FROM habitaciones WHERE idHabitacion = '$idHabitacion'";

	
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

					$arreglo[] = $subArreglo;
				//$arreglo["data"][] = $data;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($subArreglo, JSON_UNESCAPED_UNICODE);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);
?>