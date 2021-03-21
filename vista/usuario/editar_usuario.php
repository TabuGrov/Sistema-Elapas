<?php
	include("modelo/usuario.php");
	$registros_nivel = $bd->Consulta("select * from rol");
    $id = security($_GET[id]);
    $usuario = new usuario();
    $usuario->get_usuario($id);
    
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
            
            <div class="form-group">
				<label for="usuario" class="col-sm-3 control-label">usuario</label>
				<div class="col-sm-5">
					<input type="text" name="usuario" id="usuario" class="form-control required text" value="<?php echo $usuario->cuenta; ?>" /></td>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Contrase&ntilde;a</label>
				<div class="col-sm-5">
					<input type="password" name="password" id="password" class="form-control"/></td>
				</div>
			</div>
			<?php ?>
			<div class="form-group">
				<label for="id_rol" class="col-sm-3 control-label">Nivel</label>
				<div class="col-sm-5">					
					<select name="id_rol" id="id_rol" class="form-control required select2">
						<option value="" selected>--SELECCIONE--</option>
						<?php
							while($registro_nivel = $bd->getFila($registros_nivel))
							{
								echo "<option value='$registro_nivel[id_rol]'>$registro_nivel[nombre]</option>";
							}
						?>   	
					</select>
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
