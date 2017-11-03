<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">

<body>
  
<div class="row affix-row">
    <!-- //////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////// -->
    <!-- Mi menu -->
    <div class="col-xs-12 col-md-2 col-lg-2">
      <?php include('includes/menu.php'); ?>
    </div>
    <!-- longitud de mi segunda parte de la págia -->
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 affix-content">

          <div class="container" style="margin-top:100px;">
            
            <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                    <h3><b>Administración de precio por tipo de habitación</b></h3>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                    <!-- //////// contenido /////// -->

                        <div class="col-md-12">
                            <h3><p class="text-primary">Bienvenido a la sección administrativa de precio por tipo de habitación.</p></h3>
                        </div>
                        <br>
                       <div class="row">
                            
                            <!--Contenido-->
                            <div class="col-md-4 col-md-offset-1 col-sm-4">
                                <img src="styles/images/etiquetaprecio.jpg" class="img-rounded img-responsive" alt="habitaciones" width="290" height="150">
                            </div>
                            <div class="col-md-7 col-sm-5">
                                
                                <!--Table info-->
                              <table class="table">
                                  <tbody>
                                    <tr>
                                      En esta sección podra ingresar nuevos precios, así como también modificarlos o eliminar los precios por habitación
                                    </tr>
                                    <tr>
                                      <td>
                                        <a class="btn btn-info btn-sm myWidth20" href="listaPreciosHabitacion.php">Lista de precios tipo habitación</a>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <input class="btn btn-info btn-sm myWidth20" type="button" name="" onclick="abrirModal('formularioModal');" value="Registrar un nuevo precio" />
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
      </div>
      <!-- ///////////////Mi contenido /////////////////// -->
      <!-- ///////////////Mi contenido /////////////////// -->
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
                  <h5 class="modal-title" id="exampleModalLabel">Registro de Promociones</h5>
          
              </div>

              <!--Body-->
              <!--Body-->
              <!--Body-->
              <div class="modal-body panel-body">
                  <div id="alertaError"></div>
                  <?php include("includeForms/formPrecioHabitacion/formGPrecioHabitaciones.php"); ?>
              
              </div>
                  <!--Body-->
              <!--Body-->
              <!--Body-->
              <!--Footer--> 
              <div class="modal-footer">
                <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar">
                <input id="btnGuardar" class="btn btn-success nextBtn" type="button" value="Registrar">
                <input id="idPrecioHabitacion" name="idPrecioHabitacion" type="hidden">
              </div>
            </form>
            <!--termina Mmodal content-->

          </div>
          <!--fín dialog modal-->

        </div>
        <!--fin modal-->
        <!--fin modal-->
        <!--fin modal-->

        <!-- //////////////////////  //////////////////// -->
        <!--Mensaje de respuestas-->
            <div class="modal fade" id="ModalMensajes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div align="center" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><b>RESPUESTA</b></h4>
                  </div>
                  <div align="center" class="modal-body">
                    <div id="alertConsulta"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>

<!--Pie de página-->
    <?php include('includes/footer.php'); ?>

    <script src="styles/js/datatables.js"></script>
    <script src="styles/js/dataTables.responsive.js"></script>
    <script src="styles/js/errorInputs.js"></script>

  </body>

      <script>
  
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////Inicia document ready////////////////////
    $(document).ready(function (){

          ConsultaAjax("includes/habitacion/listTipoHabitacion.php", "","llenarTipoHab");

          ///Método que valida los campos
          function ValidarCampos(){
            var precioHabitacion = $("#precioHabitacion").val();
            var tipo_habitacion_idTipoHabitacion = $("#tipo_habitacion_idTipoHabitacion").val();


            //1. validamos correo y 2. que este bien escrito
            if(precioHabitacion == ""){ 
                imprimirMensaje('alert alert-danger', "1","El precio no puede ir vacío.", "alertaError");
                //este método nos servira para marcar el campo que es obligatorio
                myFocus("nombre");
                return false;
            }

            if(tipo_habitacion_idTipoHabitacion == "null"){
                imprimirMensaje('alert alert-danger', "1","Seleccione un tipo de habitación.", "alertaError");
                myFocus("precio");
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
          

            var atributo = $("#btnGuardar").val();
            var form = $('#myForm')[0];

            ///si entra hacemos nuevo registro
            guardarDatos(new FormData(form), "includes/precioHabitacion/registrarPrecioHabitacion.php", "Registrar");
           

          }

           /////////////////////////////////////////////////
           //////////////////////////////////////////////////
           //////////////////////////////////////////////////

          //funciones de botones
          document.getElementById('btnGuardar').addEventListener("click", PrepararDatos, false);

    });
    //////////////termina document ready///////////////////
    ///////////////////////////////////////////////////////


    ////funciones extra////////
    //limpiarCampos
      function limpiarCampos(){
          $("#myForm")[0].reset();
          $(".myAlert").remove();
          $("#formularioModal").modal('hide');
      }
      function myFocus(name){
          setTimeout(function(){ $("#" + name).focus(); }, 1000); 
      }
      function addMyClassError(myId, myClass){
        $("#" + myId).addClass(myClass);
      }
      function removeMyClass(name, myClass){
          $("#" + name).removeClass(myClass);
      }
      /////////abrir modal
      function abrirModal(nameModal){
        $("#" + nameModal).modal('show');
      }

      /////////////////////////
      //impresión de mensajes
      function imprimirMensaje(clase, tipoMensaje, mensaje, idContenedor)
      {
        var result;

        result = '<div class="myAlert ' + clase + '" role="alert">';

        if(tipoMensaje === "1")
          result += '<button type="button" class="close" data-dismiss="alert"></button>';
        
        result += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
        result += mensaje + '</div>';

        document.getElementById(idContenedor).innerHTML = result;
      }



    /////////////////////////////
    /////////////////////////////
    //////Llenado de combos////////
    ///dibujamos los options de mi select
      function llenarTipoHabitacion(jsonPuestos){
        var myComboBox = document.getElementById("tipo_habitacion_idTipoHabitacion");
         var opt;


        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona un tipo"; //pongo mensaje normal
        opt.value = null; //valor nulo
        myComboBox.appendChild(opt);

        //recorremos nuestro json para tomar los datos
        //este es una matriz
        for(var row in jsonPuestos){
            sub = jsonPuestos[row];
            for(var colum in sub){
          
              //alert(sub[colum]);
              opt = document.createElement("option");
              opt.textContent = sub["tipo"];
              opt.value = sub["idTipoHabitacion"];
              
          
            }
            myComboBox.appendChild(opt);
          }

      }///fin llenar tipo
    //////Fin llenado de combos////////
    /////////////////////////////
    /////////////////////////////

    /////////////////////////////
    /////////////////////////////
    //////Funciones ajax////////
    ///método ajax para consultar
      function ConsultaAjax(myURL, myData, funcion){
          $.ajax({
              url: myURL,
              method: "POST",
              data: myData,
              dataType: "json",
              success: function(data){
                if(funcion == "llenarTipoHab")
                  llenarTipoHabitacion(data);
              }
          });
      }

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
               
                ///entrará si la consulta tuvo éxtio
                if(response === "1"){
                  limpiarCampos();
                  imprimirMensaje('alert alert-success', "2","Precio habitación registrado correctamente!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                ///entrará si hubo un error
                else if(response === "2"){
                  imprimirMensaje('alert alert-danger', "2","¡Hubo un problema al momento de insertar!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                
              }
            });
           }
    //////Funciones ajax////////
    /////////////////////////////
    /////////////////////////////

</script>