<?php  

	include("../connection.php");
	include('../session.php');

	$paginaActual = $_POST['partida'];
	$idSucursal = $_SESSION['sucursales_idSucursal'];

	///variables
	$numHabitaciones = mysqli_num_rows(mysqli_query($myConnection, "SELECT idHabitacion FROM habitaciones"));
	$numLotes = 8;
	$numPaginas = ceil($numHabitaciones/$numLotes);
	$listaPaginacion = '';
	$infoHabitaciones = '';

	////lista de la paginación////

	if($paginaActual > 1){
		$listaPaginacion = $listaPaginacion.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
	}
	for($i = 1; $i <= $numPaginas; $i++){
		if($i == $paginaActual)
			$listaPaginacion = $listaPaginacion.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
		else
			$listaPaginacion = $listaPaginacion.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
	}
	if($paginaActual < $numPaginas)
		$listaPaginacion = $listaPaginacion.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';

	////fin de la lista de la paginación///

	///////////creación de los bloques de información
	if($paginaActual <= 1)
		$myLimit = 0;
	else
		$myLimit = $numLotes*($paginaActual-1);

	$query = "SELECT h.idHabitacion, h.numHabitacion, th.tipo, sh.idStatusHabitacion, sh.`status`
		FROM habitaciones as h
		inner join tipo_habitacion as th
		on h.tipo_habitacion_idTipoHabitacion = th.idTipoHabitacion
		inner join status_habitacion as sh
		on h.status_habitacion_idStatusHabitacion = sh.idStatusHabitacion
		WHERE h.sucursales_idSucursal = '$idSucursal' GROUP BY h.numHabitacion ASC LIMIT $myLimit, $numLotes";

	$consultaRegistros = mysqli_query($myConnection, $query);

	while ($data = mysqli_fetch_array($consultaRegistros)) {
		$infoHabitaciones = $infoHabitaciones.'<div class="col-xs-18 col-sm-6 col-md-3">
                          <div class="thumbnail heightBox estado'.$data['idStatusHabitacion'].'">
                            <div class="caption colorWhite">

                              <h3>
                                <strong>
                                  <p>Habitación '.$data['numHabitacion'].'</p>
                                </strong>
                               </h3>
                              <h4>
                                <p>Tipo habitación '.$data['tipo'].'</p>
                                <p>Estado '.$data['status'].'</p>
                              </h4>
                              <input id="'.$data['idHabitacion'].'" type="hidden" name="">
                            </div>
                          </div>
                        </div>'; 
	}
	///////////fin de la creación de los bloques de información

	//$arrayHtml = array(0 => $infoHabitaciones, 1 => $listaPaginacion);
	$arrayHtml["inforHabitaciones"] =  $infoHabitaciones;
	$arrayHtml["numeracion"] = $listaPaginacion;

    echo json_encode($arrayHtml, JSON_UNESCAPED_UNICODE);

?>