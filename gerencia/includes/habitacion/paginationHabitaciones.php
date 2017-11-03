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

	$query = "SELECT h.idHabitacion, h.numCamas, h.numPersonas, h.maxPersonasExtra, h.numHabitacion, h.rutaFoto, h.tipo_habitacion_idTipoHabitacion, h.status_habitacion_idStatusHabitacion, h.sucursales_idSucursal, h.tipo_cama_idTipoCama,
		th.tipo, th.descripcion, sh.`status`, tc.tipo as tipoCama
		FROM habitaciones as h
		inner join tipo_habitacion as th
		on h.tipo_habitacion_idTipoHabitacion = th.idTipoHabitacion
		inner join status_habitacion as sh
		on h.status_habitacion_idStatusHabitacion = sh.idStatusHabitacion
		inner join tipo_cama as tc
		on h.tipo_cama_idTipoCama = tc.idTipoCama
		WHERE h.sucursales_idSucursal = '$idSucursal' GROUP BY h.numHabitacion ASC LIMIT $myLimit, $numLotes";

	$consultaRegistros = mysqli_query($myConnection, $query);

	while ($data = mysqli_fetch_array($consultaRegistros)) {
		$infoHabitaciones = $infoHabitaciones.'<div class="col-xs-18 col-sm-6 col-md-3">
                          <div class="thumbnail" style="background-color: #F0F0F0">
                            <img class="uploadImg simplePadding10 img-responsive" src="data:image/jpg;base64,'.base64_encode($data['rutaFoto']).'">
                              <center class="caption">
                                 <h3>Habitación '.$data['numHabitacion'].'</h3>
                                <p>'.$data['numPersonas'].' personas normales y '.$data["maxPersonasExtra"].' persona(s) extra(s).</p>
                                <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#'.$data['idHabitacion'].'">Leer más</button>
                                <div id="'.$data['idHabitacion'].'" class="collapse">
                                	<p>'.$data["numCamas"].' cama(s). '.utf8_encode($data['descripcion']).'.</p>
                                </div>
                                <br>
                                <input type="button" class="btn btn-primary" name="" onClick="ModificarHab('.$data['idHabitacion'].');" value="Visualizar">
                                <input type="button" class="btn btn-danger" name="" onClick="EliminarHab('.$data['idHabitacion'].');" value="Eliminar">
                            </center>
                          </div>
                        </div>'; 
	}
	///////////fin de la creación de los bloques de información

	//$arrayHtml = array(0 => $infoHabitaciones, 1 => $listaPaginacion);
	$arrayHtml["inforHabitaciones"] =  $infoHabitaciones;
	$arrayHtml["numeracion"] = $listaPaginacion;

    echo json_encode($arrayHtml, JSON_UNESCAPED_UNICODE);

?>