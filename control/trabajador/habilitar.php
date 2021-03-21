<?php    
    include("../../modelo/trabajador.php");  
    
        $trabajador = new trabajador();
        if($trabajador->habilitar($_GET[id]))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
        }
    
    
?>