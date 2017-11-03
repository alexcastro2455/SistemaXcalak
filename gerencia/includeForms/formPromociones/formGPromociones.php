<h4><p class="text-muted">Formulario para registrar una nueva promoción.</p></h4>
<br>
<div class="row">
	<div class="col-md-5 col-sm-4">
		<label for="nombre">Promoción<i class="fa fa-snowflake-o colorRequired"  aria-hidden="true"></i>:</label>
		<div class="input-group form-group">
			<span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
			<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre de la promoción" required="required">
		</div>
	</div>
	<div class="col-md-5 col-sm-4">
		<label for="descuento">Descuento<i class="fa fa-snowflake-o colorRequired" aria-hidden="true"></i>:</label>
		<div class="input-group form-group">
			<span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
			<input id="descuento" name="descuento" type="number" step="0.01" class="form-control" name="" placeholder="00.00%" required="required"/>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-8 col-sm-7">
		<label for="descripcion">Descripción:</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
			 <textarea id="descripcion" name="descripcion" rows="3" class="form-control" maxlength="80" placeholder="Describa la promoción..."></textarea>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-5 col-sm-5">
		<label for="direccion">Fecha Inicial:</label>
		<div class="input-group date bt-datepicker">
			<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
			<input id="fechaInicial" min=<?php //echo date('Y-m-d'); ?> type="text" class="form-control" name="fechaInicial" required="true">
		</div>
	</div>
	<div class="col-md-5 col-sm-5">
		<label for="lugarOrigen">Fecha Termino:</label>
		<div class="input-group date bt-datepicker">
			<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
			<input id="fechaTermino" min=<?php //echo date('Y-m-d'); ?> type="text" class="form-control" name="fechaTermino" required="true">
		</div>
	</div>
</div>