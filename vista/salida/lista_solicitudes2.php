<?php
	include("modelo/salida.php");
    include("modelo/rol.php");
    $fecha_actual = date("Y-m-d");
    $salida = new salida();
    $registros = $bd->Consulta("select * from salida s inner join vehiculo v on v.id_vehiculo=s.id_vehiculo
                                    inner join usuario u on u.id_usuario=s.id_usuario 
                                    inner join tipo_salida ts on ts.id_tipo_salida=s.id_tipo_salida 
                                    inner join trabajador t on u.id_trabajador=t.id_trabajador 
                                    where s.fecha='$fecha_actual' and s.estado=0");    
?>
<h2>Lista de Salida Solicitadas</h2></br></br>
<a href="?mod=salida&pag=form_consulta_salida" class="btn btn-danger btn-icon" style="float: left;">
    	Volver
    	<i class="entypo-back"></i>
    </a> <br>
<h2>Salida
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Fecha</th>
            <th>Hora Salida</th>
            <th>Hora exacta de llegada</th>
            <th>Hora Retorno</th>
            <th>Tiempo Solicitado</th>
            <th>Direccion de Salida</th>
            <th>Motivo</th>
            <th>Vehiculo</th>
            <th>Usuario</th>
            <th>Tipo de Salida</th>
            <th>Estado</th>
            <th>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php
    $n = 0;
    while($registro = $bd->getFila($registros)) 
    {
        $n++;
        echo "<tr>";        
        

            if($registro[id_salida] != $_SESSION[id_usuario])
                $eliminar = "<a href='control/salida/eliminar.php?id=$registro[id_salida]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
            else
                $eliminar = "";
                
            echo utf8_encode("
                            <td>$n</td>
                            <td>$registro[fecha]</td>
                            <td>$registro[hora_salida]</td>
                            <td>$registro[hora_exac_llegada]</td>
                            <td>$registro[hora_retorno]</td>
                            <td>$registro[tiempo_solicitado]</td>
                            <td>$registro[direccion_salida]</td>
                            <td>$registro[motivo]</td>
                            <td>$registro[14]-$registro[15]</td>
                            <td>$registro[19]</td>
                            <td>$registro[26]</td>
                            <td>$registro[12]</td>"
                        );
            if($_SESSION[nivel] != "4"){
            echo "<td>
                    $eliminar
                    <a target='_blank' href='vista/reportes/visor_reporte.php?f=vista/salida/reporte_salida.php&id=$registro[id_salida]' class='btn btn-green btn-icon btn-xs'>Papeleta salida <i class='entypo-print'></i></a>
                    </td>";
            echo "</tr>";
            }else{
                echo "<td>
                <a href='control/salida/modificar_sol.php?id=$registro[id_salida]' class='accion btn btn-green btn-icon btn-xs'>Registrar Salida <i class='entypo-pencil'></i></a>
                </td>";
            }

    }	
?>
    </tbody>
	<tfoot>
        <tr>
			<th>No</th>
			<th>Fecha</th>
            <th>Hora retorno</th>
            <th>Hora exacta de llegada</th>
            <th>Hora salida</th>
            <th>Tiempo Solicitado</th>
            <th>Direccion de Salida</th>
            <th>Motivo</th>
            <th>Vehiculo</th>
            <th>Usuario</th>
            <th>Tipo de Salida</th>
            <th>Estado</th>
            <th>Acciones</th>
		</tr>
	</tfoot>
</table>

<?php
	$salida->__destroy();
?>