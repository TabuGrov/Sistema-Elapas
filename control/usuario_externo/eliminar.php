<?php    
    include("../../modelo/usuario_externo.php");  
    include("../../modelo/funciones.php");
    
        $usuario_externo = new usuario_externo();
        if($usuario_externo->eliminar(security($_GET[id])))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
        }
    
?>