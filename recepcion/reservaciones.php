<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

  <link rel="stylesheet" href="css/datatables.css">
  <link rel="stylesheet" href="css/responsive.dataTables.css">
<body>
  
  <?php include('includes/navbar_r.php'); ?>

    <!-- inicio container -->
    <section class="container">

      <div class="panel panel-success">

        <div class="panel-heading"> <!--titulo-->
          <h3><b>Reservaciones</b></h3>
        </div>

        <ul class="nav nav-tabs"> <!--Menu-->
                          <li class="active"><a data-toggle="tab" href="#SectionInicio">Inicio</a></li>
                          <li><a data-toggle="tab" href="#SectionServicios">Servicios</a></li>
                          <li><a data-toggle="tab" href="#SectionPrecioCuartos">Precio de cuartos</a></li>
                      </ul> <!--fín principal-->

                  <!--Tablas secciones-->
                  <div class="tab-content">
                  
                      <!--Seccion de reservas-->
                      <div id="SectionInicio" class="tab-pane fade in active">
                          <!--empieza row-->
                         <div class="row">
                              <br>
                              <!--Contenido-->
                              
                              <!--Fin contenido-->
                            
                         </div>
                         <!--termina row-->
                      </div>
                      <!--fin de seccion de reservas-->


                       <!-- ////////////////////////////////////////////////// -->
                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ///////////////Section Servicios////////////////// -->


                      <!--Seccion de activas src="../../Content/images/image-enterprise.png"-->
                      <div id="SectionServicios" class="tab-pane fade"> 
                          <br>
                          <input type="button" class="btn btn-success" value="Registrar Servicios" data-toggle="modal" data-target="#formularioModal">
                          <br>
                          <table id="TablaServicios" class="table display responsive nowrap" cellspacing="0" width="90%">
                              <thead>
                                <tr class="info">
                                  <th>#</th>
                                  <th>Servicio</th>
                                  <th>Precio</th>
                                  <th>Descripción</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                            </table>
                      </div>
                      <!--Fin d seccion de activas-->





                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ////////////////////////////////////////////////// -->
                      <!-- ///////////////Section Precio cuartos///////////// -->

                      <!--Seccion de canceladas-->
                      <div id="SectionPrecioCuartos" class="tab-pane fade">
                          <br>
                          <input type="button" class="btn btn-success" value="Registrar Precio de tipo habitacion" data-toggle="modal" data-target="#formularioModalHabitaciones">
                          <br>
                          <br>
                          <table id="TablaPrecioHabitacion" class="table display responsive nowrap" cellspacing="0" width="90%">
                            <thead>
                              <tr class="info">
                                <th>#</th>
                                <th>Servicio</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Acción</th>
                              </tr>
                            </thead>
                          </table>
                          
                      </div>
                      <!--Fin de seccion de canceladas-->


                  </div>
                  <!--Fin de tablas secciones-->
      </div>
     
    </section>
    <!--  fin container -->
    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->

    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->
    <!--Inicio modal-->
    <!--Inicio modal-->
    <!--Inicio modal-->
    <div id="formularioModalHabitaciones" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      
      <!--Inicio dialog modal-->
      <div class="modal-dialog" role="document">
      
        <!--Modal content e inicio de form-->
        <form id="myFormHabitaciones" class="modal-content panel-success" method="post" enctype="multipart/form-data">

          <!--Header-->
          <div class="modal-header panel-heading">
      <h5 class="modal-title">Registro de Precio de Habitaciones</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

          <!--Body-->
          <!--Body-->
          <!--Body-->
          <div class="modal-body panel-body">
              <div id="alertaErrorHabitaciones"></div>
              <?php include("includeForms/formPrecioHabitaciones.php"); ?>
          
          </div>
              <!--Body-->
          <!--Body-->
          <!--Body-->
          <!--Footer--> 
          <div class="modal-footer">
            <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar">
            <input id="btnGuardarHabitaciones" class="btn btn-success" type="button" value="Registrar">
            <input id="idPrecioHabitacion" name="idPrecioHabitacion" type="hidden"/>
          </div>
        </form>
        <!--termina Mmodal content-->

      </div>
      <!--fín dialog modal-->

    </div>
    <!--fin modal-->
    <!--fin modal-->
    <!--fin modal-->
    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->


    <!--Pie de página-->
    <?php include('includes/footer.php'); ?>

    <script src="js/datatables.js"></script>
    <script src="js/dataTables.responsive.js"></script>

    <script>
      
      $(document).ready(function(){

          $("#TablaServicios").DataTable();

      });

    </script>



    <script>
      var myTablaPrecioHabitacion;

      $(document).ready(function(){
          listarHabitaciones(); //llamo a mi tabla

          ///Método que valida los campos
          function ValidarCamposHabitaciones(){
            var descripcion = $("#descripción").val();
            var precio = $("#precioHabitacion").val();


            //1. validamos correo y 2. que este bien escrito
            if(descripcion == ""){ 
                imprimirMensaje('alert alert-danger', "","La descripción no puede ir vacía.");
                myFocus("descripcion");
                return false;
            } 

            if(descuento == ""){
                imprimirMensaje('alert alert-danger', "","El descuento no puede ir vacío.");
                myFocus("descuento");
                return false;
            }


            return true;
          }

         

          ////////////////////////////////
          //preparando datos para guardar
          ///////////////////////////////
          function PrepararDatos(){

            //validamos campos
            //si hay algo raro
            //retorna false y no sigue
              if(!ValidarCampos())
                return false;
          

            var atributo = $("#btnGuardarHabitaciones").val();
            var form = $('#myForm')[0];

            ///si entra hacemos nuevo registro
            if(atributo == "Registrar")
            {
              guardarDatos(new FormData(form), "includes/promocion/registrarPromocion.php", "Registrar");
            }//si no, entonces modificamos
            else{
              if($("#idEmpleado").val() !== "")
                guardarDatos(new FormData(form), "includes/promocion/modificarPromocion.php", "");
            }

          }

           /////////////////////////////////////////////////
           //////////////////////////////////////////////////
           //////////////////////////////////////////////////

          //funciones de botones
          document.getElementById('btnGuardarHabitaciones').addEventListener("click", PrepararDatos, false);

      });

      //método ajax que me permite guardar
           function guardarDatos(myData, myURL, funcion){
            $.ajax({
              url: myURL,
              method: "POST",
              data: myData,
              contentType:false,
              processData:false,
              success:function(response)
              {
               
                alert(response);
                
                if(funcion == "Registrar")
                  limpiarCampos();

               // if(funcion !== "Eliminar")
                  $("#formularioModal").modal('hide');
                
                tablaPromociones.ajax.reload();
              }
            });
           }

       ////////////////////////////////////
      ////////////////////////////////////
      //////////funciones tabla///////////
      ////////////////////////////////////
      var listar = function(){
        ///iniciamos la tabla
          myTablaPrecioHabitacion = $("#TablaPrecioHabitacion").DataTable({
              "ajax": { "method" : "POST", "url" : "includes/servicios/listarPrecioHabitaciones.php"},
              "columns":[
                    {"data" : "tipo"},
                    {"data" : "descripcion"},
                    {"data" : "precio"},
                    {"defaultContent" : '<input id="btnModificar" class="btn btn-success btn-sm" type="button" value="Modificar">'}
              ]
              
          });

          obtener_data_table("#TablaPrecioHabitacion tbody", myTablaPrecioHabitacion);
      }

        var obtener_data_table = function(tbody, table){
        $(tbody).on("click", "#btnModificar", function(){
            var data = table.row( $(this).parents("tr") ).data();
            
           /* var idPrecioHabitacion = $("#idPrecioHabitacion").val(data.idPrecioHabitacion);
            var idTipoHabitacion = $("#idTipoHabitacion").val(data.idTipoHabitacion);
            var precio = $("#precio").val(data.precio);
            var descripcion = $("#descripcion").val(data.descripcion);

            cambiarValueGuardar();
            $('#formularioModal').modal('show');*/
        });
      }

      /////////////////////////////////////////////////
      //////////////////////////////////////////////////
      //////////////////////////////////////////////////
       ///////////////////////////
      ///////////////////////////
      //Cambiar estado boton
      function  cambiarValueGuardar(){
        $("#btnGuardar").val("Modificar");
      }
      //limpiarCampos
      function limpiarCampos(){
          $("#myForm")[0].reset();
          $("#btnGuardar").val("Registrar");
          $(".myAlert").remove();
          //$("#formularioModal").modal('hide');
      }
      function myFocus(name){
          setTimeout(function(){ $("#" + name).focus(); }, 1000);    
      }
      /////////////////////////
      //impresión de mensajes
      function imprimirMensaje(clase, mensaje, mensaje2)
      {
        var result;

        result = '<div class="myAlert ' + clase + '" role="alert">';
        result += '<button type="button" class="close" data-dismiss="alert"></button>';
        result += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
        result += '<strong> '+ mensaje +' </strong>' + mensaje2 + '</div>';

        document.getElementById("alertaError").innerHTML = result;
      }

    </script>
</body>
</html>