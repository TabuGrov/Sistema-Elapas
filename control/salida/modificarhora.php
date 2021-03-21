<?php    
    include("../../modelo/salida.php");  
    include("../../modelo/funciones.php");
    setlocale(LC_TIME,"es_ES");
    ini_set('date.timezone','America/La_Paz');
        $hora_exac_llegada = date('H:i:s');
        $salida = new salida();
        if($salida->modificarhora(security($_GET[id]), $hora_exac_llegada))
        {
            echo "Acci&oacute;n completada con &eacute;xito";
        }
        else
        {
            echo "Ocurri&oacute; un error.";
            echo "<br>";
            echo "Hora de Llegada: ".$_GET[hora_exac_llegada]."<br>"." ID: ".$_GET[id];
        }
?>