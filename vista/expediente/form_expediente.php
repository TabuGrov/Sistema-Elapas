<?php 
include("modelo/expediente.php");
?>
<h2>Crear el Expediente</h2>
                      <br />
                      <div class="panel panel-default panel-shadow" data-collapsed="0">
                      	<div class="panel-heading">
    				  		<div class="panel-title">
    							Expediente
    				  		</div>
    				  	</div>
	<div class="panel-body">
		<form name="frm_expediente" id="frm_expediente" action="control/expediente/insertar_expediente.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
			<div class="form-group">
				<label for="nombre_archivo" class="col-sm-3 control-label">Nombre archivo</label>
				<div class="col-sm-5">
					<input type="text" name="nombre_archivo" id="nombre_archivo" class="form-control required integer"/>
				</div>
			</div>
			<div class="form-group">
				<label for="nro_fojas" class="col-sm-3 control-label">Numero de Fojas</label>
				<div class="col-sm-5">
					<input type="text" name="nr_fojas" id="nr_fojas" class="form-control required int"/>
				</div>
			</div>
			<div class="form-group">
				<label for="codigo_catastral" class="col-sm-3 control-label">Codigo catastral</label>
				<div class="col-sm-5">
					<input type="text" name="codigo_catastral" id="codigo_catastral" class="form-control required integer"/>
				</div>
			</div>
			<div class="form-group">
				<label for="nombre_archivo_exp" class="col-sm-3 control-label">Archivo(*.pdf)</label>
				<div class="col-sm-5">
					<input type="file" name="nombre_archivo" id="nombre_archivo" class="form-control required text"/>
				</div>
			</div>
			<div class="form-group">
				<label for="observacion" class="col-sm-3 control-label">Observaci&oacute;n del cuerpo</label>
				<div class="col-sm-5">
					<input type="textarea" name="observacion" id="observacion" class="form-control required text"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-info">Registrar</button> <button type="reset" class="btn btn-default cancelar">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</div>
