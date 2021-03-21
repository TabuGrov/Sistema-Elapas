<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<h2>Crear salida</h2>
<?php
include("modelo/salida.php");
$registros = $bd->Consulta("select * from salida");
$registro_funcionario = $bd->Consulta("SELECT * FROM usuario u inner join rol r on r.id_rol=u.id_rol inner join trabajador t on t.id_trabajador=u.id_trabajador where u.id_usuario=$_SESSION[id_usuario]");
$fun = $bd->getFila($registro_funcionario);
//echo $fun[nombre];
$registro_trabajador = $bd->Consulta("SELECT * FROM usuario u INNER JOIN rol r on r.id_rol - u.id_rol INNER JOIN trabajador t on t.id_trabajador = u.id_trabajador WHERE u.id_usuario = $_SESSION[id_usuario]");
$trab = $bd->getFila($registro_trabajador);
//echo $trab[cargo];
$r_chofer = $bd->Consulta("select * from trabajador where cargo='CONDUCTOR'");
$r_salida = $bd->Consulta("select * from tipo_salida");
$registro_tipo_salida = $bd->Consulta("select * from tipo_salida");
$registro_vehiculo = $bd->Consulta("select * from vehiculo");
?>
<br />
<div class="panel panel-default panel-shadow" data-collapsed="0">
  	<div class="panel-heading">
  		<div class="panel-title">
			PAPELETA DE SALIDA
  		</div>
  	</div>
	<div class="panel-body">
		<form name="frm_salida" id="frm_salida" action="control/salida/insertar_salida.php" method="post" role="form" class="validate form-horizontal form-groups-bordered">
			<div class="form-group">
				<div class="col-sm-11">
					<label for="nom_funcionario" class="col-sm-2 control-label">Nombre y Apellido del Funcionario</label>
					<div class="col-sm-8">
						<input type="text" name="nom_funcionario" id="nom_funcionario" class="form-control required text" data-validate="required" readonly value="<?php echo $fun[nombre];?>"/>
						<input type="hidden" name="id_usuario" id="id_usuario" readonly value="<?php echo $fun[id_trabajador];?>"/>
					</div>
				</div>
			</div>
			<!--  DATOS DE ORDENANZA -->
			<div class="form-group">
					<div class="col-sm-11">
						<label for="cargo" class="col-sm-1 control-label">Cargo</label>
						<div class="col-sm-2">
							<input type="text" name="cargo" id="cargo" class="form-control required text" data-validate="required" readonly value="<?php echo $trab[cargo];?>"/>
						</div>
						<label for="area" class="col-sm-1 control-label">Gerente de Area</label>
						<div class="col-sm-3">
							<select name="area" id="area" class="form-control required select">
								<option value="" selected>--SELECCIONE--</option>
								<option value="gerencia general" selected>GERENCIA GENERAL</option>
								<option value="gerencia tecnica">GERENCIA TECNICA</option>
								<option value="gerencia administrativa y financiera">GERENCIA ADMINISTRATIVA Y FINANCIERA</option>
								<option value="gerencia comercial">GERENCIA COMERCIAL</option>
							</select>
						</div>
						<label for="cargo2" class="col-sm-1 control-label">Jefatura</label>
						<div class="col-sm-2">
							<input type="text" name="cargo2" id="cargo2" class="form-control required text" data-validate="required" readonly value="<?php echo $trab[jefatura];?>"/>
						</div>
					</div>
			</div>
			<!--  DATOS DE ORDENANZA -->
			<div class="form-group">
				<div class="col-sm-11">
					<label for="tipo_salida" class="col-sm-1 control-label">Salida</label>
						<?php
						$t=0;
						 while($t_salida = $bd->getFila($r_salida))
							{	
								$t++;
								echo "<div class='col-sm-3'>";
								echo "<label for='tipo_salida' class='col-sm-4 control-label'>$t_salida[nombre]</label>";
								echo "<input type='radio' id='tipo_salida".$t."' class='col-sm-5 form-control-radio' name='tipo_salida' value='$t_salida[id_tipo_salida]' onchange='javascript:showObs()'>";
								echo "</div>";
							}
						?>
				</div>
				<!-- echo "<input type='radio' id='tipo_salida' class='col-sm-5 form-control-radio' name='tipo_salida' value='$t_salida[id_tipo_salida]' if($t_salida[nombre] == 'MEDICA') checked='checked'>"; -->
			</div>	
			<div class="form-group">
				<div class="col-sm-11">
					<label for="id_conductor" class="col-sm-2 control-label">Nombre del Conductor</label>
					<div class="col-sm-4">
						<select name="id_conductor" id="id_conductor" class="form-control required select2">
							<option value="" selected>--SELECCIONE--</option>
							<?php
								while($conductor = $bd->getFila($r_chofer))
								{
									echo "<option value='$conductor[id_trabajador]'>$conductor[nombre]</option>";
								}
							?>
							
						</select>
					</div>
					<label for="id_vehiculo" class="col-sm-1 control-label">Auto</label>
					<div class="col-sm-3">
						<select name="id_vehiculo" id="id_vehiculo" class="form-control required select2">
							<option value="" selected>--SELECCIONE--</option>
							<?php
								while($r_vehiculo = $bd->getFila($registro_vehiculo))
								{
									echo "<option value='$r_vehiculo[id_vehiculo]'>$r_vehiculo[modelo] : $r_vehiculo[marca]</option>";
								}
							?>
							
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-7">
					<label for="fecha" class="col-sm-3 control-label">Fecha</label>
					<div class="col-sm-3">
						<input type="date" name="fecha" id="fecha" class="form-control required text" data-validate="required" value="<?php echo date("Y-m-d");?>" placeholder=''/>
					</div>
					
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-11">
					<label for="hora_desd" class="col-sm-2 control-label">Hora Salida</label>
					<div class="col-sm-2">
						<!-- <input id="hora_desde" type="text" name="hora_desde" value="8:30"> -->
						<input type="time" id="hora_desde" name="hora_desde" value="08:30" class="form-control" onchange="calculardif()" />
					</div>
					<label for="hora_hasta" class="col-sm-1 control-label">Hora Retorno</label>
					<div class="col-sm-2">
						<input type="time" id="hora_hasta" name="hora_hasta" value="09:30" class="form-control" onchange="calculardif()" />
						<!-- <input id="hora_hasta" type="text" name="hora_hasta" value="10:30"> -->
					</div>
					<label for="horas_justificacion_real" class="col-sm-1 control-label">Tiempo de salida</label>
					<div class="col-sm-2">
						<!-- <input type="text" id="horas_justificacion_real" readonly /> -->
						<input type="text" name="horas_justificacion_real" id="horas_justificacion_real" class="form-control"  readonly/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-11">
					<label for="direccion_salida" class="col-sm-2 control-label">Direccion de salida</label>
					<div class="col-sm-8">
						<input type="text" name="direccion_salida" id="direccion_salida" class="form-control required text" data-validate="required" autocomplete="off"  placeholder=''/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-11">
					<label for="motivo" class="col-sm-2 control-label">Motivo de la Salida</label>
					<div class="col-sm-8">
						<input type="text" name="motivo" id="motivo" class="form-control required text" data-validate="required" autocomplete="off"  placeholder=''/>
					</div>
				</div>
			</div>
			<div class="form-group" id="obs" style="display: none;">
				<div class="col-sm-11" >
					<label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
					<div class="col-sm-8">
						<textarea id="observaciones" name="observaciones" rows="4" cols="30" value="-" class="form-control required text" >-</textarea>
					</div>
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
