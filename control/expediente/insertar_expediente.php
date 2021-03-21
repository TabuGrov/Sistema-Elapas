<?php
session_start();
include("../../modelo/expediente.php");
include("../../modelo/funciones.php");

$destination_path = "../../archivo/expediente" . DIRECTORY_SEPARATOR;
$extensiones = array("pdf");

referer_permit();

// $nombre_archivo=$_POST[nombre_archivo];
$nr_fojas=intval($_POST[nr_fojas]);
$codigo_catastral=$_POST[codigo_catastral];
$observacion=$_POST[observacion];


$archivo = basename($_FILES['nombre_archivo']['name']);
$tipo = explode(".", $archivo);
$ext = $tipo[count(explode(".", $archivo)) - 1];
$nombre = date('Ymdhis');
$archivo = $nombre.".".$ext;
$tamanio = $_FILES['nombre_archivo']['size'];
    
if(in_array($ext, $extensiones) && $tamanio <= 94371840)
{
    $target_path = $destination_path . $archivo;    
    if (@move_uploaded_file($_FILES['nombre_archivo']['tmp_name'], $target_path)) 
	{
    	chmod ($target_path,0755);
    	$nombre_archivo = $archivo;
        $expediente = new expediente();
		$result = $expediente->registrar_expediente($nombre_archivo, $nr_fojas, $codigo_catastral, $observacion);
		if($result)
		{
			echo "Datos registrados.";
		}
		else
		{
			echo "Ocurri&oacute; un Error.";
		}
        
    }
}
else
{
    echo "Ocuri&oacute; un Error. Archivo no permitido.";
    exit();
}







?>