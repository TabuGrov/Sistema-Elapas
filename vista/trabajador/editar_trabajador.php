<?php
	include("modelo/trabajador.php");
    
    $id = security($_GET[id]);
    $trabajador = new trabajador();
    $trabajador->get_trabajador($id);
    
?>
<h2>Editar Trabajador</h2>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Modificar Trabajador
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_trabajador" id="frm_trabajador" action="control/trabajador/editar_trabajador.php" method="post" role="form" class="validate_edit form-horizontal form-groups-bordered">
			<input type="hidden" name="id_trabajador" id="id_trabajador" value="<?php echo $trabajador->id_trabajador; ?>"/>
            
			<div class="form-group">
				<label for="documento" class="col-sm-3 control-label">Documento</label>
				<div class="col-sm-5">
					<input type="text" name="documento" id="documento" class="form-control required text"   value="<?php echo $trabajador->documento; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombres y Apellidos</label>
				<div class="col-sm-5">
					<input type="text" name="nombre" id="nombre" class="form-control required text"  value="<?php  echo $trabajador->nombre; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="correo" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-5">
					<input type="text" name="correo" id="correo" class="form-control required text" value="<?php echo $trabajador->correo; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Direccion</label>
				<div class="col-sm-5">
					<input type="text" name="direccion" id="direccion" class="form-control required text" value="<?php echo $trabajador->direccion; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="cargo" class="col-sm-3 control-label">Cargo</label>
				<div class="col-sm-5">
					<input type="text" name="cargo" id="cargo" class="form-control required text" value="<?php echo $trabajador->cargo; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="unidad" class="col-sm-3 control-label">Unidad</label>
				<div class="col-sm-5">
					<input type="text" name="unidad" id="unidad" class="form-control required text" value="<?php echo $trabajador->unidad; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="jefatura" class="col-sm-3 control-label">Jefatura</label>
				<div class="col-sm-5">
					<input type="text" name="jefatura" id="jefatura" class="form-control required text" value="<?php echo $trabajador->jefatura; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-info">Guardar</button> <button type="button" class="btn cancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
