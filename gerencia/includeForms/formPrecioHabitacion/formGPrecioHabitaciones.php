<h4><p class="text-muted">Formulario para registrar un nuevo precio de tipo habitación.</p></h4>
<br>
<div class="row">
	<div class="col-md-5 col-sm-4">
		<label for="tipo_habitacion_idTipoHabitacion">Tipo habitación<i class="fa fa-snowflake-o colorRequired" aria-hidden="true"></i>:</label>
		<div class="input-group form-group">
			<span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
			 <select id="tipo_habitacion_idTipoHabitacion" name="tipo_habitacion_idTipoHabitacion" class="form-control form-control-sm" required="required">
            </select>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-5 col-sm-4">
		<label for="precioHabitacion">Precio<i class="fa fa-snowflake-o colorRequired" aria-hidden="true"></i>:</label>
		<div class="input-group form-group">
			<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
			<input id="precioHabitacion" name="precioHabitacion" type="number" step="0.01" class="form-control" placeholder="$00.00" required="required" onKeyPress="if(this.value.length==10) return false;"/>
		</div>
	</div>
</div>