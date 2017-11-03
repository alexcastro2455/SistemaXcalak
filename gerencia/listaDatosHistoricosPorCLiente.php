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
                        <li class="breadcrumb-item"><a href="listaHistorialClientes.php">Lista historica de los clientes</a></li>
                        <li class="breadcrumb-item active">Datos historicos del cliente</li>
                      </ol>
                    </h4>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">

                    <div class="alert alert-warning">
                      <strong>Cliente: </strong> <div id="datosInformacion"></div>
                    </div>

                    <!--Contenido-->
                    <table id="TablaHistorialCliente" class="table display responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr class="info">
                          <th>Reservación</th>
                          <th>Fecha de reserva</th>
                          <th>Fecha llegada</th>
                          <th>Fecha salida</th>
                          <th>Número de cuartos</th>
                          <th>Función</th>
                        </tr>
                      </thead>
                    </table>
                    <!--Fin contenido-->

                    <input id="idCliente" type="hidden" name="idCliente" value="<?php echo $_GET['idCliente']; ?>">
                </div>
                <!-- //////// body /////// -->

              </div>

            </div>
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
      </div>
</div>

<!--Inicio modal-->
    <!--Inicio modal-->
    <!--Inicio modal-->
        <div id="formularioModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
          <!--Inicio dialog modal-->
          <div class="modal-dialog" role="document">
          
            <!--Modal content e inicio de form-->
            <form id="myForm" class="modal-content panel-success setup-content" method="post" enctype="multipart/form-data">

              <!--Header-->
              <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Datos del cliente</h4>
        </div>

              <!--Body-->
              <!--Body-->
              <!--Body-->
              <div class="modal-body panel-body">
                  <div id="alertaError"></div>
                  <?php include("includeForms/formClientes/formClientesHistoricos.php"); ?>
              
              </div>
                  <!--Body-->
              <!--Body-->
              <!--Body-->
              <!--Footer--> 
              <div class="modal-footer">
                <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cerrar" style="width: 200px">
                <input id="idReservacion" name="idReservacion" type="hidden">
              </div>
            </form>
            <!--termina Mmodal content-->

          </div>
          <!--fín dialog modal-->

        </div>
        <!--fin modal-->
        <!--fin modal-->
        <!--fin modal-->

<!--Pie de página-->
<?php include('includes/footer.php'); ?>

<script src="styles/js/datatables.js"></script>
<script src="styles/js/dataTables.responsive.js"></script>
</body>

<script>
    
    var myTablaHistorialCliente;  


    $(document).ready(function (){
        listar();
        ConsultarNombreCliente();
    });

    var listar = function(){
        
        var myFormData = new FormData();
        myFormData.append("idCliente", $("#idCliente").val());
        
        ///iniciamos la tabla
          myTablaServicios = $("#TablaHistorialCliente").DataTable({
              "ajax": { "method" : "POST", "url" : "includes/clientes/listarDatosCliente.php?idCliente=" + $("#idCliente").val()},
              "columns":[
                    {"data" : "numReservacion"},
                    {"data" : "fechaReserva"},
                    {"data" : "fechaLlegada"},
                    {"data" : "fechaSalida"},
                    {"data" : "numHabitaciones"},
                    {"data" : "botones"}
              ]

          });

         // obtener_data_table("#TablaHistorialCliente tbody", myTablaServicios);
      }


      function ConsultarCliente(idReservacion){
          ConsultaAjax("includes/clientes/ConsultaDatosReservacion.php?idReservacion=" + idReservacion, "", "LlenarForm");
      }

      function ConsultarNombreCliente(){
        ConsultaAjax("http://localhost/SistemaHotelX/gerencia/includes/clientes/consultaNombreCliente.php?idCliente=" + $("#idCliente").val(), "", "LlenarInfo")
      }

       ////funciones extra////////
    //desabilitar
    function DeshabilitarCampos(){
          $(".habilitar").attr("disabled",true);
    }

    function LlenarFormulario(data){
            $("#idReservacion").val(data["idReservacion"]);
            $("#numReservacion").val(data["numReservacion"]);
            $("#tipoHabitacion").val(data["tipoHabitacion"]);
            $("#nombre").val(data["nombre"]);
            $("#apellido").val(data["apellido"]);
            $("#estatusPago").val(data["estatusPago"]);
            $("#fechaReserva").val(data["fechaReserva"]);
            $("#fechaLlegada").val(data["fechaLlegada"]);
            $("#fechaSalida").val(data["fechaSalida"]);
            $("#numHabitaciones").val(data["numHabitaciones"]);
            $("#numPersonas").val(data["numPersonas"]);
            $("#estatusReserva").val(data["estatusReserva"]);


            DeshabilitarCampos();
            $('#formularioModal').modal('show');
    }

    function LlenarInformacion(data){
      result = "<p>" + data['nombreCli'] + " " + data['apellidoCli'] + "</p>";

      document.getElementById("datosInformacion").innerHTML = result;
    }

    /////////////////////////////
    /////////////////////////////
    //////Funciones ajax////////
    ///método ajax para consultar
      function ConsultaAjax(myURL, myData, funcion){
          $.ajax({
              method: "POST",
              url: myURL,
              data: myData,
              dataType: "json",
              processData: false,
              contentType: false,
              success: function(data){
                if(funcion == "LlenarForm")
                  LlenarFormulario(data);
                else if(funcion == "LlenarInfo")
                  LlenarInformacion(data);

              }
          });
      }

</script>