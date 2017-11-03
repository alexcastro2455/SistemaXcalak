
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
                    <h3><b>Administración de Servicios</b></h3>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                    <!-- //////// contenido /////// -->

                    <div class="col-md-12">
                        <h3><p class="text-primary">Bienvenido a la sección administrativa de servicios.</p></h3>
                    </div>
                    <br>
                     <div class="row">
                          
                          <!--Contenido-->
                          <div class="col-md-4 col-md-offset-1 col-sm-4">
                              <img src="styles/images/servicios.png" class="img-rounded img-responsive" alt="habitaciones" width="200" height="200">
                          </div>
                          <div class="col-md-7 col-sm-5 affix-content">
                              
                              <!--Table info-->
                          <table class="table">
                                <tbody>
                                  <tr>
                                    En esta sección podra llevar la administración de los servicios con los que cuenta su hotel: podrá agregar servicios variados junto con el precio
                                    que llegase a costar el servicio, al igual podrá modificar los que ya tiene o simplemente quitar los servicios que ya no requiera el hotel.
                                  </tr>
                                  <tr>
                                    <td>
                                      <a class="btn btn-info btn-sm myWidth20" href="listaServicios.php">Listado de servicios</a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <input class="btn btn-info btn-sm myWidth20" type="button" name="" onclick="abrirModal('formularioModal');" value="Registrar nuevo servicio" />
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
                  <?php include("includeForms/formServicios/formGServicios.php"); ?>
              
              </div>
                  <!--Body-->
              <!--Body-->
              <!--Body-->
              <!--Footer--> 
              <div class="modal-footer">
                <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar">
                <input id="btnGuardar" class="btn btn-success nextBtn" type="button" value="Registrar">
                <input id="idServicio" name="idServicio" type="hidden">
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

        ///Método que valida los campos
          function ValidarCampos(){
            var nombre = $("#nombre").val();
            var precio = $("#precio").val();


            //1. validamos correo y 2. que este bien escrito
            if(nombre == ""){ 
                imprimirMensaje('alert alert-danger', "1","El nombre del servicio no puede ir vacío.", "alertaError");
                //este método nos servira para marcar el campo que es obligatorio
                myFocus("nombre");
                return false;
            }

            if(precio == ""){
                imprimirMensaje('alert alert-danger', "1","El precio no puede ir vacío.", "alertaError");
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

            guardarDatos(new FormData(form), "includes/servicios/registrarServicio.php", "Registrar");
            

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

      /////////////////////////
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
    ////fin funciones extra//////


    /////////////////////////////
    /////////////////////////////
    //////Llenado de combos////////

    //////Fin llenado de combos////////
    /////////////////////////////
    /////////////////////////////

    /////////////////////////////
    /////////////////////////////
    //////Funciones ajax////////
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