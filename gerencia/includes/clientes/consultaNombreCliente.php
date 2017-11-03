<?php  
//consultaNombreCliente.php

include("../connection.php");

	$idCliente = $_GET['idCliente'];

	$query = "SELECT nombre, apellido FROM clientes where idCliente = '$idCliente'";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo['nombreCli'] = utf8_encode($data['nombre']);
				$subArreglo['apellidoCli'] = utf8_encode($data['apellido']);
				
				$arreglo[] = $subArreglo;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($subArreglo, JSON_UNESCAPED_UNICODE);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);


?>