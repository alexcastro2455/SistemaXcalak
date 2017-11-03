<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">

<body style="background-color: #f7f4f4;">
  
  <div class="row affix-row">
    <!-- //////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////// -->
    <!-- Mi menu -->
    <?php include('includes/menu.php'); ?>
    
    <!-- longitud de mi segunda parte de la págia -->
    <div class="col-sm-9 col-md-10 affix-content">
      
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
          <div class="container" style="margin-top:100px;">
            
            <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                    <h3><b>Disponibilidad de habitaciones</b></h3>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                    <!-- //////// contenido /////// -->

                    <div class="col-md-12">
                        <h3><p class="text-primary">Bienvenido a la sección disponibilidad de las habitaciones.</p></h3>
                    </div>
                    <br>
                     <div class="row">
                          
                          <!--Contenido-->
                          <div class="col-md-4 col-md-offset-1 col-sm-4">
                              <img src="styles/images/disponibilidad.png" class="img-rounded" alt="habitaciones" width="150" height="150">
                          </div>
                          <div class="col-md-7 col-sm-5">
                              
                              <!--Table info-->
                          <table class="table">
                                <tbody>
                                  <tr>
                                    En esta sección podra ver el estado de todas las habitaciones del hotel.
                                  </tr>
                                  <tr>
                                    <td>
                                      <a class="btn btn-info btn-sm myWidth20" href="listaDisponibilidadHabitacion.php">Listado de servicios</a>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                               <!--Fin Table info-->
                          </div>
                          <!--Fin contenido-->
                      </div>
                      <!-- //////// contenido /////// -->

                  </div>
                  <!-- //////// body /////// -->

              </div>

            </div>
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
      </div>
</div>

<!--Pie de página-->
<?php include('includes/footer.php'); ?>


</body>