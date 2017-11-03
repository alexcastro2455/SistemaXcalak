<div class="row">

    <div class="col-md-5 col-sm-4">
        <label for="numHabitacion">Número habitación:</label>
        <div id="numeroHab" class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>
            <input id="numHabitacionMuestra" type="text" name="numHabitacionMuestra" class="form-control form-control-sm" required="required" disabled="true">
            <input id="numHabitacion" type="hidden" name="numHabitacion">
        </div>
    </div>


</div>
<br>
<div class="row">
    <div class="col-md-5 col-sm-4">
      <label for="numCamas">Numero de camas:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
        <input type="number" class="form-control habilitar" name="numCamas" id="numCamas" placeholder="Numero camas" onKeyPress="if(this.value.length==10) return false;"/>
      </div>
    </div>
    <div class="col-md-5 col-sm-4">
      <label for="numPersonas">Número de personas:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
        <input type="number" class="form-control habilitar" name="numPersonas" placeholder="personas" id="numPersonas" onKeyPress="if(this.value.length==10) return false;"/>
      </div>
    </div>
</div>
<br>
<div class="row">
    
    <div class="col-md-5 col-sm-4">
      <label for="maxPersonasExtra">Personas extra:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
        <input type="number" class="form-control habilitar" name="maxPersonasExtra" id="maxPersonasExtra" placeholder="extras" onKeyPress="if(this.value.length==10) return false;">
      </div>
    </div>

    <div class="col-md-5 col-sm-4">
        <label for="tipo_habitacion_idTipoHabitacion">Tipo habitación<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
        <div id="tipoHab" class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-gear" aria-hidden="true"></i></span>
             <select id="tipo_habitacion_idTipoHabitacion" name="tipo_habitacion_idTipoHabitacion" class="form-control form-control-sm habilitar" required="required">
            </select>
        </div>
    </div>

</div>
<br>
<div class="row">
              
    <div class="col-md-5 col-sm-4">
        <label for="tipo_cama_idTipoCama">Tipo cama<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
        <div id="tipoCam" class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
             <select id="tipo_cama_idTipoCama" name="tipo_cama_idTipoCama" class="form-control form-control-sm habilitar" required="required">
            </select>
        </div>
    </div>

     <div class="col-md-5 col-sm-4">
        <label for="status_habitacion_idStatusHabitacion">Estatus habitación<i class="fa fa-asterisk colorRequired" aria-hidden="true"></i>:</label>
        <div id="statusHab" class="input-group form-group">
            <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
             <select id="status_habitacion_idStatusHabitacion" name="status_habitacion_idStatusHabitacion" class="form-control form-control-sm habilitar" required="required">
            </select>
        </div>
    </div>

</div>
<br>
<div class="col-xs-6">
        <div class="col-md-12">
          
              <!-- ////////// formulario ////////// -->
              <h4><p class="text-muted">Seleccione una foto</p></h4>

              <br>
            
              <center class="row">
               
                  <img  id="UploadImage" name="UploadImage" class="uploadImg"/>
                    
                  <div class="simplePadding15">
                    <input type="file" class="upload habilitar" id="rutaFoto" name="rutaFoto" accept="image/x-png,image/gif,image/jpeg" value="null"/>
                    <div >
                      <label for="rutaFoto" class="btn btn-primary"><strong>Foto del cuarto</strong><i class="fa fa-asterisk colorRequired" aria-hidden="true"></i></label>
                    </div>
                  </div>

                </center>

              <br>
              <!-- ////////// formulario ////////// -->
              <!-- <input type="button" name="" onclick="prueba();" value="algo"> -->
        </div>
      </div>
