<?php
	include("modelo/trabajador.php");
	include("modelo/rol.php");
    $registros = $bd->Consulta("select * from trabajador");
	$registros_nivel = $bd->Consulta("select * from rol")
?>
<h2>Crear Usuario</h2>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Nuevo Usuario
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_usuario" id="frm_usuario" action="control/usuario/insertar_usuario.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
		<div class="form-group">
				<label for="id_trabajador" class="col-sm-3 control-label">Trabajador</label>
				<div class="col-sm-5">
					<select name="id_trabajador" id="id_trabajador" class="form-control required select2">
						<option value="" selected>--SELECCIONE--</option>
						<?php
							while($registro = $bd->getFila($registros))
							{
								echo "<option value='$registro[id_trabajador]'>$registro[nombre]</option>";
							}
						?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="cuenta" class="col-sm-3 control-label">usuario</label>
				<div class="col-sm-5">
					<input type="text" name="usuario" id="usuario" class="form-control required text" data-validate="required"  data-message-required="Escriba el nombre de usuario" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Contrase&ntilde;a</label>
				<div class="col-sm-5">
					<input type="password" name="password" id="password" class="form-control required text" data-validate="required"  data-message-required="Escriba el password" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="nivel" class="col-sm-3 control-label">Nivel</label>
				<div class="col-sm-5">
					<select name="nivel" id="nivel" class="form-control required">
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
					<button type="submit" class="btn btn-info">Registrar</button> <button type="button" class="btn cancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
