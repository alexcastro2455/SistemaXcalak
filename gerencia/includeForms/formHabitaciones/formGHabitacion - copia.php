<!--Inicio modal-->
    <div id="formularioModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
        
        <!--Inicio dialog modal-->
        <div class="modal-dialog" role="document">
        
            <!--Modal content-->
            <form id="myForm" enctype="multipart/form-data" class="modal-content panel-success">

                <!--Header-->
                <div class="modal-header panel-heading">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de habitaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body panel-body">
                    <div id="alertaError">
                        
                    </div>
                    

                </div>
                <!--fin body-->

                <!--Footer-->   
                <div class="modal-footer">
                    <input class="btn btn-secondary" data-dismiss="modal" type="button" value="Cancelar">
                    <input id="btnGuardar" data-funcion="insertar" class="btn btn-success" type="button" value="Guardar">
                    <input id="accion" name="accion" value="agregar" type="hidden">
                    <input id="idHabitacion" type="hidden" name="" >
                </div>
            </form>
            <!--termina Mmodal content-->

        </div>
        <!--fín dialog modal-->

    </div>
    <!--fin modal-->