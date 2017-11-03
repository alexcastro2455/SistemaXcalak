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
    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-10 affix-content">
      
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
          <div class="container" style="margin-top:100px;">
            
            <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                    <h4>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="historialClientes.php">Inicio historail</a></li>
                        <li class="breadcrumb-item active"">Lista historica de los clientes</li>
                      </ol>
                    </h4>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">

                    <!--Contenido-->
                          <table id="TablaHistorialCliente" class="table display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr class="info">
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Pais</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Función</th>
                              </tr>
                            </thead>
                          </table>
                          <!--Fin contenido-->


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

<script src="styles/js/datatables.js"></script>
<script src="styles/js/dataTables.responsive.js"></script>
</body>

<script>
    
    var myTablaHistorialCliente;  


    $(document).ready(function (){
        listar();
    });

    var listar = function(){
        ///iniciamos la tabla
          myTablaServicios = $("#TablaHistorialCliente").DataTable({
              "ajax": { "method" : "POST", "url" : "includes/clientes/listarClientes.php"},
              "columns":[
                    {"data" : "nombre"},
                    {"data" : "apellido"},
                    {"data" : "pais"},
                    {"data" : "correo"},
                    {"data" : "telefono"},
                    {"data" : "botones"}
              ]

          });

         // obtener_data_table("#TablaHistorialCliente tbody", myTablaServicios);
      }

        /*var obtener_data_table = function(tbody, table){
        $(tbody).on("click", "#btnModificar", function(){
            var data = table.row( $(this).parents("tr") ).data();

            var idReservacion = $("#idReservacion").val(data.idReservacion);
            var numReservacion = $("#numReservacion").val(data.numReservacion);
            var tipoHabitacion = $("#tipoHabitacion").val(data.tipoHabitacion);
            var nombre = $("#nombre").val(data.nombre);
            var apellido = $("#apellido").val(data.apellido);
            var estatusPago = $("#estatusPago").val(data.estatusPago);
            var fechaReserva = $("#fechaReserva").val(data.fechaReserva);
            var fechaLlegada = $("#fechaLlegada").val(data.fechaLlegada);
            var fechaSalida = $("#fechaSalida").val(data.fechaSalida);
            var numHabitaciones = $("#numHabitaciones").val(data.numHabitaciones);
            var numPersonas = $("#numPersonas").val(data.numPersonas);
            var estatusReserva = $("#estatusReserva").val(data.estatusReserva);
            
            DeshabilitarCampos();
            $('#formularioModal').modal('show');
        });
      }*/
      /*var obtener_data_table = function(idCliente){
          
            $(tbody).on("click", "#btnModificar", function(){
            
              alert(idCliente);  
              //DeshabilitarCampos();
              $('#formularioModal').modal('show');
        });
      }*/

      function ConsultarCliente(idCliente){
        //alert(idCliente);
        window.location = 'http://localhost/SistemaHotelX/gerencia/listaDatosHistoricosPorCLiente.php?idCliente=' + idCliente;
        //
      }

       ////funciones extra////////

</script>