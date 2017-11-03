<?php  
//paginadoListaClientesHistorico.php
include("../connection.php");

$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
		0 => 'r.idReservacion',
		1 => 'r.numReservacion', 
		2 => 'c.nombre'
	);

	$where_condition = $sqlTot = $sqlRec = "";

	if( !empty($params['search']['value']) ) {
		$where_condition .=	" AND ";
		$where_condition .= " ( numReservacion LIKE '%".$params['search']['value']."%' ";    
		$where_condition .= " OR NOMBRE LIKE '%".$params['search']['value']."%' )";
	}

	$sql_query = "SELECT r.*, sr.`status` as estatusReserva, sp.`status` as estatusPago, c.nombre, c.apellido
					FROM reservaciones as r
					inner join status_reservacion as sr
					on r.status_reservacion_idStatusReservacion = sr.idStatusReservacion
					inner join status_pago sp
					on r.status_pago_idStatusPago = sp.idStatusPago
					inner join clientes as c
					on r.clientes_idCliente = c.idCliente
					where r.status_reservacion_idStatusReservacion = 2 or r.status_reservacion_idStatusReservacion = 3 ";
	$sqlTot .= $sql_query;
	$sqlRec .= $sql_query;
	
	if(isset($where_condition) && $where_condition != '') {

		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}

 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($con, $sqlTot) or die("Database Error:". mysqli_error($con));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($con, $sqlRec) or die("Error to Get the Post details.");

	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
		"draw"            => intval( $params['draw'] ),   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);

	echo json_encode($json_data);

?>