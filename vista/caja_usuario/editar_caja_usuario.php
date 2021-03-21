<?php
	include("modelo/caja_usuario.php");
    
    $id = security($_SESSION[id_caja_usuario]);
    $caja_usuario = new caja_usuario();
    $caja_usuario->get_caja_usuario($id);
    
?>
<h2>Editar caja_usuario</h2>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			Modificar caja_usuario
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_caja_usuario" id="frm_caja_usuario" action="control/caja_usuario/editar_caja_usuario.php" method="post" role="form" class="validate_edit form-horizontal form-groups-bordered">
			<input type="hidden" name="id_caja_usuario" id="id_caja_usuario" value="<?php echo $caja_usuario->id_caja_usuario; ?>"/>
						
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-info">Guardar</button> <button type="button" class="btn cancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
