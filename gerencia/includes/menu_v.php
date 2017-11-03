<?php include('includes/session.php'); ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon">
              <a href="#"><i class="fa fa-user-o" style="font-size: 15px; color:white;"></i></a>
            </span>
          </button>
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-navbar-collapse" aria-expanded="false" aria-controls="navbar2">
            <span class="sr-only" title="Cerrar sesión">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span style="color:white"><img width="60px" height="50px" src="styles/images/xcalak_SF.png">Hotel <b>Xcalak</b></span>
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

<div class="col-sm-3 col-md-2 affix-sidebar">
		<div class="sidebar-nav" style="background-color: #78cc78;">
        <div class="navbar navbar-default" role="navigation" style="background-color: #78cc78;">
            
            <div class="navbar-collapse collapse sidebar-navbar-collapse" style="background-color: #78cc78;">
                <ul class="nav navbar-nav" id="sidenav01">
                  
                  <div class="brand myIcon" style="">
                        <a href="index.php"><img src="styles/images/gerente.png" style="margin-left: 45px; width: 200px; height: 200px;"></a>
                        <div class="alert alert-warning">
                          <strong><?php echo $_SESSION['puesto']; ?>  <?php echo $_SESSION['nombre']; ?></strong> 
                        </div>
                    
                  </div>

                  <!-- ///// Habitaciones /////-->
                  <li>
                    <a href="#" data-toggle="collapse" data-target="#toggleSection1" data-parent="#sidenav01" class="meuheading collapsed">
                    <i class="fa fa-bed fa-lg"></i> Habitaciones <span class="arrow align right"></span>
                    </a>
                    <div class="menuchild collapse" id="toggleSection1" style="height: 0px;">
                      <ul class="nav nav-list sub-menu">
                        
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
                    </div>
                  </li>

                  <!-- ///// Servicios /////-->
                  <li class="">
                    <a href="#" data-toggle="collapse" data-target="#toggleSection2" data-parent="#sidenav01" class="meuheading collapsed">
                    <i class="fa fa-shopping-basket fa-lg"></i> Servicios <span class="arrow"></span>
                    </a>
                    <div class="menuchild collapse" id="toggleSection2" style="height: 0px;">
                      <ul class="nav nav-list sub-menu">

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
                    </div>
                  </li>


                  <!-- ///// Promociones /////-->
                  <li class="">
                    <a href="#" data-toggle="collapse" data-target="#toggleSection3" data-parent="#sidenav01" class="meuheading collapsed">
                    <i class="fa fa-star fa-lg"></i> Promociones <span class="arrow"></span>
                    </a>
                    <div class="menuchild collapse" id="toggleSection3" style="height: 0px;">
                      <ul class="nav nav-list sub-menu">

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
                    </div>
                  </li>

                  <!-- ///// Historial de clientes /////-->
                  <li class="">
                    <a href="#" data-toggle="collapse" data-target="#toggleSection4" data-parent="#sidenav01" class="meuheading collapsed">
                    <i class="fa fa-id-card-o fa-lg"></i> Clientes <span class="arrow"></span>
                    </a>
                    <div class="menuchild collapse" id="toggleSection4" style="height: 0px;">
                      <ul class="nav nav-list sub-menu">

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
                    </div>
                  </li>

                  <!-- ///// Empleados /////-->
                  <li class="">
                    <a href="#" data-toggle="collapse" data-target="#toggleSection5" data-parent="#sidenav01" class="meuheading collapsed">
                    <i class="fa fa-users fa-lg"></i> Empleados <span class="arrow"></span>
                    </a>
                    <div class="menuchild collapse" id="toggleSection5" style="height: 0px;">
                      <ul class="nav nav-list sub-menu">

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
                    </div>
                  </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
        <!-- Termina navbar navbar-default -->
      </div>
      <!-- Termina sidebar-nav -->
	</div>


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

  <!--  https://bootsnipp.com/snippets/featured/vertical-menu-with-hightlight 
  https://bootsnipp.com/snippets/featured/vertical-affix-menu-css-only

  https://bootsnipp.com/snippets/QAmMX checar
  http://jsfiddle.net/sv196z2r/5/ checar
  -->