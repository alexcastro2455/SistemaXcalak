<?php  

	include("../connection.php");

	$numInicial = $_POST['numInicial'];
	$numFinal = $_POST['numFinal'];

	$query = "SELECT MAX(numHabitacion) as ultimoNumero FROM habitaciones WHERE numHabitacion BETWEEN '$numInicial' AND '$numFinal'";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {

				if($data["ultimoNumero"] == null)
					$subArreglo["ultimoNumero"] = $numInicial;
				else
					$subArreglo["ultimoNumero"] = $data["ultimoNumero"];
				$subArreglo["numeroBase"] = $numFinal;

				//$arreglo[] = $subArreglo;
			}

			//enviamos el arreglo con formato JSON
			echo json_encode($subArreglo);
		}

		//liberamos memoria
		mysqli_free_result($resultado);
		//cerramos conexion
		mysqli_close($myConnection);

?>