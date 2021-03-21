<?php
	include("modelo/usuario_externo.php");
	include("modelo/caja.php");
    $registros = $bd->Consulta("select * from usuario_externo");
	$registros_caja = $bd->Consulta("select * from caja")
?>
<h2>Crear Caja</h2>
<br />
<?php ?>
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Nueva Caja
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_caja" id="frm_caja" action="control/caja_usuario/insertar_caja_usuario.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
			<div class="form-group">
				<label for="id_user_ex" class="col-sm-3 control-label">Usuario externo</label>
				<div class="col-sm-5">
				<select name="id_user_ex" id="id_user_ex" class="form-control required select2">
						<option value="" selected>--SELECCIONE--</option>
						<?php
							while($registro = $bd->getFila($registros))
							{
								echo "<option value='$registro[id_user_ex]'>$registro[nombre]</option>";
							}
						?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="id_caja" class="col-sm-3 control-label">Caja</label>
				<div class="col-sm-5">
				<select name="id_caja" id="id_caja" class="form-control required select2">
						<option value="" selected>--SELECCIONE--</option>
						<?php
							while($registro_caja = $bd->getFila($registros_caja))
							{
								echo "<option value='$registro_caja[id_caja]'>$registro_caja[codigo]</option>";
							}
						?>
						
					</select>
				</div>
			</div>
			<!-- <div class="form-group">
				<label for="fecha" class="col-sm-3 control-label">fecha</label>
				<div class="col-sm-5">
					<input type="date" name="fecha" id="fecha" class="form-control required text" data-validate="required"  data-message-required="Escriba el codigo" value="2018-07-22" placeholder=''/></td>
				</div>
			</div> -->
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-info">Registrar</button> <button type="button" class="btn cancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
