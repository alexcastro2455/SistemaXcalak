<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">

<style>
  
  body {
  font-family: 'Open Sans', sans-serif;
}

.thumbnail {
    
    padding: 0px;
    margin-bottom: 20px;
}

</style>
<body style="background-color: #f7f4f4;">
  
  <div class="row affix-row">
    <!-- //////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////// -->
    <!-- Mi menu -->
    <div class="col-xs-12 col-md-2 col-lg-2">
      <?php include('includes/menu.php'); ?>
    </div>
    
    <!-- longitud de mi segunda parte de la págia -->
    <div class="col-xs-12 col-sm-10 col-md-9 col-lg-10">
      
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
          <div class="container" style="margin-top:100px;">
            
            <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                    <h4>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="ghabitaciones.php">Inicio habitaciones</a></li>
                        <li class="class="breadcrumb-item active"">Lista de habitaciones</li>
                      </ol>
                    </h4>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                  
                    <!-- aquí va el listado -->
                    <section class="container myPosition">

                          <br>
                         <!-- Empieza el listado de las habitaciones -->
                         <div id="ListadoHabitaciones" class="affix-content"></div>

                          <!-- botones de listado -->
                         <center>
                            <ul class="pagination" id="pagination"></ul>
                        </center>
                        <br>
                         <!-- fin botones de listado -->
                         <!-- termina el listado de las habitaciones -->
                    </section>
                    <!-- termina el listado -->

                </div>
                <!-- //////// body /////// -->

              </div>

            </div>
          <!-- ///////////////Mi contenido /////////////////// -->
          <!-- ///////////////Mi contenido /////////////////// -->
      </div>
  </div>

<!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->
    <!-- ////////////////////////////////////////////////// -->
    <!--Inicio modal-->
    <!--Inicio modal-->
    <!--Inicio modal-->
    <div id="formularioModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      
      <!--Inicio dialog modal-->
      <div class="modal-dialog" role="document">
      
        <!--Modal content e inicio de form-->
        <form id="myForm" class="modal-content panel-success" method="post" enctype="multipart/form-data">

          <!--Header-->
          <div class="modal-header panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Formulario de Habitaciones</h4>
    </div>

          <!--Body-->
          <!--Body-->
          <!--Body-->
          <div class="modal-body panel-body">
              <div id="alertaError"></div>
              <?php include("includeForms/formHabitaciones/formUpdateHabitaciones.php"); ?>
          
          </div>
              <!--Body-->
          <!--Body-->
          <!--Body-->
          <!--Footer--> 
          <div class="modal-footer">
            <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar" style="width: 200px">
            <input id="btnGuardar" class="btn btn-success pull-right" type="hidden" value="Modificar" style="width: 200px;">
            <input id="btnHabilitar" class="btn btn-success pull-right" type="button" value="Editar" style="width: 200px;">
            <input id="idHabitacion" name="idEmpleado" type="hidden"/>
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
    <script src="styles/js/steps2.js"></script>
</body>

<script>
  
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////Inicia document ready////////////////////
    $(document).ready(function (){

          pagination(1); //llamo a mi tabla
          ConsultaAjax("includes/habitacion/listTipoHabitacion.php", "","llenarTipoHab");
          ConsultaAjax("includes/habitacion/estatusHabitacion.php", "", "llenarEstatus");
          ConsultaAjax("includes/habitacion/tipoCama.php", "", "LlenarCamas");
          

          ///Método que valida los campos
          function ValidarCampos(){
            
            var numHabitacion = $("#numHabitacion").val();
            var tipo_habitacion_idTipoHabitacion = $("#tipo_habitacion_idTipoHabitacion").val();
            var status_habitacion_idStatusHabitacion = $("#status_habitacion_idStatusHabitacion").val();
            var tipo_cama_idTipoCama = $("#tipo_cama_idTipoCama").val();
            var foto = $("#UploadImage").attr("src");

            //validamos número de habitación
            if(numHabitacion == "null" || numHabitacion == null){
                marcarError("numeroHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione un numero de habitación.", "alertaError");
                myFocus("numHabitacion");
                return false;
            }else quitarError("numeroHab");

            //validamos foto
            if(foto == null){ 
                //marcarError("numeroHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione una foto.", "alertaError");
                //myFocus("numHabitacion");
                return false;
            }//else quitarError("numeroHab");

            //tipo de habitación
            if(tipo_habitacion_idTipoHabitacion == "null"){
                marcarError("tipoHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione un tipo de habitación.", "alertaError");
                myFocus("tipo_habitacion_idTipoHabitacion");
                return false;
            }else quitarError("tipoHab");

            //estatus habitación
            if(status_habitacion_idStatusHabitacion == "null"){
                marcarError("statusHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione un estatus de habitación.", "alertaError");
                myFocus("status_habitacion_idStatusHabitacion");
                return false;
            } else quitarError("statusHab");

            if(tipo_cama_idTipoCama == "null"){
                marcarError("tipoCam");
                imprimirMensaje('alert alert-danger', "1","Seleccione un tipo de cama.", "alertaError");
                 myFocus("tipo_cama_idTipoCama");
                return false;
            }else quitarError("tipoCam");

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
          
            var form = $('#myForm')[0];
            var myFormData = new FormData(form);
              

            var idHab = $("#idHabitacion").val();
            if(idHab !== ""){

                if($("#rutaFoto").val() !== ""){
                    var formImage = new FormData();
                    formImage.append("idHabitacion", idHab);
                    formImage.append("rutaFoto", $("#rutaFoto").prop('files')[0]);
                    
                    guardarDatos(formImage, "includes/habitacion/modificarFotoHabitacion.php", "");
                }

              myFormData.append('idHabitacion', idHab);
              guardarDatos(myFormData, "includes/habitacion/modificarHabitacion.php", "Modificar");
            }

          }

          function HabilitarCampos(){
            $(".habilitar").attr("disabled",false);
            $("#btnGuardar").attr("type", "button");
            $("#btnHabilitar").attr("type", "hidden");

            //si el estatus de la habitación es ocupado no se puede modificar y aparecera sin modificar
            if($("#status_habitacion_idStatusHabitacion").val() == 2)
              $("#status_habitacion_idStatusHabitacion").attr("disabled",true);
            
          }

           /////////////////////////////////////////////////
           //////////////////////////////////////////////////
           //////////////////////////////////////////////////

          //funciones de botones
          document.getElementById('btnGuardar').addEventListener("click", PrepararDatos, false);
          document.getElementById('btnHabilitar').addEventListener("click", HabilitarCampos, false);
          //document.getElementById('btnModificar').addEventListener("click", consultarDatosID, false);
          //document.getElementById('btnEliminar').addEventListener("click", eliminarDatosID, false);

    });
    //////////////termina document ready///////////////////
    ///////////////////////////////////////////////////////


    ///////////////////////////////////////////////////////
    ///función que enta como onclick en el boton de modificar del cuarto
     var ModificarHab = function(idHabitacion){
          limpiarCampos();
          var formID = new FormData();
          formID.append("idHabitacion", idHabitacion);

          ///enviamos una petición ajax para que nos consulte la información de la habitación seleccionada
          ConsultaAjax("includes/habitacion/consultarHabitacion.php", formID, "LlenarForm");
          $('#formularioModal').modal('show');
      }

       ///función que enta como onclick en el boton de eliminar del cuarto
      var EliminarHab = function(idHabitacion){

           $("#ModalConfirmacion").modal({
              backdrop: 'static',
              keyboard: false
            }).one('click', '#btnEliminarModal', function(e) {
              var formID = new FormData();
              formID.append("idHabitacion", idHabitacion);

              guardarDatos(formID, "includes/habitacion/eliminarHabitacion.php", "Eliminar");

              $("#ModalConfirmacion").modal('hide');
            });

          //$('#formularioModal').modal('show');
      }

    ////////////////////////////////////////////////////////


    ////funciones extra////////
    //desabilitar
    function DeshabilitarCampos(){
          $(".habilitar").attr("disabled",true);
          $("#btnGuardar").attr("type", "hidden");
          $("#btnHabilitar").attr("type", "button");
    }
    ////Subir imagen
     $("#rutaFoto").on('change', function () {

          var reader = new FileReader();
          if (this.files && (fileImg = this.files[0])) {

              reader.onload = function (e) {
                  $("#UploadImage").attr("src", e.target.result);
                  //alert(fileImg.name + " " + fileImg.size);
              }

              reader.readAsDataURL(fileImg);
          }

      });

    //limpiarCampos
      function limpiarCampos(){
          $("#myForm")[0].reset();
          $(".myAlert").remove();
          $("#UploadImage").attr("src", null);
      }
      function marcarError(id){
        $("#" + id).addClass("has-error");
      }
      function quitarError(id){
        $("#" + id).removeClass("has-error");
      }
      ///////da el efecto de focus
      function myFocus(name){
          setTimeout(function(){ $("#" + name).focus(); }, 1000);    
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

    ///consultamos los números disponibles
      function ConNumDisponible(){
          var tipoNumeroSerieInicial = document.getElementById("serieNumero").value;
          var NumeroFinal = 0;

          if(tipoNumeroSerieInicial == "null")
            return;

          if(tipoNumeroSerieInicial == 100)
            NumeroFinal = 110;
          if(tipoNumeroSerieInicial == 200)
            NumeroFinal = 210;
          if(tipoNumeroSerieInicial == 300)
            NumeroFinal = 310;
          if(tipoNumeroSerieInicial == 400)
            NumeroFinal = 410;
          if(tipoNumeroSerieInicial == 500)
            NumeroFinal = 510;

          var formData = new FormData();

          formData.append("numInicial", tipoNumeroSerieInicial);
          formData.append("numFinal", NumeroFinal);
          
          ConsultaAjax("includes/habitacion/ultimoNumeroHabitacion.php", formData,"listarNum");
        //ConsultaAjax("includes/habitacion/tipoCama.php", "", "LlenarCamas");
      }
    ////fin funciones extra//////


    /////////////////////////////
    /////////////////////////////
    //////Llenado de combos////////

    ///llenamos los datos del formulario de habitacíones
    function LlenarFormulario(data){
          $("#idHabitacion").val(data["idHabitacion"]);
          $("#numCamas").val(data["numCamas"]);
          $("#numPersonas").val(data["numPersonas"]);
          $("#maxPersonasExtra").val(data["maxPersonasExtra"]);
          $("#numHabitacionMuestra").val(data["numHabitacion"]);
          $("#numHabitacion").val(data["numHabitacion"]);
          //$("#rutaFoto").val("data:image/jpg;base64," + data["rutaFoto"]);
          if(data["rutaFoto"] !== "")
            $("#UploadImage").attr("src", "data:image/jpg;base64," + data["rutaFoto"]);
          $("#tipo_habitacion_idTipoHabitacion").val(data["tipo_habitacion_idTipoHabitacion"]);
          $("#status_habitacion_idStatusHabitacion").val(data["status_habitacion_idStatusHabitacion"]);
          $("#tipo_cama_idTipoCama").val(data["tipo_cama_idTipoCama"]);

          DeshabilitarCampos();
      }


    function listarNumCuartos(data){
        var numeroCombo = 0;
        var myComboBox = document.getElementById("numHabitacion");
        var opt;
        //último número es el último número de cuarto registrado
        //número base es el número final de numero por habitación X10: 110, 210, 310
        var numInicial = data["ultimoNumero"], numFinal = data["numeroBase"];
        
        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona número"; //pongo mensaje normal
        opt.value = null; //valor nulo
        myComboBox.appendChild(opt);

        //alert(numInicial + " " + numFinal);

        for(var x = numInicial; x < numFinal; x++){
            
            numeroCombo = parseInt(x) + 1;
            opt = document.createElement("option");
            opt.textContent = numeroCombo;
            opt.value = numeroCombo;
            myComboBox.appendChild(opt);

        }
    }
    //////fin de las funciones para consultar último número disponible de habitación

    ///dibujamos los options de mi select
      function llenarTipoCama(jsonPuestos){
        var myComboBox = document.getElementById("tipo_cama_idTipoCama");
         var opt;


        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona cama"; //pongo mensaje normal
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
              opt.value = sub["idTipoCama"];  
            }
            myComboBox.appendChild(opt);
          }

      }///fin método

    ///dibujamos los options de mi select
      function llenarTipoHabitacion(jsonPuestos){
        var myComboBox = document.getElementById("tipo_habitacion_idTipoHabitacion");
         var opt;


        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona tipo"; //pongo mensaje normal
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

      }///fin llenarPuestos

      ///dibujamos los options de mi select
      function llenarEstatusHabitacion(jsonPuestos){
        var myComboBox = document.getElementById("status_habitacion_idStatusHabitacion");
         var opt;
      
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
      

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona estatus"; //pongo mensaje normal
        opt.value = null; //valor nulo
        myComboBox.appendChild(opt);

        //recorremos nuestro json para tomar los datos
        //este es una matriz
        for(var row in jsonPuestos){
            sub = jsonPuestos[row];
            for(var colum in sub){
          
              //alert(sub[colum]);
              opt = document.createElement("option");
              opt.textContent = sub["status"];
              opt.value = sub["idStatusHabitacion"];
              
          
            }
            myComboBox.appendChild(opt);
          }

      }///fin llenarPuestos
    //////Fin llenado de combos////////
    /////////////////////////////
    /////////////////////////////

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
                if(funcion == "llenarTipoHab")
                  llenarTipoHabitacion(data);

                else if(funcion == "LlenarCamas")
                  llenarTipoCama(data);

                else if(funcion == "listarNum")
                  listarNumCuartos(data);

                else if(funcion == "llenarEstatus")
                  llenarEstatusHabitacion(data);

                else if(funcion == "LlenarForm")
                  LlenarFormulario(data);

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
                //Eliminado
                if(response === "0"){
                  imprimirMensaje('alert alert-success', "2", "¡Habitación eliminado correctamente!", "alertConsulta");
                  abrirModal("ModalMensajes");
                  pagination(1);
                }
                //Modificado
                else if(response === "1"){
                    $("#formularioModal").modal('hide');
                    imprimirMensaje('alert alert-success', "2", "¡Habitación modificado correctamente!.", "alertConsulta");
                    abrirModal("ModalMensajes");
                    pagination(1);
                }

                ///entrará si hubo un error
                else if(response === "2"){
                  
                  if(funcion == "Modificar"){
                    $("#formularioModal").modal('hide');
                    imprimirMensaje('alert alert-success', "2", "¡Hubo un problema al momento de modificar!.", "alertConsulta");
                  }else 
                    imprimirMensaje('alert alert-success', "2", "¡Hubo un problema al momento de eliminar!", "alertConsulta");

                  abrirModal("ModalMensajes");
                }
                
                //tableEmpleados.ajax.reload();
              }
              
            });
           }


           function pagination(partida){
            
            $.ajax({
              method: 'POST',
              url: 'includes/habitacion/paginationHabitaciones.php',
              data:'partida='+partida,
              dataType: "json",
              success:function(data){
                    

                    $('#ListadoHabitaciones').html(data["inforHabitaciones"]);
                    $("#pagination").html(data["numeracion"]);
                   
                    
                
                
              }
            });
            return false;
           }
    //////Funciones ajax////////
    /////////////////////////////
    /////////////////////////////

</script>