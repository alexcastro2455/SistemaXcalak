<!-- ////////// container ////////// -->
<div class="container">

  <!-- ////////// stepwizard ////////// -->
  <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
          <a id="myCircle1" href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
          <p>Paso 1</p>
        </div>
        <div class="stepwizard-step">
          <a id="myCircle2" href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
          <p>Paso 2</p>
        </div>
        <div class="stepwizard-step">
          <a id="myCircle3" href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
          <p>paso 3</p>
        </div>
      </div>
  </div>
  <!-- ////////// stepwizard ////////// -->

  <!-- ////////// form ////////// -->
 
    <!-- ////////// step-1 ////////// -->
    <div class="row setup-content" id="step-1">
      

          <div class="col-xs-6">
                <div class="col-md-12">
                    
                     <h4><p class="text-muted">Introduzca los datos generales de la habitación.</p></h4>
                      <br>
                    <div class="row">

                        <div class="col-md-5 col-sm-4">
                            <label for="serieNumero">Elija una serie:</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                <select id="serieNumero" class="form-control form-control-sm" onclick="ConNumDisponible();">
                                    <option value="null">Seleccione una serie</option>
                                    <option value="100">101 - 110</option>
                                    <option value="200">201 - 210</option>
                                    <option value="300">301 - 310</option>
                                    <option value="400">401 - 410</option>
                                    <option value="500">501 - 510</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <label for="numHabitacion">Habitación disponible<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                            <div id="numeroHab" class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>
                                 <select id="numHabitacion" name="numHabitacion" class="form-control form-control-sm" required="required">
                                </select>
                            </div>
                        </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5 col-sm-4">
                          <label for="numCamas">Numero de camas:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="numCamas" id="numCamas" placeholder="Numero camas" onKeyPress="if(this.value.length==10) return false;"/>
                          </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                          <label for="numPersonas">Número de personas:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="numPersonas" placeholder="personas" id="numPersonas" onKeyPress="if(this.value.length==10) return false;"/>
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5 col-sm-4">
                          <label for="maxPersonasExtra">Personas extra:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="maxPersonasExtra" id="maxPersonasExtra" placeholder="extras" onKeyPress="if(this.value.length==10) return false;">
                          </div>
                        </div>
                      </div>

                    <br>
                    <div class="row">
                      
                      <div class="pull-right">
                        <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar" style="width: 100px;">
                        <input class="btn btn-success nextBtn" type="button" value="Siguiente" style="width: 100px;">
                      </div>

                    </div>
                <!-- ////////// formulario ////////// -->
                </div>
                
          </div>

    </div>
     <!-- ////////// step-1 ////////// -->


     <!-- ////////// step-2 ////////// -->
    <div class="row setup-content" id="step-2">
      
      <div class="col-xs-6">
        <div class="col-md-12">
          
              <!-- ////////// formulario ////////// -->
              <h4><p class="text-muted">Seleccione una foto</p></h4>

              <br>
            
              <center class="row">
               
                  <img  id="UploadImage" name="UploadImage" class="uploadImg"/>
                    
                  <div class="simplePadding15">
                    <input type="file" class="upload" id="rutaFoto" name="rutaFoto" accept="image/x-png,image/gif,image/jpeg" value="null"/>
                    <div >
                      <label for="rutaFoto" class="btn btn-primary"><strong>Foto del cuarto</strong><i class="fa fa-asterisk" style="color: red" aria-hidden="true"></i></label>
                    </div>
                  </div>

                </center>

              <br>
              <!-- ////////// formulario ////////// -->
              <!-- <input type="button" name="" onclick="prueba();" value="algo"> -->
              <div class="row">
                      
                <div class="pull-right">
                  <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar" style="width: 100px;">
                  <input class="btn btn-success nextBtn" type="button" value="Siguiente" style="width: 100px;">
                </div>

              </div>
        </div>
      </div>

    </div>
    <!-- ////////// step-2 ////////// -->

    <!-- ////////// step-3 ////////// --> 
    <div class="row setup-content" id="step-3">
      <div class="col-xs-6">
        <div class="col-md-12">
            
            <!-- ////////// formulario ////////// -->
            <h4><p class="text-muted">Introduzca los datos de su puesto de trabajo.</p></h4>
            <br>
            <div class="row">
              
                <div class="col-md-5 col-sm-4">
                    <label for="tipo_habitacion_idTipoHabitacion">Tipo habitación<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                    <div id="tipoHab" class="input-group form-group">
                        <span class="input-group-addon"><i class="fa fa-gear" aria-hidden="true"></i></span>
                         <select id="tipo_habitacion_idTipoHabitacion" name="tipo_habitacion_idTipoHabitacion" class="form-control form-control-sm" required="required">
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4">
                    <label for="tipo_cama_idTipoCama">Tipo cama<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                    <div id="tipoCam" class="input-group form-group">
                        <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
                         <select id="tipo_cama_idTipoCama" name="tipo_cama_idTipoCama" class="form-control form-control-sm" required="required">
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                
                <div class="col-md-5 col-sm-4">
                    <label for="status_habitacion_idStatusHabitacion">Estatus habitación<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                    <div id="statusHab" class="input-group form-group">
                        <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
                         <select id="status_habitacion_idStatusHabitacion" name="status_habitacion_idStatusHabitacion" class="form-control form-control-sm" required="required">
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                      
                <div class="pull-right">
                  <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar" style="width: 100px;">
                  <input id="btnGuardar" class="btn btn-success pull-right" type="button" value="Registrar" style="width: 100px;">
                </div>

              </div>
            <!-- ////////// formulario ////////// -->

        </div>
      </div>
    </div>
    <!-- ////////// step-3 ////////// -->
 
  <!-- ////////// form ////////// -->
  
</div>
<!-- ////////// container ////////// -->