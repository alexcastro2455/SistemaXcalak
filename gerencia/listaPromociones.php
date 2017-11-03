<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="libs/bootstrap-datepicker/css/bootstrap-datepicker.css">

<body>
  
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
                          <li class="breadcrumb-item"><a href="gpromocion.php">Inicio promociones</a></li>
                          <li class="class="breadcrumb-item active"">Lista de promociones</li>
                        </ol>
                      </h4>
                  </div>

                  <!-- //////// body /////// -->
                  <div class="panel-body">
                    
                      <!-- //////// contenido /////// -->

                          <!--Contenido-->
                          <table id="TablaPromociones" class="table display responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr class="info">
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha de terminación</th>
                                <th>Descuento</th>
                                <th>Función</th>
                              </tr>
                            </thead>
                          </table>
                          <!--Fin contenido-->
                  </div>
                  <!-- //////// contenido /////// -->

              </div>
              <!-- //////// body /////// -->

          </div>  
        <!-- ///////////////Mi contenido /////////////////// -->
        <!-- ///////////////Mi contenido /////////////////// -->


      </div>
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
          <h4 class="modal-title" id="exampleModalLabel">Datos de la promoción</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

              <!--Body-->
              <!--Body-->
              <!--Body-->
              <div class="modal-body panel-body">
                  <div id="alertaError"></div>
                  <?php include("includeForms/formPromociones/formUpdatePromociones.php"); ?>
              
              </div>
                  <!--Body-->
              <!--Body-->
              <!--Body-->
              <!--Footer--> 
              <div class="modal-footer">
                <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar" style="width: 200px">
                <input id="btnGuardar" class="btn btn-success pull-right" type="hidden" value="Modificar" style="width: 200px;">
                <input id="btnHabilitar" class="btn btn-success pull-right" type="button" value="Editar" style="width: 200px;">
                <input id="idPromocion" name="idPromocion" type="hidden">
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


        <!-- //////////////////////  //////////////////// -->
        <!--Mensaje de respuestas-->
        <div class="modal fade" id="ModalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div align="center" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>ALERTA DE MENSAJE</b></h4>
              </div>
              <div align="center" class="modal-body">
                <H5>¿DESEAS ELIMINAR EL REGISTRO?</H5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input id="btnEliminarModal" class="btn btn-danger" type="button" value="Eliminar"/>
              </div>
            </div>
          </div>
        </div>

    <!--Pie de página-->
    <?php include('includes/footer.php'); ?>

    <script src="styles/js/datatables.js"></script>
    <script src="styles/js/dataTables.responsive.js"></script>
    <script src="libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="styles/js/errorInputs.js"></script>

</body>
      <script>
  
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////Inicia document ready////////////////////
    $(document).ready(function (){
        listar();
        ///Método que valida los campos
          function ValidarCampos(){
            var nombre = $("#nombre").val();
            var descuento = $("#descuento").val();


            //1. validamos correo y 2. que este bien escrito
            if(nombre == ""){ 
                imprimirMensaje('alert alert-danger', "1","El nombre de la promoción no puede ir vacío.", "alertaError");
                //este método nos servira para marcar el campo que es obligatorio
                myFocus("nombre");
                //addMyClassError("groupName", "has-error");
                return false;
            }//else removeMyClass("nombre", "has-error");

            if(descuento == ""){
                imprimirMensaje('alert alert-danger', "1","El descuento no puede ir vacío.", "alertaError");
                myFocus("descuento");
                return false;
            }//else removeMyClass("descuento", "has-error")


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

            guardarDatos(new FormData(form), "includes/promocion/registrarPromocion.php", "Registrar");
            

          }

          function HabilitarCampos(){
            $(".habilitar").attr("disabled",false);
            $("#btnGuardar").attr("type", "button");
            $("#btnHabilitar").attr("type", "hidden");
          }

           /////////////////////////////////////////////////
           //////////////////////////////////////////////////
           //////////////////////////////////////////////////

          //funciones de botones
          document.getElementById('btnGuardar').addEventListener("click", PrepararDatos, false);
          document.getElementById('btnHabilitar').addEventListener("click", HabilitarCampos, false);
    });
    //////////////termina document ready///////////////////
    ///////////////////////////////////////////////////////


    ////////////////////////////////////
      ////////////////////////////////////
      //////////funciones tabla///////////
      ////////////////////////////////////
      var listar = function(){
        ///iniciamos la tabla
          tablaPromociones = $("#TablaPromociones").DataTable({
              "ajax": { "method" : "POST", "url" : "includes/promocion/listarPromociones.php"},
              "columns":[
                    {"data" : "nombre"},
                    {"data" : "descripcion"},
                    {"data" : "fechaInicial"},
                    {"data" : "fechaTermino"},
                    {"data" : "descuento"},
                    {"defaultContent" : '<a id="btnModificar" class="mytool iconPadding" data-original-title="Modificar"><i class="fa fa-eye"></i></a><a id="btnEliminar" class="mytool iconPadding"><i class="fa fa-trash-o"></i></a>'}
              ]
              
          });

          obtener_data_table("#TablaPromociones tbody", tablaPromociones);
          eliminarPromocion("#TablaPromociones tbody", tablaPromociones);
      }

        var obtener_data_table = function(tbody, table){
        $(tbody).on("click", "#btnModificar", function(){
            var data = table.row( $(this).parents("tr") ).data();
            
            var idPromocion = $("#idPromocion").val(data.idPromocion);
            var nombre = $("#nombre").val(data.nombre);
            var descripcion = $("#descripcion").val(data.descripcion);
            var fechaInicial = $("#fechaInicial").val(data.fechaInicial);
            var fechaTermino = $("#fechaTermino").val(data.fechaTermino);
            var descuento = $("#descuento").val(data.descuento);

            DeshabilitarCampos();
            abrirModal("formularioModal");
        });
      }

      ///eliminamos al empleado
      var eliminarPromocion = function(tbody, table){
         $(tbody).on("click", "#btnEliminar", function(){
            var data = table.row( $(this).parents("tr") ).data();
            
            $("#ModalConfirmacion").modal({
              backdrop: 'static',
              keyboard: false
            }).one('click', '#btnEliminarModal', function(e) {
              var idPromocion = data.idPromocion;

             var formData = new FormData();
             formData.append("idPromocion", idPromocion);

              //(myData, myURL, funcion)
              guardarDatos(formData, "includes/promocion/eliminarPromocion.php","eliminar");

              $("#ModalConfirmacion").modal('hide');
            });

        });
      }

    ////funciones extra////////
    //desabilitar
    function DeshabilitarCampos(){
          $(".habilitar").attr("disabled",true);
          $("#btnGuardar").attr("type", "hidden");
          $("#btnHabilitar").attr("type", "button");
    }


    ////fin funciones extra//////
    //limpiarCampos
      function limpiarCampos(){
          $("#myForm")[0].reset();
          $(".myAlert").remove();
          //$("#formularioModal").modal('hide');
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

      function abrirModal(nameModal){
        $("#" + nameModal).modal('show');
      }

      /////////////////////////
      //impresión de mensajes
      function imprimirMensaje(clase, tipoMensaje, mensaje, idContenedor)
      {
        var result;

        result = '<div class="myAlert ' + clase + '" role="alert">';

        if(tipoMensaje == "1")
          result += '<button type="button" class="close" data-dismiss="alert"></button>';
        
        result += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
        result += mensaje + '</div>';

        document.getElementById(idContenedor).innerHTML = result;
      }

      //funciones generales
      $('.bt-datepicker').datepicker({
        todayBtn: "linked",
        format: "yyyy/mm/dd",
        language: "es"
      });

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
                //Eliminado
                if(response === "0"){
                  imprimirMensaje('alert alert-success', "2", "¡Promoción eliminado correctamente!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                //Modificado
                else if(response === "1"){
                    $("#formularioModal").modal('hide');
                    imprimirMensaje('alert alert-success', "2", "¡Promoción actualizado correctamente!.", "alertConsulta");
                    abrirModal("ModalMensajes");
                }

                ///entrará si hubo un error
                else if(response === "2"){

                  if(funcion == "Modificar"){
                    $("#formularioModal").modal('hide');
                    imprimirMensaje('alert alert-success', "2", "¡Hubo un problema al momento de modificar!.", "alertConsulta");
                  }else 
                    imprimirMensaje('alert alert-success', "2", "¡Hubo un problema al momento de eliminar!.", "alertConsulta");

                  abrirModal("ModalMensajes");
                }

                tablaPromociones.ajax.reload();
              }
            });
           }
    //////Funciones ajax////////
    /////////////////////////////
    /////////////////////////////

</script>