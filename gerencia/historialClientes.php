<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">

<body style="background-color: #f7f4f4;">
  
  <div class="row affix-row">
    <!-- //////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////// -->
    <!-- Mi menu -->
    <div class="col-xs-12 col-md-2 col-lg-2">
      <?php include('includes/menu.php'); ?>
    </div>
    <!-- longitud de mi segunda parte de la págia -->
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 affix-content">
      
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
          <div class="container" style="margin-top:100px;">
            
            <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                    <h3><b>Historial de los clientes</b></h3>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                    <!-- //////// contenido /////// -->

                    <div class="col-md-12">
                        <h3><p class="text-primary">Bienvenido a la sección historica de los clientes.</p></h3>
                    </div>
                    <br>
                     <div class="row">
                          
                          <!--Contenido-->
                          <div class="col-md-4 col-md-offset-1 col-sm-4">
                              <img src="styles/images/HistorialClientes.jpg" class="img-rounded img-responsive" alt="habitaciones" width="300" height="200">
                          </div>
                          <div class="col-md-7 col-sm-5 affix-content">
                              
                              <!--Table info-->
                            <table class="table">
                                <tbody>
                                  <tr>
                                    En esta sección podra ver una lista historia de los clientes.
                                  </tr>
                                  <tr>
                                    <td>
                                      <a class="btn btn-info btn-sm myWidth20" href="listaHistorialClientes.php">Listado de servicios</a>
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