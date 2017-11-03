<style>
  body {
  font-family: 'Open Sans', sans-serif;
}

.colorWhite{
  color: white !important;
}

.thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}

  .heightBox{
    height: 150px;
    text-align: center;
  }

  .box{
    width: 30px;
    height: 30px;
  }

  .boxBig{
    width: 80px;
    height: 80px;
  }


  /*Disponible*/
  .estado1{
    background: #77dd77;
  }

  /*Ocupado*/
  .estado2{
    background: #a7afaf;
  }

  /*Limpieza*/
  .estado3{
    background: #70c9ef;
  }

  /*Mantenimiento*/
  .estado4{
    background: #ed7171;
  }

  /*Revisar*/
  .estado5{
    background: #FF7F50;
  }

</style>

<section class="container myPosition">

                <div class="row">
                <center>
                      <!-- Disponible -->
                      <div class="col-md-2">
                        <div class="row">
                          
                          <div class="col-md-2">
                            <div class="box estado1"></div>
                          </div>
                          
                          <div class="col-md-2">
                            <h4>Disponible</h4>
                          </div>
                        </div>  
                      </div>
                      
                      <!-- Ocupado -->
                      <div class="col-md-2">
                        <div class="row">
                          
                          <div class="col-md-2">
                            <div class="box estado2"></div>
                          </div>
                          
                          <div class="col-md-2">
                            <h4>Ocupado</h4>
                          </div>
                        </div>  
                      </div>
                      
                      <!-- Limpieza -->
                      <div class="col-md-2">
                        <div class="row">
                          
                          <div class="col-md-2">
                            <div class="box estado3"></div>
                          </div>
                          
                          <div class="col-md-2">
                            <h4>Limpieza</h4>
                          </div>
                        </div>  
                      </div>
                      
                      <!-- Mantenimiento -->
                      <div class="col-md-2">
                        <div class="row">
                          
                          <div class="col-md-2">
                            <div class="box estado4"></div>
                          </div>
                          
                          <div class="col-md-2">
                            <h4>Mantenimiento</h4>
                          </div>
                        </div>  
                      </div>

                      <!-- Revisar -->
                      <div class="col-md-2">
                        <div class="row">
                          
                          <div class="col-md-2">
                            <div class="box estado5"></div>
                          </div>
                          
                          <div class="col-md-2">
                            <h4>Revisar</h4>
                          </div>
                        </div>  
                      </div>

                </center>
                </div>

                <br>
                <!--Seccion de activas src="../../Content/images/image-enterprise.png"-->
               <!-- Empieza el listado de las habitaciones -->
                <div id="ListadoHabitaciones" class="affix-content"></div>

                    <!-- botones de listado -->
                <center>
                  <ul class="pagination" id="pagination"></ul>
                </center>
                <!--Fin d seccion de activas-->
     
    </section>
    <!--  fin container -->
    <!--  fin container -->
    <!--  fin container -->