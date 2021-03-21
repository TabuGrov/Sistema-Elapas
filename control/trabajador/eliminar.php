<?php    
    include("../../modelo/trabajador.php");  
    include("../../modelo/funciones.php");
    
        $trabajador = new trabajador();
        if($trabajador->eliminar(security($_GET[id])))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
        }
    
?>