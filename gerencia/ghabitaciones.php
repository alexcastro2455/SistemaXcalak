<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">
<link rel="stylesheet" href="styles/css/steps.css">


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

          <div class="container" style="margin-top:100px;">
            
            <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                    <h3><b>Administración de Habitaciones</b></h3>
                </div>

                <!-- //////// body /////// -->
                <div class="panel-body">
                  
                    <!-- //////// contenido /////// -->

                    <div class="col-md-12">
                        <h3><p class="text-primary">Bienvenido a la sección administrativa de habitaciones.</p></h3>
                    </div>
                    <br>
                   <div class="row">
                        
                        <!--Contenido-->
                        <div class="col-md-4 col-md-offset-1 col-sm-4">
                            <img src="styles/images/suite2.jpg" class="img-rounded img-responsive" alt="habitaciones" width="310" height="200">
                        </div>
                        <div class="col-md-7 col-sm-5">
                            
                            <!--Table info-->
                        <table class="table">
                              <tbody>
                                <td>
                                    <h4>En esta sección podra llevar un control administrativo de las habitaciones con los que cuenta en el hotel. 
                                    Podrá agregar nuevos cuartos o modificar los cuartos que puedan sufrir algún cambio en su hotel. Igual si deshabilita un cuarto lo puede dar de baja o eliminarlo.</h4>
                                  </td>
                                <tr>
                                  <td>
                                    <a class="btn btn-info btn-sm myWidth20" href="listaHabitaciones.php">Listado de habitaciones</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <input class="btn btn-info btn-sm myWidth20" type="button" name="" onclick="abrirModal('formularioModal');" value="Registrar una nueva habitación" />
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
</div>
      <!-- ///////////////Mi contenido /////////////////// -->
      <!-- ///////////////Mi contenido /////////////////// -->

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
      <h3 class="modal-title" id="exampleModalLabel">Formulario de Habitaciones</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

          <!--Body-->
          <!--Body-->
          <!--Body-->
          <div class="modal-body panel-body">
              <div id="alertaError"></div>
              <?php include("includeForms/formHabitaciones/formGHabitacion.php"); ?>
          
          </div>
              <!--Body-->
          <!--Body-->
          <!--Body-->
          <!--Footer--> 
          <div class="modal-footer">
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
                activarTab("step-1", "myCircle1");
                marcarError("numeroHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione un numero de habitación.", "alertaError");
                myFocus("numHabitacion");
                return false;
            }else quitarError("numeroHab");

            //validamos foto
            if(foto == null){ 
                activarTab("step-2", "myCircle2");
                //marcarError("numeroHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione una foto.", "alertaError");
                //myFocus("numHabitacion");
                return false;
            }//else quitarError("numeroHab");

            //tipo de habitación
            if(tipo_habitacion_idTipoHabitacion == "null"){ 
                activarTab("step-3", "myCircle3");
                marcarError("tipoHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione un tipo de habitación.", "alertaError");
                myFocus("tipo_habitacion_idTipoHabitacion");
                return false;
            }else quitarError("tipoHab");

            //estatus habitación
            if(status_habitacion_idStatusHabitacion == "null"){
                activarTab("step-3", "myCircle3");
                marcarError("statusHab");
                imprimirMensaje('alert alert-danger', "1","Seleccione un estatus de habitación.", "alertaError");
                myFocus("status_habitacion_idStatusHabitacion");
                return false;
            } else quitarError("statusHab");

            if(tipo_cama_idTipoCama == "null"){
                activarTab("step-3", "myCircle3");
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

        
            myFormData.append('rutaFoto', $("#rutaFoto").prop('files')[0]);
              
            guardarDatos(myFormData, "includes/habitacion/registrarHabitacion.php", "Registrar");
            

          }

           /////////////////////////////////////////////////
           //////////////////////////////////////////////////
           //////////////////////////////////////////////////

          //funciones de botones
          document.getElementById('btnGuardar').addEventListener("click", PrepararDatos, false);
          //document.getElementById('btnModificar').addEventListener("click", consultarDatosID, false);
          //document.getElementById('btnEliminar').addEventListener("click", eliminarDatosID, false);

    });
    //////////////termina document ready///////////////////
    ///////////////////////////////////////////////////////


    ////funciones extra////////
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
          $("#btnGuardar").val("Registrar");
          activarTab("step-1", "myCircle1");
          $(".myAlert").remove();
          document.getElementById("serieNumero").disabled = false;
          $("#UploadImage").attr("src", null);
          $("#formularioModal").modal('hide');
      }
      //////te muestra la sección de tab del menu al que quieres accesar
      function activarTab(tab, circle){
          //$('.nav-tabs a[href="#' + tab + '"]').tab('show');
          $("#step-3").hide();
          $("#myCircle3").removeClass('btn-primary').addClass('btn-default');
          $("#" + circle).addClass('btn-primary');

          $("#" + tab).show();
      }
      function activarTab1(tab, circle){
          //$('.nav-tabs a[href="#' + tab + '"]').tab('show');
          $("#step-2").hide();
          $("#step-3").hide();
          $("#myCircle2").removeClass('btn-primary').addClass('btn-default');
          $("#myCircle3").removeClass('btn-primary').addClass('btn-default');
          $("#" + circle).addClass('btn-primary');

          $("#" + tab).show();
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


        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona estatus"; //pongo mensaje normal
        opt.value = null; //valor nulo
        myComboBox.appendChild(opt);rutaFoto

        //recorremos nuestro json para tomar los datos
        //este es una matriz
        for(var row in jsonPuestos){
            sub = jsonPuestos[row];
            for(var colum in sub){
          
              //alert(sub[colum]);
              if(sub["idStatusHabitacion"] !== "2"){
                opt = document.createElement("option");
                opt.textContent = sub["status"];
                opt.value = sub["idStatusHabitacion"];
              }
          
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
               
                
                //alert(response);
                ///entrará si la consulta tuvo éxtio
                if(response === "1"){
                  limpiarCampos();
                  imprimirMensaje('alert alert-success', "2","Habitación registrada correctamente!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                ///entrará si hubo un error
                else if(response === "2"){
                  imprimirMensaje('alert alert-danger', "2","¡Hubo un problema al momento de insertar!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }

                /*if(funcion == "Modificar"){
                  alert(response);
                 
                  $("#formularioModal").modal('hide');
                   pagination(1);
                }
                
                //tableEmpleados.ajax.reload();

                if(funcion == "Eliminar"){
                  //activarTab("SectionListado");
                  alert(response);
                   pagination(1);
                }*/
              }
              
            });
           }
    //////Funciones ajax////////
    /////////////////////////////
    /////////////////////////////

</script>