<?php include('includes/session.php'); ?>
<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="styles/css/datatables.css">
<link rel="stylesheet" href="styles/css/responsive.dataTables.css">
<link rel="stylesheet" href="styles/css/steps.css">


<body>
  
  <div class="row">
    <!-- //////////////////////////////////////////////// -->
    <!-- //////////////////////////////////////////////// -->
    <!-- Mi menu -->
    <div class="">
      <?php include('includes/menu.php'); ?>
    </div>
    <!-- longitud de mi segunda parte de la págia -->
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 affix-content">

      <div class="container" style="margin-top:100px;">
        
        <div class="panel panel-success">

            <div class="panel-heading"> <!--titulo-->
                <h3><b>Administración de Empleados</b></h3>
            </div>

            <!-- //////// body /////// -->
            <div class="panel-body">
              
                <!-- //////// contenido /////// -->

                <div class="col-md-12">
                    <h3><p class="text-primary">Bienvenido a la sección administrativa de empleados.</p></h3>
                </div>
                <br>
               <div class="row">
                    

                    <br>
                    <!--Contenido-->
                    <div class="col-md-4 col-md-offset-1 col-sm-4">
                        <img src="styles/images/empleados.jpg" class="img-rounded img-responsive" alt="habitaciones" width="340" height="195">
                    </div>
                    <div class="col-md-7 col-sm-8 affix-content">
                        
                        <table class="table">
                          <tbody>
                            
                            <tr>
                              <td>
                                <h4  class="text-justify">En esta sección podra llevar la administración de los empleados que laboran en el hotel.
                                    Puede visualiar su información, registrar un nuevo empleado, modificar su información o darlo de baja.</h4>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <a class="btn btn-info btn-sm myWidth20" href="listaEmpleados.php">Lista de empleados</a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <input class="btn btn-info btn-sm myWidth20" type="button" onclick="abrirModal('formularioModal');" value="Registrar nuevo empleado" />
                              </td>
                            </tr>

                          </tbody>
                        </table>

                    </div>
                     <!--Fin Table info-->



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
            <h5 class="modal-title" id="exampleModalLabel">Registro de Empleados</h5>
          </div>

          <!--Body-->
          <!--Body-->
          <!--Body-->
          <div class="modal-body panel-body">
              <div id="alertaError"></div>
              <?php include("includeForms/formEmpleados/formGEmpleados.php"); ?>
          
          </div>
              <!--Body-->
          <!--Body-->
          <!--Body-->
          <!--Footer--> 
          <div class="modal-footer">
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

<!--Pie de página-->
    <?php include('includes/footer.php'); ?>
    <script src="styles/js/steps2.js"></script>
</body>


<script>
  
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////Inicia document ready////////////////////
    $(document).ready(function (){

        //consultas automaticas
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
                activarTab("step-1", "myCircle1");
                imprimirMensaje('alert alert-danger', "1","El nombre no puede ir vacío.", "alertaError");
                myFocus("nombre");
                return false;
            }

            //1. validamos correo y 2. que este bien escrito
            if(correo == ""){ 
                activarTab("step-2", "myCircle2");
                imprimirMensaje('alert alert-danger', "1","El correo no puede ir vacío, es necesario para su logueo.", "alertaError");
                myFocus("correo");
                return false;
            }else if (!(exp_email.test(correo))) {
                activarTab("step-2", "myCircle2");
                imprimirMensaje('alert alert-danger', "1","El correo no tiene un formato correcto myNombre@correo.com.", "alertaError");
                 myFocus("correo");
                return false;
            } 

            if(password == ""){
                activarTab("step-2", "myCircle2");
                imprimirMensaje('alert alert-danger', "1","El password no puede ir vacío.", "alertaError");
                myFocus("password");
                return false;
            }

            if(confirma == ""){
                activarTab("step-2", "myCircle2");
                imprimirMensaje('alert alert-danger', "1","La confirmación de password no puede ir vacío.", "alertaError");
                 myFocus("confirma");
                return false;
            }

            ///checamos que las contraseñas sean iguales
            if(password !== confirma)
            {
              activarTab("step-2", "myCircle2");
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

          guardarDatos(new FormData(form), "includes/empleados/registrarEmpleado.php", "Registrar");

        }

        //funciones de botones
        document.getElementById('btnGuardar').addEventListener("click", PrepararDatos, false);
    });
    //////////////termina document ready///////////////////
    ///////////////////////////////////////////////////////


    /////////////////////////////
    ////funciones extra////////
    //limpiarCampos
      function limpiarCampos(){
          $("#myForm")[0].reset();
          //$("#btnGuardar").val("Registrar");
          activarTab("step-1", "myCircle1");
          $(".myAlert").remove();
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

        if(tipoMensaje === "1")
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
                if(response === "1"){
                  limpiarCampos();
                  imprimirMensaje('alert alert-success', "2","¡Empleado registrado correctamente!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                ///entrará si hubo un error
                else if(response === "2"){
                  imprimirMensaje('alert alert-danger', "2","¡Hubo un problema al momento de insertar!.", "alertConsulta");
                  abrirModal("ModalMensajes");
                }
                ////entrará si tuvo un usuario répetido
                else if(response === "3"){
                  activarTab("step-2", "myCircle2");
                  myFocus("correo");
                  imprimirMensaje('alert alert-danger', "2","¡Ese correo ya existe, registre un correo diferente!", "alertConsulta");
                  abrirModal("ModalMensajes");
                }

                //if(funcion == "Registrar")
                 // limpiarCampos();

                /*if(funcion == "Modificar"){
                  activarTab("step-1", "myCircle1");
                  $("#formularioModal").modal('hide');
                }
                
                tableEmpleados.ajax.reload();

                if(funcion !== "Eliminar")
                activarTab("SectionListado");*/
              }
              
            });
           }
    //////Funciones ajax////////
    /////////////////////////////
    /////////////////////////////

</script>