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
                    <h4>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="disponibilidadHabitacion.php">Inicio disponibilidad</a></li>
                        <li class="class="breadcrumb-item active"">Lista de disponibilidad de habitaciones</li>
                      </ol>
                    </h4>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                    <?php include("includeForms/formDisponibilidadHabitaciones/containerDisponibilidadHabitaciones.php"); ?>


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

<script>
  
  $(document).ready(function(){

    pagination(1); //llamo a mi tabla

  });

  function pagination(partida){
            
            $.ajax({
              method: 'POST',
              url: 'includes/habitacion/paginacionHabitacionesDisponibilidad.php',
              data:'partida='+partida,
              dataType: "json",
              success:function(data){
                    
                    $('#ListadoHabitaciones').html(data["inforHabitaciones"]);
                    $("#pagination").html(data["numeracion"]);
                
              }
            });
            return false;
           }

</script>