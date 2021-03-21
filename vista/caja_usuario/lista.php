<?php
	include("modelo/caja_usuario.php");
    
    $caja_usuario = new caja_usuario();
    
    $registros = $caja_usuario->get_all("");
    
?>
<h2>caja_usuario

    <a href="?mod=caja_usuario&pag=form_caja_usuario" class="btn btn-green btn-icon" style="float: right;">
    	Agregar caja_usuario
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Usuario externo</th>
            <th>caja</th>
            <th>fecha</th>
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
            $estado_rol = "<a href='control/caja_usuario/bloquear.php?id=$registro[id_caja_usuario]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_rol = "<a href='control/caja_usuario/habilitar.php?id=$registro[id_caja_usuario]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_caja_usuario] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/caja_usuario/eliminar.php?id=$registro[id_caja_usuario]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[id_caja]</td><td>$registro[id_usuario_ex]</td><td>$registro[fecha]</td>");
        echo "<td>
        	       <a href='?mod=caja_usuario&pag=editar_caja_usuario&id=$registro[id_usuario]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
        <tr>
            <th>No</th>
			<th>Usuario externo</th>
            <th>caja</th>
            <th>fecha</th>
            <th>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$caja_usuario->__destroy();
?>