<?php
	include("modelo/expediente.php");
    $registros = $bd->Consulta("select * from expediente");
?>
<h2>Registro de Usuario</h2>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Nuevo Usuario
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_usuario_externo" id="frm_usuario_externo" action="control/usuario_externo/insertar_usuario_externo.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
		<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre y Apellido</label>
				<div class="col-sm-5">
                    <input type="text" name="nombre" id="nombre" class="form-control required text" data-validate="required"  data-message-required="Escriba su nombre completo" placeholder='' auto_complete='off'/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="documento" class="col-sm-3 control-label">Carnet de Identidad</label>
				<div class="col-sm-5">
					<input type="text" name="documento" id="documento" class="form-control required text" data-validate="required"  data-message-required="Escriba su CI" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Direccion</label>
				<div class="col-sm-5">
					<input type="text" name="direccion" id="direccion" class="form-control required text" data-validate="required"  data-message-required="Escriba su Direccion de Domicilio" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="id_expediente" class="col-sm-3 control-label">Expediente</label>
				<div class="col-sm-5">
					<select name="id_expediente" id="id_expediente" class="form-control required select2">
						<option value="" selected>--SELECCIONE--</option>
						<?php
							while($registro = $bd->getFila($registros))
							{
								echo "<option value='$registro[id_expediente]'>$registro[codigo_catastral]</option>";
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
