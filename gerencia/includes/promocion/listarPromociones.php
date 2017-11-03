<?php  
//listarPromociones.php

	include("../connection.php");
	include('../session.php');

	//session_star();
	//$idSucursal = $_SESSION['sucursales_idSucursal'];
	$sub_array = array();

	$query = "SELECT * FROM promociones";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);


	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$sub_array["idPromocion"] = $data["idPromocion"];
				$sub_array["nombre"] = utf8_encode($data["nombre"]);
				$sub_array["descripcion"] = utf8_encode($data["descripcion"]);
				$sub_array["fechaInicial"] = $data["fechaInicial"];
				$sub_array["fechaTermino"] = $data["fechaTermino"];
				$sub_array["descuento"] = $data["descuento"];

				$arreglo["data"][] = $sub_array;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($arreglo, JSON_UNESCAPED_UNICODE);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);


?>