<?php
	include("modelo/trabajador.php");
    
    $trabajador = new trabajador();
    
    $registros = $trabajador->get_all("");
    
?>
<h2>Trabajador

    <a href="?mod=trabajador&pag=form_trabajador" class="btn btn-green btn-icon" style="float: right;">
    	Agregar Trabajador
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Documento</th>
            <th>Nombres y Apellidos</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Cargo</th>
            <th>Unidad</th>
            <th>Jefatura</th>
            <th>Estado</th>
            <th width='160'>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php
    $n = 0;
    foreach($registros as $key => $registro) 
    {
        $n++;
        echo "<tr>";        
        if($registro[estado_trabajador])
            $estado_trabajador = "<a href='control/trabajador/bloquear.php?id=$registro[id_trabajador]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_trabajador = "<a href='control/trabajador/habilitar.php?id=$registro[id_trabajador]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_trabajador] != $_SESSION[id_trabajador])
            $eliminar = "<a href='control/trabajador/eliminar.php?id=$registro[id_trabajador]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[documento]</td><td>$registro[nombre]</td><td>$registro[correo]</td><td>$registro[direccion]</td><td>$registro[cargo]</td><td>$registro[unidad]</td><td>$registro[jefatura]</td><td>$registro[estado]</td>");
        echo "<td>
        	       <a href='?mod=trabajador&pag=editar_trabajador&id=$registro[id_trabajador]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
        <tr>
			<th>No</th>
			<th>Documento</th>
            <th>Nombres y Apellidos</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Cargo</th>
            <th>Unidad</th>
            <th>Jefatura</th>
            <th>Estado</th>
            <th width='160'>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$trabajador->__destroy();
?>