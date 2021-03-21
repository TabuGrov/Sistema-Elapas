<h2>Crear Trabajador</h2>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Nuevo Trabajador
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_trabajador" id="frm_trabajador" action="control/trabajador/insertar_trabajador.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
		<div class="form-group">
				<label for="documento" class="col-sm-3 control-label">Documento</label>
				<div class="col-sm-5">
					<input type="text" name="documento" id="documento" class="form-control required text" data-validate="required"  data-message-required="Escriba su nombre completo" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombres y Apellidos</label>
				<div class="col-sm-5">
					<input type="text" name="nombre" id="nombre" class="form-control required text" data-validate="required"  data-message-required="Escriba su nombre completo" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="correo" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-5">
					<input type="text" name="correo" id="correo" class="form-control required text" data-validate="required"  data-message-required="Escriba el correo electronico" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Direccion</label>
				<div class="col-sm-5">
					<input type="text" name="direccion" id="direccion" class="form-control required text" data-validate="required"  data-message-required="Escriba su direccion" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="cargo" class="col-sm-3 control-label">Cargo</label>
				<div class="col-sm-5">
					<input type="text" name="cargo" id="cargo" class="form-control required text" data-validate="required"  data-message-required="Escriba su cargo" placeholder=''/></td>
				</div>
			</div>			<div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Unidad</label>
				<div class="col-sm-5">
					<input type="text" name="unidad" id="unidad" class="form-control required text" data-validate="required"  data-message-required="Escriba su unidad" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="jefatura" class="col-sm-3 control-label">Jefatura</label>
					<div class="col-sm-5">
					<input type="text" name="jefatura" id="jefatura" class="form-control required text" data-validate="required"  data-message-required="Escriba su jefatura" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-info">Registrar</button> <button type="button" class="btn cancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
