<?php  
//listarPrecioHabitaciones.php


	include("../connection.php");

	$query = "SELECT ph.*, th.tipo, th.descripcion FROM precio_habitaciones as ph
				inner join tipo_habitacion as th
				on ph.tipo_habitacion_idTipoHabitacion = th.idTipoHabitacion";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo["idPrecioHabitacion"] = $data["idPrecioHabitacion"];
				$subArreglo["precioHabitacion"] = $data["precioHabitacion"];
				$subArreglo["tipo_habitacion_idTipoHabitacion"] = $data["tipo_habitacion_idTipoHabitacion"];
				$subArreglo["tipo"] = utf8_encode($data["tipo"]);
				$subArreglo["descripcion"] = utf8_encode($data["descripcion"]);

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