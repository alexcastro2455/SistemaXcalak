<!-- inicio container -->
    <section class="container myPosition">

      <div class="panel panel-success">

                <div class="panel-heading"> <!--titulo-->
                  <h3><b>Administración de Promociones</b></h3>
                </div>



                  <!--Tablas secciones-->
                  <div class="tab-content">
                  
                      <!--Seccion de reservas-->
                      <div id="SectionDatosGenerales" class="tab-pane fade in active">
                          <!--empieza row-->
                         
                          <div class="col-md-12">
                             <h3><p class="text-primary">Bienvenido a la sección administrativa de promociones...</p></h3>
                          </div>
                          <br>
                         <div class="row">
                              
                              <!--Contenido-->
                              <div class="col-md-4 col-md-offset-1 col-sm-4">
                                  <img src="styles/images/price.png" class="img-rounded" alt="habitaciones" width="190" height="190">
                              </div>
                              <div class="col-md-7 col-sm-5">
                                  
                                  <!--Table info-->
                                  <table class="table">
                                    <thead>
                                      <th><h3><p class="text-muted"> En esta sección verá:</p></h3></th>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Agregar nuevas promociones</td>
                                      </tr>
                                      <tr>  
                                        <td>Modificar promociones</td>
                                      </tr>
                                      <tr>
                                        <td>Ver fechas de sus promociones</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <a class="btn btn-info btn-sm" data-toggle="tab" href="#SectionListado">Listado de todas promociones</a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <input class="btn btn-info btn-sm" type="button" name="" onclick="abrirModal();" value="Registrar nueva promoción" />
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                   <!--Fin Table info-->
                              </div>
                              <!--Fin contenido-->
                            
                         </div>
                         <!--termina row-->
                      </div>
                      <!--fin de seccion de reservas-->

                      <!--Seccion de activas src="../../Content/images/image-enterprise.png"-->
                      <div id="SectionListado" class="tab-pane fade"> 
                          <div class="row">
                              <div class="col-md-7">
                                <h3><p class="text-primary">Listado de promociones</p></h3>
                              </div>
                          </div>
                         <br>
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
                      </div>
                      <!--Fin d seccion de activas-->

                      <!--Seccion de canceladas-->
                      <div id="SectionDatosGenerales" class="tab-pane fade">
                          registros
                          
                      </div>
                      <!--Fin de seccion de canceladas-->


                  </div>
                  <!--Fin de tablas secciones-->

      </div>
     
    </section>
    <!--  fin container -->
    <!--  fin container -->
    <!--  fin container -->