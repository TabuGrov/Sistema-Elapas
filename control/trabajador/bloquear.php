<?php    
    include("../../modelo/tranajador.php");  
    
        $trabajador = new trabajador();
        if($trabajador->bloquear($_GET[id]))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
        }
    
    
?>