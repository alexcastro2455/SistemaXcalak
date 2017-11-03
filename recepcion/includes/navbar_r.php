<?php include ('includes/session.php'); ?>
<header class="my-header">
		<nav style="background: #12a8e8;" class="container-fluid navbar navbar-static-top">
			<div class="navbar-header">
				
				<div class="my-logo">

					<span><img width="60px" height="50px" src="img/xcalak_logo.png">Hotel <b>Xcalak</b></span>

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

							<li><!--Registro-->

								<!--Pantallas normales-->
								<a href="index.php" class="mytool hidden-sm hidden-xs" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-home" aria-hidden="true"></i>
									Inicio
								</a>

								<!--Pantallas moviles-->
								<a href="index.php" class="mytool hidden-md hidden-lg" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-home" aria-hidden="true"></i>
								</a>

							</li>
							
							<li><!--Registro-->

								<!--Pantallas normales-->
								<a href="registro.php" class="mytool hidden-sm hidden-xs" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-user-plus" aria-hidden="true"></i>
									Registro
								</a>

								<!--Pantallas moviles-->
								<a href="registro.php" class="mytool hidden-md hidden-lg" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-user-plus" aria-hidden="true"></i>
								</a>

							</li>

							<li><!--Reservaciones realizadas-->

								<!--Pantallas normales-->
								<a href="reservaciones.php" class="mytool hidden-sm hidden-xs" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-address-book" aria-hidden="true"></i>
									Reservaciones
								</a>

								<!--Pantallas moviles-->
								<a href="reservaciones.php" class="mytool hidden-md hidden-lg" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-address-book" aria-hidden="true"></i>
								</a>

							</li>

							<li><!--Habitaciones-->

								<!--Pantallas normales-->
								<a href="habitaciones.php" class="mytool hidden-sm hidden-xs" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-bed" aria-hidden="true"></i>
									Habitaciones
								</a>

								<!--Pantallas moviles-->
								<a href="habitaciones.php" class="mytool hidden-md hidden-lg" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-bed" aria-hidden="true"></i>
								</a>

							</li>

							<li><!--Limpieza-->

								<!--Pantallas normales-->
								<a href="limpieza" class="mytool hidden-sm hidden-xs" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-trash" aria-hidden="true"></i>
									Limpieza
								</a>

								<!--Pantallas moviles-->
								<a href="limpieza.php" class="mytool hidden-md hidden-lg" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>

							</li>

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

			</div>	<!-- termina -->
		</nav>  <!-- barra de navegación -->
	</header>