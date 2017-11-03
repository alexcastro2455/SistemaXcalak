<?php include('includes/session.php'); ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon">
              <a href="#" title="cerrar sesión"><i class="fa fa-user-o" style="font-size: 15px; color:white;"></i></a>
            </span>
          </button>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-content" aria-expanded="false" aria-controls="navbar2">
            <a href="#" title="Cerrar sesión"><span class="sr-only">Toggle navigation</span></a>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="index.php"><span style="color:white"><img width="60px" height="40px" src="styles/images/xcalak_SF.png">Hotel <b>Xcalak</b></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
             <li><!--Cerrar sesion-->

                  <!--Pantallas moviles-->
                  <a href="#logOut" data-target="#logOut" class="mytool hidden-xs hidden-sm" data-toggle="modal" data-placement="bottom">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Cerrar sesión
                  </a>

                  <!--Pantallas moviles-->
                  <a href="#logOut" data-target="#logOut" class="mytool hidden-md hidden-lg" data-toggle="modal" data-placement="bottom">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </a>

                </li>
          </ul>
          
        </div>
      </div>
    </nav>




  <!-- 1 -->
    <nav class="col-sm-3 col-md-3 col-lg-3">
        <div class="nav-side-menu col-sm-2 col-md-2 col-lg-2">
          <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out" style="">
                <center class="brand myIcon" style="padding-top: 20px;">
                        <a href="index.php"><img class="img-responsive" src="styles/images/gerente.png" style="width: 200px; height: 200px;"></a>
                      <div class="alert alert-warning">
                        <strong><h4><?php echo $_SESSION['puesto']; ?>  <?php echo $_SESSION['nombre']; ?></h4></strong> 
                      </div>
                  
                </center>

                <li data-toggle="collapse" data-target="#toggleSection1" class="collapsed">
                    <a href="#"><i class="fa fa-bed fa-lg"></i> Habitaciones <span class="arrow"></span></a>
                </li>

                <ul class="sub-menu collapse" id="toggleSection1">
                      
                    <li>
                      <a href="ghabitaciones.php">
                        <i class="fa fa-info fa-lg"></i> Habitaciones Intro
                      </a>  
                    </li>
                    
                    <li>
                      <a href="listaHabitaciones.php">
                        <i class="fa fa-bed fa-lg"></i> Lista Habitaciones
                      </a>
                    </li>
                    
                    <li>
                      <a href="gprecioHabitacion.php">
                        <i class="fa fa-bed fa-lg"></i> Registro de precio
                      </a>
                    </li>

                    <li>
                      <a href="listaPreciosHabitacion.php">
                        <i class="fa fa-usd fa-lg"></i> Lista de precios por habitación
                      </a>
                    </li>

                    <li>
                      <a href="listaDisponibilidadHabitacion.php">
                        <i class="fa fa-check fa-lg"></i> Lista de disponibilidad
                      </a>
                    </li>

                </ul>
                  

                <li data-toggle="collapse" data-target="#toggleSection2" class="collapsed">
                  <a href="#"><i class="fa fa-id-card-o fa-lg"></i> Servicios <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="toggleSection2">
                  
                    <li>
                      <a href="gservicios.php">
                        <i class="fa fa-info fa-lg"></i> Servicios Intro
                      </a>
                    </li>

                    <li>
                      <a href="listaServicios.php">
                        <i class="fa fa-list fa-lg"></i> Lista de servicios
                      </a>
                    </li>
                
                </ul>

                <li data-toggle="collapse" data-target="#toggleSection3" class="collapsed">
                  <a href="#"><i class="fa fa-shopping-basket fa-lg"></i> Promociones <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="toggleSection3">
                  
                      <li>
                        <a href="gpromocion.php">
                          <i class="fa fa-info fa-lg"></i> Promociones Intro
                        </a>
                      </li>

                      <li>
                        <a href="listaPromociones.php">
                          <i class="fa fa-list fa-lg"></i> Lista de Promociones
                        </a>
                      </li>
                
                </ul>

                <li data-toggle="collapse" data-target="#toggleSection4" class="collapsed">
                    <a href="#"><i class="fa fa-user fa-lg"></i> Clientes <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="toggleSection4">
                  
                    <li>
                      <a href="historialClientes.php">
                        <i class="fa fa-info fa-lg"></i> Clientes Intro
                      </a>
                    </li>

                    <li>
                      <a href="listaHistorialClientes.php">
                        <i class="fa fa-list fa-lg"></i> Lista de historial
                      </a>
                    </li>
                
                </ul>


                <li data-toggle="collapse" data-target="#toggleSection5" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Empleados <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="toggleSection5">
                  
                    <li>
                      <a href="gempleados.php">
                        <i class="fa fa-info fa-lg"></i> Empleados
                      </a>
                    </li>

                    <li>
                      <a href="listaEmpleados.php">
                        <i class="fa fa-list fa-lg"></i> Lista de Empleados
                      </a>
                    </li>
                
                </ul>

            </ul>
     </div>
</nav>
  <!-- 2 -->


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