<?php
	include("modelo/usuario_externo.php");
    
    $id = security($_SESSION[id_usuario_ex]);
    $usuario_externo = new usuario_externo();
    $usuario_externo->get_usuario_externo($id);
    
?>
<h2>Editar Usuario</h2>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Modificar Usuario
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_usuario_externo" id="frm_usuario_externo" action="control/usuario_externo/editar_usuario_externo.php" method="post" role="form" class="validate_edit form-horizontal form-groups-bordered">
			<input type="hidden" name="id_usuario_ex" id="id_usuario_ex" value="<?php echo $usuario_externo->id_usuario_ex; ?>"/>
			<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre de usuario</label>
				<div class="col-sm-5">
					<input type="text" name="nombre" id="nombre" class="form-control required text" value="<?php echo $usuario_externo->nombre; ?>" readonly="true"/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="documento" class="col-sm-3 control-label">Documento</label>
				<div class="col-sm-5">
					<input type="password" name="documento" id="documento" class="form-control required text" value="<?php echo $usuario_externo->documento; ?>" readonly="true"/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Direccion</label>
				<div class="col-sm-5">
					<input type="password" name="direccion" id="direccion" class="form-control required text" value="<?php echo $usuario_externo->direccion; ?>" readonly="true"/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="id_expediente" class="col-sm-3 control-label">Identificador de Expediente</label>
				<div class="col-sm-5">
					<input type="text" name="id_expediente" id="id_expediente" class="form-control required text" value="<?php echo $usuario_externo->documento; ?>" readonly="true"/></td>
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
