<?php
	include("modelo/usuario.php");
    include("modelo/trabajador.php");
    // $usuarios = $bd->Consulta("Select * FROM trabajador");
    // user = 
    $usuario = new usuario();
    $registros = $bd->Consulta("select * from usuario u inner join trabajador t on u.id_trabajador=t.id_trabajador inner join rol r on r.id_rol=u.id_rol");
    
?>
<h2>Usuarios

    <a href="?mod=usuario&pag=form_usuario" class="btn btn-green btn-icon" style="float: right;">
    	Agregar Usuario
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Usuario</th>
            <th>Nombres y Apellidos</th>
            <th>Nivel</th>
            <th>Fecha de registro</th>
            <th width='160'>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php
    $n = 0;
    while($registro = $bd->getFila($registros)) 
    {
        $n++;
        echo "<tr>";        
        if($registro[estado_usuario])
            $estado_usuario = "<a href='control/usuario/bloquear.php?id=$registro[id_usuario]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_usuario = "<a href='control/usuario/habilitar.php?id=$registro[id_usuario]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_usuario] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/usuario/eliminar.php?id=$registro[id_usuario]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[1]</td><td>$registro[9]</td><td>$registro[17]</td><td>$registro[3]</td>");
        echo "<td>
        	       <a href='?mod=usuario&pag=editar_usuario&id=$registro[id_usuario]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
    <tr>
			<th>No</th>
			<th>Usuario</th>
            <th>Nombres y Apellidos</th>
            <th>Nivel</th>
            <th>Fecha de registro</th>
            <th width='160'>Acciones</th>
		</tr>		
	</tfoot>
</table>
