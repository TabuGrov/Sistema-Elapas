<?php
	include("modelo/estante.php");
    
    $estante = new estante();
    
    $registros = $estante->get_all("");
    
?>
<h2>estante

    <a href="?mod=estante&pag=form_estante" class="btn btn-green btn-icon" style="float: right;">
    	Agregar estante
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nombre</th>
            <th>Tipo Estante</th>
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
            $estado_estante = "<a href='control/estante/bloquear.php?id=$registro[id_estante]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado_estante = "<a href='control/estante/habilitar.php?id=$registro[id_estante]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_estante] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/estante/eliminar.php?id=$registro[id_estante]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[nombre]</td><td>$registro[id_tipo_estante]</td><td>$registro[estado]</td>");
        echo "<td>
        	       <a href='?mod=estante&pag=editar_estante&id=$registro[id_estante]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";

    }	
?>
    </tbody>
	<tfoot>
        <tr>
			<th>No</th>
			<th>Nombre</th>
            <th>Tipo estante</th>
            <th>Estado</th>
            <th>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$estante->__destroy();
?>