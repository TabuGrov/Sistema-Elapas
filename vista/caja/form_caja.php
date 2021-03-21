<?php
	include("modelo/caja.php");
	include("modelo/estante.php");
    $registros = $bd->Consulta("select * from estante");
	$registros_nivel = $bd->Consulta("select * from caja")
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
		<form name="frm_caja" id="frm_caja" action="control/caja/insertar_caja.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
			<div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Codigo</label>
				<div class="col-sm-5">
					<input type="text" name="codigo" id="codigo" class="form-control required text" data-validate="required"  data-message-required="Escriba el codigo" placeholder=''/></td>
				</div>
			</div>
			<div class="form-group">
				<label for="id_estante" class="col-sm-3 control-label">Identificador de Estante</label>
				<div class="col-sm-5">
				<select name="id_estante" id="id_estante" class="form-control required select2">
						<option value="" selected>--SELECCIONE--</option>
						<?php
							while($registro = $bd->getFila($registros))
							{
								echo "<option value='$registro[id_estante]'>$registro[nombre]</option>";
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
