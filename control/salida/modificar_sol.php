<?php    
    include("../../modelo/salida.php");  
    include("../../modelo/funciones.php");
    setlocale(LC_TIME,"es_ES");
    ini_set('date.timezone','America/La_Paz');
        $estado=1;
        $salida = new salida();
        if($salida->modificar_estado_s(security($_GET[id]), $estado))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
        }
?>