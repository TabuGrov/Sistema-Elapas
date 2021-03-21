<?php
	include("modelo/usuario_externo.php");
    
    $id = security($_GET[id]);
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
		<form name="frm_usuario" id="frm_usuario" action="control/usuario/editar_usuario.php" method="post" role="form" class="validate_edit form-horizontal form-groups-bordered">
			<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $usuario->id_usuario; ?>"/>
            <input type="hidden" name="nivel" id="nivel" value="<?php echo $usuario->nivel; ?>"/>
			<div class="form-group">
				<label for="cuenta" class="col-sm-3 control-label">Cuenta de usuario</label>
				<div class="col-sm-5">
					<input type="text" name="cuenta" id="cuenta" class="form-control required text" value="<?php echo $usuario->usuario; ?>" readonly="true"/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Contrase&ntilde;a</label>
				<div class="col-sm-5">
					<input type="password" name="password" id="password" class="form-control"/></td>
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
