                    <div class="row">

                        <div class="col-md-5 col-sm-4">
                            <label for="nombre">Nombre(s)<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input id="nombre" name="nombre" type="text" class="form-control habilitar" placeholder="Nombre de la persona" required="required"/>
                            </div>  
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <label for="apellido">Apellidos(s):</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input id="apellido" name="apellido" type="text" class="form-control habilitar" placeholder="Apellidos de la persona"/>
                            </div>  
                        </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10 col-sm-8">
                          <label for="direccion">Dirección:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                            <input type="text" class="form-control habilitar" name="direccion" id="direccion" placeholder="Dirección"/>
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        

                        <div class="col-md-5 col-sm-4">
                          <label for="estadoOrigen">Estado:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                            <select id="estadoOrigen" name="estadoOrigen" class="form-control habilitar">
                            </select>
                          </div>
                        </div>

                        <div class="col-md-5 col-sm-4">
                          <label for="lugarOrigen">Ciudad:</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <input type="text" class="form-control habilitar" name="lugarOrigen" placeholder="Ciudad" id="lugarOrigen"/>
                          </div>
                        </div>

                      </div>
                    <br>

                    <div class="row">
                  <div class="col-md-5 col-sm-4">
                      <label for="correo">Correo<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                      <div class="input-group form-group">
                          <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                          <input id="correo" name="correo" type="email" class="form-control habilitar" placeholder="correo@correo.com" required="required">
                      </div>  
                  </div>
                  <div class="col-md-5 col-sm-5">
                    <label for="telefono">Teléfono:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                      <input type="number" class="form-control habilitar" name="telefono" placeholder="Tel. 01 800.." id="telefono" onKeyPress="if(this.value.length==10) return false;" >
                    </div>
                  </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-5 col-sm-5">
                  <label for="password">Contraseña<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                  <div class="input-group form-group">
                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input type="password" class="form-control habilitar" name="password" id="password" placeholder="Tu contraseña" required="required" onKeyPress="if(this.value.length==10) return false;" >
                  </div>
                </div>
                <div class="col-md-5 col-sm-5">
                  <div class="form-group">
                    <label for="confirma">Confirmar contraseña<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
                    <div class="input-group form-group">
                      <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                      <input type="password" class="form-control habilitar" name="confirma" id="confirma" placeholder="Confirmación" required="required" onKeyPress="if(this.value.length==10) return false;">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6 col-sm-6">
                <label for="puestos_trabajo_idPuestoTrabajo">Puesto:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                  <select id="puestos_trabajo_idPuestoTrabajo" name="puestos_trabajo_idPuestoTrabajo" class="form-control form-control-sm habilitar">
                  </select>
                </div>
              </div>
            </div>