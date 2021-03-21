<?php
	include("modelo/expediente.php");
    
    $expediente = new expediente();
    
    $registros = $expediente->get_all("");
    
?>
<h2>expediente

    <a href="?mod=expediente&pag=form_expediente" class="btn btn-green btn-icon" style="float: right;">
    	Agregar expediente
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nombre del archivo</th>
            <th>Numero de hojas</th>
            <th>Codigo catastral</th>
            <th>Observacion</th>
            <th>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php
    $n = 0;
    foreach($registros as $key => $registro) 
    {
        $n++;
        echo "<tr>";        
        if($registro[estado])
            $estado_rol = "<a href='control/expediente/bloquear.php?id=$registro[id_expediente]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_rol = "<a href='control/expediente/habilitar.php?id=$registro[id_expediente]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_expediente] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/expediente/eliminar.php?id=$registro[id_expediente]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[nombre_archivo]</td><td>$registro[nr_fojas]</td><td>$registro[codigo_catastral]</td><td>$registro[observacion]</td>");
        echo "<td>
        	       <a href='?mod=expediente&pag=editar_expediente&id=$registro[id_expediente]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
        <tr>
			<th>No</th>
			<th>Nombre del archivo</th>
            <th>Numero de hojas</th>
            <th>Codigo catastral</th>
            <th>Observacion</th>
            <th>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$expediente->__destroy();
?>