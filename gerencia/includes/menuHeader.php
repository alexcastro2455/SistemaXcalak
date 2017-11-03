<?php include ('includes/session.php'); ?>
<header class="my-header">
    <nav class="container-fluid navbar navbar-static-top">
      <div class="navbar-header">
        
        <div class="my-logo">

          <span><img width="60px" height="50px" src="styles/images/xcalak_SF.png">Hotel <b>Xcalak</b></span>

          <div class="pull-right"><!--Boton de navegacion responsiva-->
            <a class="navbar-toggle collapsed btnbarra" data-toggle="collapse" data-target="#barra-menu">
              <i class="sr-only">Toggle Navigation</i>
              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </a>
          </div><!--Boton de navegacion responsiva-->

        </div> <!-- my-logo -->

        <div class="my-div-right"><!--Iconos de menu principal-->
          <div class="navbar-collapse collapse" id="barra-menu">
            <ul class="nav navbar-nav my-right-ul"><!--iconos-->

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

            </ul><!--iconos-->
          </div>
        </div> <!--Iconos de menu principal-->

      </div>  <!-- termina -->
    </nav>  <!-- barra de navegación -->
  </header>