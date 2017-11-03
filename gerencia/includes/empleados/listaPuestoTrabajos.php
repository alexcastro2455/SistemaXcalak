<?php  

include("../connection.php");

	$query = "SELECT * FROM puestos_trabajo WHERE idPuestoTrabajo != 1";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo["idPuestoTrabajo"] = $data["idPuestoTrabajo"];
				$subArreglo["puesto"] = utf8_encode($data["puesto"]);
				
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