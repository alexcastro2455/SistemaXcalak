<?php include('recepcion/includes/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Xcalak | Administrativo</title>
    <link rel="stylesheet" href="recepcion/css/bootstrap.css">
    <link rel="stylesheet" href="recepcion/font-awesome/css/font-awesome.css"> <!--Iconos--> 
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="recepcion/css/cssLogin.css">
    <link rel="shortcut icon" href="recepcion/img/xcalak_logo.png"><!--Icono de pestaña-->
</head>
<body>

      <div class="my-content" >
        <div class="container" > 

            <div class="row">
              <div class="col-sm-12" >
                  <img src="recepcion/img/xcalak_SF.png" class="img-rounded sizeImgMedium" alt="Responsive image">
                  <div class="mydescription">
                    <h3><b>ACCESO ADMINISTRATIVO</b></h3>
                  </div>
              </div>
            </div>

            <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                      <div class="myform-top">
                          <div class="myform-top-left">
                              <h4>Ingresa tu correo y contraseña</h4>
                          </div>
                          <div class="myform-top-right sizeIcon">
                            <i class="fa fa-key"></i>
                          </div>
                      </div>
                      <div class="myform-bottom">
                          <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="">

                            <!--Toma los datos del formulario y los valida para revisar el acceso-->
                            <?php

                            //Validamos si los input estan vacios
                            if (!empty($_POST)) {
                              $user = $_POST['username'];
                              $password = $_POST['password'];

                              //Realizamos la consulta para buscar coincidencias en empleados
                              $sql = mysqli_query($conn, "SELECT e.*, pt.puesto, tu.tipoUsuario, su.ubicacion FROM empleados as e 
										INNER JOIN puestos_trabajo as pt 
										on e.puestos_trabajo_idPuestoTrabajo = pt.idPuestoTrabajo 
										INNER JOIN tipo_usuario as tu
										on e.tipo_usuario_idTipoUsuario = tu.idTipoUsuario
										INNER JOIN sucursales as su 
										on e.sucursales_idSucursal = su.idSucursal
										where correo = '$user' and password= '$password' AND tipo_usuario_idTipoUsuario = 1");

                              if ($sql->num_rows > 0) { //Verifica si encuentra coincidencias
                                
                                //si las encuentra, genera un arreglo para traer datos de la bd y utilizarlos
                                while ($row = mysqli_fetch_array($sql)) {
                                  @session_start();
                                  $_SESSION['nombre'] = $row['nombre'];
                                  $_SESSION['apellido'] = $row['apellido'];
                                  $_SESSION['puesto'] = $row['puesto'];
                                  //$_SESSION['user'] = $row['user'];
                                  $_SESSION['sucursales_idSucursal'] = $row['sucursales_idSucursal'];

                                  header('Location: gerencia/index.php'); //Despues redirecciona al index de gerencia
                                }

                              }else{ //Si no encuentra coincidencias en administrativos pasa a empleados

                                //Consulta los usuarios de los niveles de empleado
                                $sql2 = mysqli_query($conn, "SELECT * FROM empleados INNER JOIN puestos_trabajo ON empleados.puestos_trabajo_idPuestoTrabajo WHERE correo = '$user' AND password = '$password' AND tipo_usuario_idTipoUsuario = 2");

                                //Busca alguna coincidencia
                                if ($sql2->num_rows > 0) {

                                   //si las encuentra, genera un arreglo para traer datos de la bd y utilizarlos
                                  while ($row = mysqli_fetch_array($sql2)) {
                                    @session_start();
                                    $_SESSION['nombre'] = $row['nombre'];
                                    $_SESSION['apellido'] = $row['apellido'];
                                    $_SESSION['puesto'] = $row['puestos_trabajo_idPuestoTrabajo'];
                                    $_SESSION['user'] = $row['user'];

                                    header('Location: recepcion/index.php'); //Despues redirecciona al index de recepcion
                                  }
                                
                                //En caso de no encontrar ninguna coincidencia, muestra mensaje de error
                                }else{ ?>

                                   <!--Mensaje de alerta / Error-->
                                  <div class='alert alert-danger' role='alert'>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <p><b>Usuario o contraseña incorrectos</b></p>
                                  </div>

                              <?php }

                              }

                            }

                            ?>

                            <div class="form-group input-group">
                              <span class="input-group-addon sizeIcon"><i class="fa fa-user"></i></span>
                              <input id="correo" type="text" name="username" placeholder="Correo" class="form-control" id="form-username" required>
                            </div>
                            
                            <div class="form-group  input-group">
                              <span class="input-group-addon"><i class="fa fa-lock sizeIcon" style="font-size: 20px"></i></span>
                              <input id="password" type="password" name="password" placeholder="Contraseña" class="form-control" id="form-password">
                            </div>
                            
                            <button id="btnLogin" class="mybtn btn btn-success" type="submit">ENTRAR</button>

                          </form>
                      </div>
                  </div>
            </div>

        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="recepcion/js/bootstrap.js"></script>
</body>
</html>