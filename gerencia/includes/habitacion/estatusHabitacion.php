<?php  
//estatusHabitacion.php

include("../connection.php");

	$query = "SELECT * FROM status_habitacion";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo["idStatusHabitacion"] = $data["idStatusHabitacion"];
				$subArreglo["status"] = utf8_encode($data["status"]);
				
				$arreglo[] = $subArreglo;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);


?>