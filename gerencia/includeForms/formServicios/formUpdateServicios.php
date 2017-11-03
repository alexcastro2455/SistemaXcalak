<br>
<div class="row">
	<div class="col-md-5 col-sm-4">
		<label for="nombre">Nombre<i class="fa fa-snowflake-o" style="color: red" aria-hidden="true"></i>:</label>
		<div class="input-group form-group">
			<span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
			<input id="nombre" name="nombre" type="text" class="form-control habilitar" placeholder="Nombre de la promoción" required="required">
		</div>
	</div>
	<div class="col-md-5 col-sm-4">
		<label for="precio">Precio<i class="fa fa-snowflake-o" style="color: red" aria-hidden="true"></i>:</label>
		<div class="input-group form-group">
			<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
			<input id="precio" name="precio" type="number" step="0.01" class="form-control habilitar" placeholder="$00.00" required="required"/>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-8 col-sm-7">
		<label for="descripcion">Descripción:</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
			 <textarea id="descripcion" name="descripcion" rows="3" class="form-control habilitar" maxlength="80" placeholder="Describa la promoción..."></textarea>
		</div>
	</div>
</div>