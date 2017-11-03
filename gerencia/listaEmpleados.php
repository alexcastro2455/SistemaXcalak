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
      
            <div class="container" style="margin-top:100px;">
              
              <div class="panel panel-success">

                  <div class="panel-heading"> <!--titulo-->
                      <h4>
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="gempleados.php">Inicio empleados</a></li>
                          <li class="class="breadcrumb-item active"">Lista empleados</li>
                        </ol>
                      </h4>
                  </div>

                  <!-- //////// body /////// -->
                  <div class="panel-body">
                    
                      <!-- //////// contenido /////// -->

                         <table id="TablaEmpleados" class="table display responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr class="info">
                                  <th>Nombre</th>
                                  <th>Correo</th>
                                  <th>Tipo de empleado</th>
                                  <th>Dirección</th>
                                  <th>Estatus</th>
                                  <th>Función</th>
                                </tr>
                              </thead>
                          </table>

                      <!-- //////// contenido /////// -->

                  </div>
                  <!-- //////// body /////// -->

              </div>

            </div>
      </div>
            <!-- ///////////////Mi contenido /////////////////// -->
            <!-- ///////////////Mi contenido /////////////////// -->

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
      <h4><p class="text-muted">Datos del Empleado.</p></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

          <!--Body-->
          <!--Body-->
          <!--Body-->
          <div class="modal-body panel-body">
              <div id="alertaError"></div>
              <?php include("includeForms/formEmpleados/formUpdateGEmpleados.php"); ?>
          
          </div>
              <!--Body-->
          <!--Body-->
          <!--Body-->
          <!--Footer--> 
          <div class="modal-footer">
            <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar" style="width: 200px">
            <input id="btnGuardar" class="btn btn-success pull-right" type="hidden" value="Modificar" style="width: 200px;">
            <input id="btnHabilitar" class="btn btn-success pull-right" type="button" value="Editar" style="width: 200px;">
            <input id="idEmpleado" name="idEmpleado" type="hidden"/>
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
    <script src="styles/js/errorInputs.js"></script>
</body>

<script>
  

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
//////////////Inicia document ready////////////////////
$(document).ready(function (){

    listar(); //llamo a mi tabla
    ConsultaAjax("includes/empleados/listaPuestoTrabajos.php", "","llenarPuestos");
    ConsultaAjax("includes/empleados/consultarEstados.php", "","llenarEst");

    ///Método que valida los campos
          function ValidarCampos(){
            var exp_email = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var nombre = $("#nombre").val();
            var correo = $("#correo").val();
            var password = $("#password").val();
            var confirma = document.getElementById("confirma").value;

            if(nombre == ""){ 
                imprimirMensaje('alert alert-danger', "1","El nombre no puede ir vacío.", "alertaError");
                myFocus("nombre");
                return false;
            }

            //1. validamos correo y 2. que este bien escrito
            if(correo == ""){ 
                imprimirMensaje('alert alert-danger', "1","El correo no puede ir vacío, es necesario para su logueo.", "alertaError");
                myFocus("correo");
                return false;
            }else if (!(exp_email.test(correo))) {
                imprimirMensaje('alert alert-danger', "1","El correo no tiene un formato correcto myNombre@correo.com.", "alertaError");
                 myFocus("correo");
                return false;
            } 

            if(password == ""){
                imprimirMensaje('alert alert-danger', "1","El password no puede ir vacío.", "alertaError");
                myFocus("password");
                return false;
            }

            if(confirma == ""){
                imprimirMensaje('alert alert-danger', "1","La confirmación de password no puede ir vacío.", "alertaError");
                 myFocus("confirma");
                return false;
            }

            ///checamos que las contraseñas sean iguales
            if(password !== confirma)
            {
              imprimirMensaje('alert alert-danger', "1", "Las contraseñas no coincide.", "alertaError");
              myFocus("password");
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
        
          var form = $('#myForm')[0];

          if($("#idEmpleado").val() !== "")
                guardarDatos(new FormData(form), "includes/empleados/modificarEmpleados.php", "Modificar");

        }

        function HabilitarCampos(){
          $(".habilitar").attr("disabled",false);
          $("#btnGuardar").attr("type", "button");
          $("#btnHabilitar").attr("type", "hidden");
        }

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
          tableEmpleados = $("#TablaEmpleados").DataTable({
              "ajax": { "method" : "POST", "url" : "includes/empleados/listarEmpleados.php"},
              "columns":[
                    {"data" : "nombre"},
                    {"data" : "correo"},
                    {"data" : "puesto"},
                    {"data" : "direccion"},
                    {"data" : "status"},
                    {"defaultContent":'<a id="btnModificar" class="mytool iconPadding" data-original-title="Modificar"><i class="fa fa-eye"></i></a><a id="btnDarBaja" class="mytool iconPadding" data-original-title="Modificar"><i class="fa fa-caret-square-o-down"></i></a><a id="btnEliminar" class="mytool iconPadding"><i class="fa fa-trash-o"></i></a>'}  
                    
              ]
              
          });

          obtener_data_table("#TablaEmpleados tbody", tableEmpleados);
          darDeBaja("#TablaEmpleados tbody", tableEmpleados);
          eliminarEmpleado('#TablaEmpleados tbody', tableEmpleados);

      }

        var obtener_data_table = function(tbody, table){
        $(tbody).on("click", "#btnModificar", function(){
            var data = table.row( $(this).parents("tr") ).data();
            
            var idEmpleado = $("#idEmpleado").val(data.idEmpleado);
            var nombre = $("#nombre").val(data.nombre);
            var apellido = $("#apellido").val(data.apellido);
            var direccion = $("#direccion").val(data.direccion);
            var lugarOrigen = $("#lugarOrigen").val(data.lugarOrigen);
            var estadoOrigen = $("#estadoOrigen").val(data.estadoOrigen);
            var correo = $("#correo").val(data.correo);
            var telefono = $("#telefono").val(data.telefono);
            var password = $("#password").val(data.password);
            var confirma = $("#confirma").val(data.password);
            var tipo_usuario_idTipoUsuario = $("#tipo_usuario_idTipoUsuario").val(data.tipo_usuario_idTipoUsuario);
            var puestos_trabajo_idPuestoTrabajo = $("#puestos_trabajo_idPuestoTrabajo").val(data.puestos_trabajo_idPuestoTrabajo);

            DeshabilitarCampos();
            //$('#formularioModal').modal('show');
            abrirModal("formularioModal");
        });
      }

      ///cambiamos estatus del empledo
       var darDeBaja = function(tbody, table){
        $(tbody).on("click", "#btnDarBaja", function(){
            var data = table.row( $(this).parents("tr") ).data();
            
            var idEmpleado = data.idEmpleado;
            var status_empleado_idStatusEmpleado = data.status_empleado_idStatusEmpleado;

            if(status_empleado_idStatusEmpleado == 1)
              status_empleado_idStatusEmpleado = 2;
            else
              status_empleado_idStatusEmpleado = 1;

            var formData = new FormData();

            formData.append("idEmpleado", idEmpleado);
            formData.append("status_empleado_idStatusEmpleado", status_empleado_idStatusEmpleado);

            guardarDatos(formData, "includes/empleados/darBajaEmpleado.php", "Eliminar");
        });
      }

      ///eliminamos al empleado
      var eliminarEmpleado = function(tbody, table){
         $(tbody).on("click", "#btnEliminar", function(){
            var data = table.row( $(this).parents("tr") ).data();
            
            /*var Confir = confirm("\u00BFConfirma eliminar el empleado?");
            
            if(Confir !== true)
              return false;*/

            $("#ModalConfirmacion").modal({
              backdrop: 'static',
              keyboard: false
            }).one('click', '#btnEliminarModal', function(e) {
              var idEmpleado = data.idEmpleado;

              var formData = new FormData();
              formData.append("idEmpleado", idEmpleado);

              //(myData, myURL, funcion)
              guardarDatos(formData, "includes/empleados/eliminarEmpleado.php","eliminar");  

              $("#ModalConfirmacion").modal('hide');
            });

            /**/
        });
      }

      /////////////////////////////////////////////////
      //////////////////////////////////////////////////
      //////////////////////////////////////////////////

  /////////////////////////////
    ////funciones extra////////
    //desabilitar
    function DeshabilitarCampos(){
          $(".habilitar").attr("disabled",true);
          $("#btnGuardar").attr("type", "hidden");
          $("#btnHabilitar").attr("type", "button");
    }
    //limpiarCampos
      function limpiarCampos(){
          $("#myForm")[0].reset();
          //$("#btnGuardar").val("Registrar");
          $(".myAlert").remove();
          $("#formularioModal").modal('hide');
      }
      
      ///////da el efecto de focus
      function myFocus(name){
          setTimeout(function(){ $("#" + name).focus(); }, 1000);    
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

    ////fin funciones extra//////
    /////////////////////////////

    /////////////////////////////
    /////////////////////////////
    //////Llenado de combos////////
    ///dibujamos los options de mi select de "puestos_trabajo_idPuestoTrabajo"
      function llenarPuestoTrabajos(jsonPuestos){
        var myComboBox = document.getElementById("puestos_trabajo_idPuestoTrabajo");
         var opt;


        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona un puesto"; //pongo mensaje normal
        opt.value = null; //valor nulo
        myComboBox.appendChild(opt);

        //recorremos nuestro json para tomar los datos
        //este es una matriz
        for(var row in jsonPuestos){
            sub = jsonPuestos[row];
            for(var colum in sub){
          
              //alert(sub[colum]);
              opt = document.createElement("option");
              opt.textContent = sub["puesto"];
              opt.value = sub["idPuestoTrabajo"];
              
          
            }
            myComboBox.appendChild(opt);
          }

      }///fin llenarPuestos

      function llenarEstados(jsonPuestos){
        var myComboBox = document.getElementById("estadoOrigen");
         var opt;


        if(myComboBox.options.length > 0){ 
            if (myComboBox.options.length > 0)//limpiamos
                myComboBox.options.length = 0;
        }

        opt = document.createElement("option"); //creo la opción
        opt.textContent = "Selecciona un estado"; //pongo mensaje normal
        opt.value = null; //valor nulo
        myComboBox.appendChild(opt);

        //recorremos nuestro json para tomar los datos
        //este es una matriz
        for(var row in jsonPuestos){
            sub = jsonPuestos[row];
            for(var colum in sub){
          
              //alert(sub[colum]);
              opt = document.createElement("option");
              opt.textContent = sub["estadonombre"];
              opt.value = sub["estadonombre"];
              
          
            }
            myComboBox.appendChild(opt);
          }
      }
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
                if(funcion == "llenarPuestos")
                  llenarPuestoTrabajos(data);

                if(funcion == "llenarEst")
                  llenarEstados(data);
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
                  imprimirMensaje('alert alert-success', "2", "¡Empleado eliminado correctamente!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                //Modificado
                else if(response === "1"){
                    $("#formularioModal").modal('hide');
                    imprimirMensaje('alert alert-success', "2", "¡Empleado modificado correctamente!.", "alertConsulta");
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
                ////entrará si tuvo un usuario répetido
                else if(response === "3"){
                  activarTab("step-2", "myCircle2");
                  myFocus("correo");
                  imprimirMensaje('alert alert-danger', "2","¡Ese correo ya existe, registre un correo diferente!", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                
                tableEmpleados.ajax.reload();
              }
              
            });
           }
    //////Funciones ajax////////
    /////////////////////////////
    /////////////////////////////
</script>