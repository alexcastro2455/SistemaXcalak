<?php  
//clientes/listarClientes.php


	include("../connection.php");

	$query = "SELECT * FROM clientes";

	//ejecuto la consulta
	$resultado = mysqli_query($myConnection, $query);

	//checamos que trajo algo
	if(!$resultado)
	{
		die("error");
	}else
		{ //lleno mi arreglo
			while ($data = mysqli_fetch_assoc($resultado)) {
				$subArreglo['idCliente'] = $data['idCliente'];
				$subArreglo['nombre'] = utf8_encode($data['nombre']);
				$subArreglo['apellido'] = utf8_encode($data['apellido']);
				$subArreglo['direccion'] = utf8_encode($data['direccion']);
				$subArreglo['estado'] = utf8_encode($data['estado']);
				$subArreglo['pais'] = ($data['pais']);
				$subArreglo['correo'] = $data['correo'];
				$subArreglo['telefono'] = $data['telefono'];
				$subArreglo['password'] = $data['password'];
				$subArreglo['tipo_cliente_idTipoCliente'] = $data['tipo_cliente_idTipoCliente'];
				$subArreglo['botones'] = '<a id="btnModificar" class="mytool iconPadding" title="Ver cliente" onClick="ConsultarCliente('.$data['idCliente'].')"><i class="fa fa-eye"></i></a>';
				
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