<?php
	include("modelo/tipo_salida.php");
    
    $tipo_salida = new tipo_salida();
    
    $registros = $tipo_salida->get_all("");
    
?>
<h2>Tipo Salida

    <a href="?mod=tipo_salida&pag=form_tipo_salida" class="btn btn-green btn-icon" style="float: right;">
    	Agregar Tipo Salida
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nombre</th>
            <th>Estado</th>
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
            $estado_rol = "<a href='control/tipo_salida/bloquear.php?id=$registro[id_tipo_salida]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_rol = "<a href='control/tipo_salida/habilitar.php?id=$registro[id_tipo_salida]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_tipo_salida] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/tipo_salida/eliminar.php?id=$registro[id_tipo_salida]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[nombre]</td><td>$registro[estado]</td>");
        echo "<td>
        	       <a href='?mod=tipo_salida&pag=editar_tipo_salida&id=$registro[id_tipo_salida]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
        <tr>
            <th>No</th>
			<th>Codigo</th>
            <th>Estado</th>
            <th>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$tipo_salida->__destroy();
?>