<?php
	include("modelo/vehiculo.php");
    
    $vehiculo = new vehiculo();
    
    $registros = $vehiculo->get_all("");
    
?>
<h2>Vehiculo

    <a href="?mod=vehiculo&pag=form_vehiculo" class="btn btn-green btn-icon" style="float: right;">
    	Agregar vehiculo
    	<i class="entypo-plus"></i>
    </a>
    
</h2>
<br />        
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>No</th>
			<th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
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
            $estado = "<a href='control/vehiculo/bloquear.php?id=$registro[id_vehiculo]' class='accion btn btn-red btn-icon btn-xs'>Bloquear <i class='entypo-cancel'></i></a>";
        else
            $estado = "<a href='control/vehiculo/habilitar.php?id=$registro[id_vehiculo]' class='accion btn btn-green btn-icon btn-xs'>Habilitar <i class='entypo-check'></i></a>";
        
        if($registro[id_vehiculo] != $_SESSION[id_usuario])
            $eliminar = "<a href='control/vehiculo/eliminar.php?id=$registro[id_vehiculo]' class='accion btn btn-red btn-icon btn-xs'>Eliminar <i class='entypo-cancel'></i></a>";
        else
            $eliminar = "";
            
        echo utf8_encode("<td>$n</td><td>$registro[placa]</td><td>$registro[marca]</td><td>$registro[modelo]</td>");
        echo "<td>
        	       <a href='?mod=vehiculo&pag=editar_vehiculo&id=$registro[id_vehiculo]' class='btn btn-info btn-icon btn-xs'>Editar <i class='entypo-pencil'></i></a>
                   $eliminar
      		  </td>";
        echo "</tr>";
    }	
?>
    </tbody>
	<tfoot>
        <tr>
            <th>No</th>
			<th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Acciones</th>
		</tr>		
	</tfoot>
</table>

<?php
	$vehiculo->__destroy();
?>