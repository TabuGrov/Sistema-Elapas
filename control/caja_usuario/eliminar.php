<?php    
    include("../../modelo/caja_usuario.php");  
    include("../../modelo/funciones.php");
    
        $caja_usuario = new caja_usuario();
        if($caja_usuario->eliminar(security($_GET[id])))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
        }
?>