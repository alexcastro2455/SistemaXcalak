<?php include('includes/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Xcalak | Recepción</title>
	<link href="css/bootstrap.css" rel="stylesheet"><!--Hoja de estilos de bootstrap-->
    <link rel="stylesheet" href="css/stylesheet.css"><!--Hoja de estilos extra-->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css"> <!--Iconos-->
    <link rel="stylesheet" type="text/css" href="css/cssMenuAdmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <link rel="stylesheet" type="text/css" href="libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <link rel="shortcut icon" href="img/book.png"><!--Icono de pestaña-->

    <style>
      /*Elimina las flechas de los input de tipo numérico*/
      input[type=number]::-webkit-outer-spin-button, input[type=number]::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
      input[type=number] {
        -moz-appearance:textfield;
      }
    </style>

</head>
<body style="background: #e5e5e5;">

	<?php include('includes/navbar_r.php'); ?>

    <div class="container">

    <!--Cuadro de presentación-->
    <div class="panel panel-primary">
      <!--Encabezado-->
      <div class="panel-heading">
        <h4>BUSCAR HABITACIONES</h4>
      </div>
      <!--Contenido-->
      <div id="panel-buscar" class="panel-body">
        <!--Formulario para busqueda-->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" accept-charset="utf-8">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <label for="llegada">Día de llegada</label>
              <div class="input-group date bt-datepicker">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                <input min=<?php echo date('Y-m-d'); ?> type="text" class="form-control" name="llegada" id="llegada" required="true">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <label for="salida">Día de salida</label>
              <div class="input-group date bt-datepicker">
                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                <input min=<?php echo date('Y-m-d'); ?> type="text" class="form-control" name="salida" id="salida" required="true">
              </div>
            </div>
          </div>

          <br><br><!--Espacio-->

          <div class="row">
            <div class="col-md-4 col-sm-4">
              <label for="habitaciones">Número de habitaciones</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
                <input min="1" max="3" type="number" name="habitaciones" id="habitaciones" class="form-control" required="true">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <label for="adulto">Adultos</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                <input min="1" type="number" class="form-control" name="adulto" id="adulto" required="true">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <label for="nino">Niños</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-child" aria-hidden="true"></i></span>
                <input min="0" type="number" name="nino" id="nino" class="form-control" required="true">
              </div>
            </div>
          </div>

          <br><br><!--Espacio-->

          <div style="padding: 15px;" class="row" align="right">
            <button type="submit" class="btn btn-success">Buscar</button>
          </div>
        </form><!--Formulario-->

      </div><!--Panel body-->
    </div><!--Panel-->

  <!--|||||||||||||||||||||||||||||||||FUNCION PARA BUSQUEDA DE HABITACIONES||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    
    <!--Habitaciones encontradas-->     
    <?php

    //Conexion a la BD
    include('includes/conexion.php');

    if (!empty($_POST)) { ?> <!--Revisa que los campos no esten vacios-->

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4>HABITACIONES DISPONIBLES</h4>
        </div>
        <div class="panel-body">

        <div align="center" class="alert alert-warning" role="alert">
          <p><b>Disculpa las molestias.</b> Por el momento nuestro sistema de pago con tarjeta no se encuentra disponible, únicamente podrás reservar.</p>
        </div>
        <br>
          
        <?php

          //Variables estaticas para pruebas
          $adulto = $_POST['adulto'];
          $nino = $_POST['nino'];
          $huespedes = $adulto + $nino;
          $habitaciones =$_POST['habitaciones'];
          $fecha1 = $_POST['llegada'];
          $fecha2 = $_POST['salida'];
          $capacidad = 0; //Acumulador que guarda los espacios disponibles encontrados

          //Se cuenta la capacidad total de hotel, es decir el total de personas que pueden hospedarse
          $totalPersonas = mysqli_query($conn,"SELECT SUM(numPersonas) AS numPersonas FROM habitaciones");

          while ($capacidadTotal = mysqli_fetch_array($totalPersonas)) {
            $capacidad = $capacidad + $capacidadTotal["numPersonas"];
          }

          //Determinar numero de personas entre el rango de fechas
          $promedio = mysqli_query($conn, "SELECT numPersonas FROM reservaciones WHERE fechaLlegada BETWEEN '$fecha1' AND '$fecha2'");
          $ocupado=0;

          //Se revisa fecha por fecha para revisar si existe capacidad en todas ellas
          while ($promedioTotal = mysqli_fetch_array($promedio)) {
            $VerTotal= $capacidad-$promedioTotal["numPersonas"];

            if($VerTotal<$huespedes){
              $ocupado+=1;
            }
          }

          //Si detecta el incremento, es decir, encuentra una fecha sin espacio, verifica 
          if ($ocupado==0) {
            //echo "Disponible";

            //Se cuenta los números de habitaciones por tipo
            $habSencilla = mysqli_query($conn, "SELECT COUNT(*) AS tHabitaciones FROM habitaciones WHERE tipo_habitacion_idTipoHabitacion = 1");

            $habDoble = mysqli_query($conn, "SELECT COUNT(*) AS tHabitaciones FROM habitaciones WHERE tipo_habitacion_idTipoHabitacion = 2");

            $habTriple = mysqli_query($conn, "SELECT COUNT(*) AS tHabitaciones FROM habitaciones WHERE tipo_habitacion_idTipoHabitacion = 3");

            $habCuadruple = mysqli_query($conn, "SELECT COUNT(*) AS tHabitaciones FROM habitaciones WHERE tipo_habitacion_idTipoHabitacion = 4");

            //Acomoda los resultados encontrados en un arregl para validar la cantidad de habitaciones disponibles
            while ($hSencilla = mysqli_fetch_assoc($habSencilla)) {//Habitacion sencilla
              $habitacionSencilla = 0; //Variable acumuladora

              //Se suma cada registro encontrada al acumulador
              $habitacionSencilla = $habitacionSencilla + $hSencilla['tHabitaciones'];
            }

            while ($hDoble = mysqli_fetch_assoc($habDoble)) {//Habitacion doble
              $habitacionDoble = 0;//Variable acumuladora

              //Se suma cada registro encontrada al acumulador
              $habitacionDoble = $habitacionDoble + $hDoble['tHabitaciones'];
            }

            while ($hTriple = mysqli_fetch_assoc($habTriple)) {//Habitacion triple
              $habitacionTriple = 0;//Variable acumuladora

              //Se suma cada registro encontrada al acumulador
              $habitacionTriple = $habitacionTriple + $hTriple['tHabitaciones'];
            }

            while ($hCuadruple = mysqli_fetch_assoc($habCuadruple)) {//Habitacion cuadruple
              $habitacionCuadruple = 0;//Variable acumuladora

              //Se suma cada registro encontrada al acumulador
              $habitacionCuadruple = $habitacionCuadruple + $hCuadruple['tHabitaciones'];
            }

            //----------------------------------------------------------------------------------
            //COMIENZA A VALIDARSE QUÉ TIPO DE HABITACIÓN HAY DISPONIBLE DEPENDIENDO EL NÚMERO DE HUESPEDES


            if ($huespedes <= 2 && $huespedes >= 1 ) {//Valida si es habitacion doble o sencilla

              $HabSenOcupadas = 0;//Acumulador de habitaciones sencillas ocupadas

              //Se realiza el conteo de habitaciones ocupadas en ese rango de fecha para saber la disponibilidad
              $pHabSen = mysqli_query($conn, "SELECT COUNT(*) AS habitacionesSencillas FROM reservaciones WHERE tipo_habitacion_idTipoHabitacion = 1 AND fechaLlegada BETWEEN '$fecha1' AND '$fecha2'");

              while ($s = mysqli_fetch_array($pHabSen)) {//Recoge los resultados y los acomoda en un arreglo

                $HabSenOcupadas = $HabSenOcupadas + $s['habitacionesSencillas'];//Se suma el resultado al acumulador

                $promedioSencilla = $habitacionSencilla - $HabSenOcupadas;//Se compara el numero de habitaciones encontradas con el total

                if ($promedioSencilla > 0) { //Si encuentra habitaciones disponibles entonces...

                  //Consulta los datos para mostrar
                  $conHabSen = mysqli_query($conn, "SELECT * FROM habitaciones INNER JOIN tipo_habitacion ON habitaciones.tipo_habitacion_idTipoHabitacion INNER JOIN precio_habitaciones ON tipo_habitacion.precio_habitaciones_idPrecioHabitacion WHERE tipo_habitacion_idTipoHabitacion = 1 AND idTipoHabitacion = 1 LIMIT 1");

                  while ($cs = mysqli_fetch_array($conHabSen)) {//Acomoda resultados en un arreglo ?>
                  
                  <div class="row" style="padding: 15px;">
                    <div class="col-md-3 col-sm-3"><!--Foto de habitación-->
                      <img class="hidden-sm hidden-xs" style="border-radius: 5px;" width="220" height="150" src="data:image/jpg;base64, <?php echo base64_encode($cs['rutaFoto']); ?>"><!--Dispositivos pantalla normal-->
                      <img class="hidden-md hidden-lg" style="border-radius: 5px;" width="160" height="120" src="data:image/jpg;base64, <?php echo base64_encode($cs['rutaFoto']); ?>"><!--Dispositivos moviles-->
                    </div>
                    <div class="col-md-3 col-sm-3"><!--Características-->
                      <p class="hab-des"><b>Habitación <?php echo $cs['tipo']; ?></b></p>
                      <p class="hab-des">- Habitación para <?php echo $cs['numPersonas']; ?> personas <br>- <?php echo $cs['numCamas']; ?> cama(s) <br>- T.V.<br>- Baño privado<br>- Conexión WIFI<br></p>
                    </div><br>
                    <?php

                    //Se calcula el precio segun el numero de habitaciones
                    $precioTotal = $habitaciones * $cs['precioHabitacion'];

                    ?>
                    <div align="center" class="col-md-3 col-sm-3"><!--Precio-->
                      <p class="precio"><b>$<?php echo $precioTotal; ?>.00 MXN</b></p>
                      <p class="hab-des">Tarifa por noche</p>
                      <p style="color: red;" class="hab-des">Sólo quedan <?php echo $habitacionSencilla; ?> habitaciones</p>
                    </div>
                    <div align="center" style="line-height: 100px;" class="col-md-3 col-sm-3"><!--Botón de seleccionar-->
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rSencilla">Seleccionar</button>
                    </div><!--Botones-->

                    <!-- Mensaje reservación -->
                    <div class="modal fade" id="rSencilla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">RESERVAR</h4>
                          </div>
                          <div class="modal-body">
                            <p>Al reservar, tendrás 7 días hábiles a partir de hoy para realizar tu pago, ya sea por depósito o con tarjeta, de lo contrario tu reservación será cancelada y perderás tu habitación. ¿Deseas reservar?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="pedido.php?tipoHabitacion=<?php echo $cs['tipo']; ?>&huespedes=<?php echo $huespedes; ?>&habitaciones=<?php echo $habitaciones; ?>&llegada=<?php echo $fecha1; ?>&salida=<?php echo $fecha2; ?>&precio=<?php echo $precioTotal; ?>&idTipoHabitacion=1" type="button" class="btn btn-success">Reservar</a>
                          </div>
                        </div>
                      </div>
                    </div><!--Modal-->

                  </div><!--contenedor resultado-->
                <?php }
                }
              }

              //\\\\\\\\\\\\\\\PROCESO PARA HABITACIONES DOBLES\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

              //Conteo de habitaciones ocupadas en ese rango de fechas
              $pHabDob = mysqli_query($conn, "SELECT COUNT(*) AS habitacionesDobles FROM reservaciones WHERE tipo_habitacion_idTipoHabitacion = 2 AND fechaLlegada BETWEEN '$fecha1' AND '$fecha2'");

              while ($d = mysqli_fetch_assoc($pHabDob)) {//Acomoda los resultados en un arreglo
                $HabDobOcupadas = 0;//Acumulador
                
                $HabDobOcupadas = $HabDobOcupadas + $d['habitacionesDobles'];//Suma cada resultado encontrado al acumulador

              }

              $promedioDobles = $habitacionDoble - $HabDobOcupadas;//Compara el total de habitaciones con las ocupadas

              if ($promedioDobles > 0) { //Si encuentra disponibilidad

                //Realiza consulta para mostrar los datos
                $conHabDob = mysqli_query($conn, "SELECT * FROM habitaciones INNER JOIN tipo_habitacion ON habitaciones.tipo_habitacion_idTipoHabitacion INNER JOIN precio_habitaciones ON tipo_habitacion.precio_habitaciones_idPrecioHabitacion WHERE tipo_habitacion_idTipoHabitacion = 2 AND idTipoHabitacion = 2 LIMIT 1");

                while ($cd = mysqli_fetch_array($conHabDob)) {//Los acomoda en un arreglo ?>
                
                <div class="row" style="padding: 15px;">
                  <div class="col-md-3 col-sm-3"><!--Foto de habitación-->
                    <img class="hidden-sm hidden-xs" style="border-radius: 5px;" width="220" height="150" src="data:image/jpg;base64, <?php echo base64_encode($cd['rutaFoto']); ?>"><!--Dispositivos pantalla normal-->
                    <img class="hidden-md hidden-lg" style="border-radius: 5px;" width="160" height="120" src="data:image/jpg;base64, <?php echo base64_encode($cd['rutaFoto']); ?>"><!--Dispositivos moviles-->
                  </div>
                  <div class="col-md-3 col-sm-3"><!--Características-->
                    <p class="hab-des"><b>Habitación <?php echo $cd['tipo']; ?></b></p>
                    <p class="hab-des">- Habitación para <?php echo $cd['numPersonas']; ?> personas <br>- <?php echo $cd['numCamas']; ?> cama(s) <br>- T.V.<br>- Baño privado<br>- Conexión WIFI<br></p>
                  </div><br>

                  <?php

                  //Se calcula el precio segun el numero de habitaciones
                  $precioTotal = $habitaciones * $cd['precioHabitacion'];

                  ?>

                  <div align="center" class="col-md-3 col-sm-3"><!--Precio-->
                    <p class="precio"><b>$<?php echo $precioTotal; ?>.00 MXN</b></p>
                    <p class="hab-des">Tarifa por noche</p>
                    <p style="color: red;" class="hab-des">Sólo quedan <?php echo $habitacionDoble; ?> habitaciones</p>
                  </div>
                  <div align="center" style="line-height: 100px;" class="col-md-3 col-sm-3"><!--Botón de seleccionar-->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rDoble">Seleccionar</button>
                  </div>
                  <!-- Mensaje reservación -->
                  <div class="modal fade" id="rDoble" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">RESERVAR</h4>
                        </div>
                        <div class="modal-body">
                          <p>Al reservar, tendrás 7 días hábiles a partir de hoy para realizar tu pago, ya sea por depósito o con tarjeta, de lo contrario tu reservación será cancelada y perderás tu habitación. ¿Deseas reservar?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <a href="pedido.php?tipoHabitacion=<?php echo $cd['tipo']; ?>&huespedes=<?php echo $huespedes; ?>&habitaciones=<?php echo $habitaciones; ?>&llegada=<?php echo $fecha1; ?>&salida=<?php echo $fecha2; ?>&precio=<?php echo $precioTotal; ?>&idTipoHabitacion=2" type="button" class="btn btn-success">Reservar</a>
                        </div>
                      </div>
                    </div>
                  </div><!--Modal-->
                </div>

              <?php }

              }

            //------------------------------------------------------------------------------
            //AQUI VALIDAD CUANDO LA HABITACION SEA TRIPLE

            }elseif ($huespedes < 4 && $huespedes >=3) {//Valida el numero de personas

              //Cuenta el numero de habitaciones ocupadas en el rango de fechas
              $pHabTrip = mysqli_query($conn, "SELECT COUNT(*) AS habitacionesTriples FROM reservaciones WHERE tipo_habitacion_idTipoHabitacion = 3 AND fechaLlegada BETWEEN '$fecha1' AND '$fecha2'");

              while ($t = mysqli_fetch_assoc($pHabTrip)) {//Acomoda los resultados en un arreglo
                $HabTripOcupadas = 0;//Acumulador
                
                $HabTripOcupadas = $HabTripOcupadas + $t['habitacionesTriples'];//Suma los resultados al arreglo

              }

              $promedioTriples = $habitacionTriple - $HabTripOcupadas;//Compara las habitaciones ocupadas con el total

              if ($promedioTriples > 0) { //Compara si hay disponibilidad

                //Consulta los datos para mostrar
                $conHabTri = mysqli_query($conn, "SELECT * FROM habitaciones INNER JOIN tipo_habitacion ON habitaciones.tipo_habitacion_idTipoHabitacion INNER JOIN precio_habitaciones ON tipo_habitacion.precio_habitaciones_idPrecioHabitacion WHERE tipo_habitacion_idTipoHabitacion = 3 AND idTipoHabitacion = 3 LIMIT 1");

                while ($ct = mysqli_fetch_array($conHabTri)) { //Acomoda los resultados en un arreglo?>
                
                <div class="row" style="padding: 15px;">
                  <div class="col-md-3 col-sm-3"><!--Foto de habitación-->
                    <img class="hidden-sm hidden-xs" style="border-radius: 5px;" width="220" height="150" src="data:image/jpg;base64, <?php echo base64_encode($ct['rutaFoto']); ?>"><!--Dispositivos pantalla normal-->
                    <img class="hidden-md hidden-lg" style="border-radius: 5px;" width="160" height="120" src="data:image/jpg;base64, <?php echo base64_encode($ct['rutaFoto']); ?>"><!--Dispositivos moviles-->
                  </div>
                  <div class="col-md-3 col-sm-3"><!--Características-->
                    <p class="hab-des"><b>Habitación <?php echo $ct['tipo']; ?></b></p>
                    <p class="hab-des">- Habitación para <?php echo $ct['numPersonas']; ?> personas <br>- <?php echo $ct['numCamas']; ?> cama(s) <br>- T.V.<br>- Baño privado<br>- Conexión WIFI<br></p>
                  </div><br>

                  <?php

                  //Se calcula el precio segun el numero de habitaciones
                  $precioTotal = $habitaciones * $ct['precioHabitacion'];

                  ?>

                  <div align="center" class="col-md-3 col-sm-3"><!--Precio-->
                    <p class="precio"><b>$<?php echo $precioTotal; ?>.00 MXN</b></p>
                    <p class="hab-des">Tarifa por noche</p>
                    <p style="color: red;" class="hab-des">Sólo quedan <?php echo $habitacionTriple; ?> habitaciones</p>
                  </div>
                  <div align="center" style="line-height: 100px;" class="col-md-3 col-sm-3"><!--Botón de seleccionar-->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rTriple">Seleccionar</button>
                  </div>
                  <!-- Mensaje reservación -->
                  <div class="modal fade" id="rTriple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">RESERVAR</h4>
                        </div>
                        <div class="modal-body">
                          <p>Al reservar, tendrás 7 días hábiles a partir de hoy para realizar tu pago, ya sea por depósito o con tarjeta, de lo contrario tu reservación será cancelada y perderás tu habitación. ¿Deseas reservar?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <a href="pedido.php?tipoHabitacion=<?php echo $ct['tipo']; ?>&huespedes=<?php echo $huespedes; ?>&habitaciones=<?php echo $habitaciones; ?>&llegada=<?php echo $fecha1; ?>&salida=<?php echo $fecha2; ?>&precio=<?php echo $precioTotal; ?>&idTipoHabitacion=3" type="button" class="btn btn-success">Reservar</a>
                        </div>
                      </div>
                    </div>
                  </div><!--Modal-->
                </div>

              <?php }
              }

            //------------------------------------------------------------------------------
            //AQUI VALIDA CUANDO SON HABITACIONES CUADRUPLES

            }elseif ($huespesdes = 4) {//Valida
              
              //Cuenta las habitaciones ocupadas dentro del rango de fechas
              $pHabCuad = mysqli_query($conn, "SELECT COUNT(*) AS habitacionesCuadruples FROM reservaciones WHERE tipo_habitacion_idTipoHabitacion = 4 AND fechaLlegada BETWEEN '$fecha1' AND '$fecha2'");

              while ($c = mysqli_fetch_assoc($pHabCuad)) {//Acomoda los resultados en un arreglo
                $HabCuadOcupadas = 0;//Acumulador
                
                $HabCuadOcupadas = $HabCuadOcupadas + $c['habitacionesCuadruples'];//Suma los resultados al acumulador

              }

              $promedioCuadruples = $habitacionCuadruple - $HabCuadOcupadas;//Compara las habitaciones ocupadas con el total

              if ($promedioCuadruples > 0) { //Revisa si hay disponibilidad

                //Consulta los datos para mostrarlos
                $conHabCua = mysqli_query($conn, "SELECT * FROM habitaciones INNER JOIN tipo_habitacion ON habitaciones.tipo_habitacion_idTipoHabitacion INNER JOIN precio_habitaciones ON tipo_habitacion.precio_habitaciones_idPrecioHabitacion WHERE tipo_habitacion_idTipoHabitacion = 4 AND idTipoHabitacion = 4 LIMIT 1");

                while ($cc = mysqli_fetch_array($conHabCua)) {//Acomoda los resultados en un variable ?>
                
                <div class="row" style="padding: 15px;">
                  <div class="col-md-3 col-sm-3"><!--Foto de habitación-->
                    <img class="hidden-sm hidden-xs" style="border-radius: 5px;" width="220" height="150" src="data:image/jpg;base64, <?php echo base64_encode($cc['rutaFoto']); ?>"><!--Dispositivos pantalla normal-->
                    <img class="hidden-md hidden-lg" style="border-radius: 5px;" width="160" height="120" src="data:image/jpg;base64, <?php echo base64_encode($cc['rutaFoto']); ?>"><!--Dispositivos moviles-->
                  </div>
                  <div class="col-md-3 col-sm-3"><!--Características-->
                    <p class="hab-des"><b>Habitación <?php echo $cc['tipo']; ?></b></p>
                    <p class="hab-des">- Habitación para <?php echo $cc['numPersonas']; ?> personas <br>- <?php echo $cc['numCamas']; ?> cama(s) <br>- T.V.<br>- Baño privado<br>- Conexión WIFI<br></p>
                  </div><br>


                  <?php

                  //Se calcula el precio segun el numero de habitaciones
                  $precioTotal = $habitaciones * $cc['precioHabitacion'];

                  ?>

                  <div align="center" class="col-md-3 col-sm-3"><!--Precio-->
                    <p class="precio"><b>$<?php echo $precioTotal; ?>.00 MXN</b></p>
                    <p class="hab-des">Tarifa por noche</p>
                    <p style="color: red;" class="hab-des">Sólo quedan <?php echo $habitacionCuadruple; ?> habitaciones</p>
                  </div>
                  <div align="center" style="line-height: 100px;" class="col-md-3 col-sm-3"><!--Botón de seleccionar-->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rCuadruple">Seleccionar</button>
                  </div>
                  <!-- Mensaje reservación -->
                  <div class="modal fade" id="rCuadruple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">RESERVAR</h4>
                        </div>
                        <div class="modal-body">
                          <p>Al reservar, tendrás 7 días hábiles a partir de hoy para realizar tu pago, ya sea por depósito o con tarjeta, de lo contrario tu reservación será cancelada y perderás tu habitación. ¿Deseas reservar?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <a href="pedido.php?tipoHabitacion=<?php echo $cc['tipo']; ?>&huespedes=<?php echo $huespedes; ?>&habitaciones=<?php echo $habitaciones; ?>&llegada=<?php echo $fecha1; ?>&salida=<?php echo $fecha2; ?>&precio=<?php echo $precioTotal; ?>&idTipoHabitacion=4" type="button" class="btn btn-success">Reservar</a>
                        </div>
                      </div>
                    </div>
                  </div><!--Modal-->
                </div>

              <?php }
              }

            }

          }else{
            //En caso de no encontrar ningun resultado, avisara de la falta de disponibilidad
            echo "Por el momento no contamos con habitaciones. Disculpa las molestias.";
          }



          //------------------------------------------------------------------------------

        ?>

        </div><!--Panel body-->

      </div><!--Panel-->

      <br><br><br><!--espacio-->

    <?php 

    }//if principal

    ?>

</div><!--Container-->

	<!--Mensaje de cerrar sesion-->
    <div class="modal fade" id="logOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div align="center" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><b>PARECE QUE YA TE VAS...</b></h4>
          </div>
          <div align="center" class="modal-body">
            <h4>¿Realmente deseas salir?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <a href="includes/salir.php" type="button" class="btn btn-danger">Salir</a>
          </div>
        </div>
      </div>
    </div>

    <!--Pie de página-->
    <?php include('includes/footer.php'); ?>

<script type="text/javascript">
  $('.bt-datepicker').datepicker({
      todayBtn: "linked",
      format: "yyyy-mm-dd",
      language: "es",
      todayHighlight: true
  });
</script>
</body>
</html>