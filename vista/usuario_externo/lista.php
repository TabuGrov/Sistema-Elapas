<?php
	include("modelo/usuario_externo.php");
    
    $usuario_externo = new usuario_externo();
    
    $registros = $usuario_externo->get_all("");
    
?>
<h2>Usuarios Externo

    <a href="?mod=usuario_externo&pag=form_usuario_externo" class="btn btn-green btn-icon" style="float: right;">
    	Agregar Usuario Externo
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nombre y Apellido</th>
            <th>Documento</th>
            <th>Direccion</th>
            <th>Tipo</th>
            <th>Expediente</th>
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
        if($registro[estado_usuario])
            $estado_usuario = "<a href='control/usuario/bloquear.php?id=$registro[id_usuario]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_usuario = "<a href='control/usuario/habilitar.php?id=$registro[id_usuario]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_usuario_ex] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/usuario_externo/eliminar.php?id=$registro[id_usuario_ex]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[nombre]</td>
        <td>$registro[documento]</td>
        <td>$registro[direccion]</td>
        <td>$registro[tipo]</td>
        <td>$registro[id_expediente]</td>");
        echo "<td>
        	       <a href='?mod=usuario_externo&pag=editar_usuario_ex&id=$registro[id_usuari_ex]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
        <tr>
            <th>No</th>
			<th>Nombre y Apellido</th>
            <th>Documento</th>
            <th>Direccion</th>
            <th>Tipo</th>
            <th>Identificador del Expediente</th>
            <th width='160'>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$usuario_externo->__destroy();
?>