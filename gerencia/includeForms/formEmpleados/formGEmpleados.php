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
                    
                     <h4><p class="text-muted">Introduzca los datos generales del empleado.</p></h4>
                      <br>
                    <div class="row">

                        <div class="col-md-5 col-sm-4">
                            <label for="nombre">Nombre(s)<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre de la persona" required="required">
                            </div>  
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <label for="apellido">Apellidos(s):</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellidos de la persona">
                            </div>  
                        </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10 col-sm-8">
                          <label for="direccion">Dirección:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" />
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        

                        <div class="col-md-5 col-sm-4">
                          <label for="estadoOrigen">Estado:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <select id="estadoOrigen" name="estadoOrigen" class="form-control">
                            </select>
                          </div>
                        </div>

                        <div class="col-md-5 col-sm-4">
                          <label for="lugarOrigen">Ciudad:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lugarOrigen" placeholder="Ciudad" id="lugarOrigen" />
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
              <h4><p class="text-muted">Introduzca los datos de contacto del empleado</p></h4>
              <br>
              <div class="row">
                  <div class="col-md-5 col-sm-4">
                      <label for="correo">Correo<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                      <div class="input-group form-group">
                          <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                          <input id="correo" name="correo" type="email" class="form-control" placeholder="correo@correo.com" required="required">
                      </div>  
                  </div>
                  <div class="col-md-5 col-sm-5">
                    <label for="telefono">Teléfono:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                      <input type="number" class="form-control" name="telefono" placeholder="Tel. 01 800.." id="telefono" onKeyPress="if(this.value.length==10) return false;">
                    </div>
                  </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-5 col-sm-5">
                  <label for="password">Contraseña<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                  <div class="input-group form-group">
                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Tu contraseña" required="required" onKeyPress="if(this.value.length==10) return false;">
                  </div>
                </div>
                <div class="col-md-5 col-sm-5">
                  <div class="form-group">
                    <label for="confirma">Confirmar contraseña<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                    <div class="input-group form-group">
                      <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                      <input type="password" class="form-control" name="confirma" id="confirma" placeholder="Confirmación" required="required" onKeyPress="if(this.value.length==10) return false;">
                    </div>
                  </div>
                </div>
              </div>
              <!-- ////////// formulario ////////// -->
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
              <div class="col-md-6 col-sm-6">
                <label for="puestos_trabajo_idPuestoTrabajo">Puesto:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                  <select id="puestos_trabajo_idPuestoTrabajo" name="puestos_trabajo_idPuestoTrabajo" class="form-control form-control-sm">
                  </select>
                </div>
              </div>
            </div>
            <br>
            
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