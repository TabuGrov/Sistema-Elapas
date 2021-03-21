<?php
include("../../modelo/usuario_externo.php");


$nombre = $_POST[nombre];
$documento = $_POST[documento];
$direccion = $_POST[direccion];
$id_expediente = $_POST[id_expediente];

$usuario_externo = new usuario_externo();
$result = $usuario_externo->registrar_usuario_externo($nombre, $documento, $direccion, $id_expediente);
// $result = $usuario->registrar_usuario("jaime", "123456", date("Y-m-d"), 2,11, 1);
if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. El usuario ya existe.";
    echo gettype($nombre).":".$nombre."\n";
    echo gettype($documento).":".$documento."\n";
    echo gettype($direccion).":".$direccion."\n";
    echo gettype($id_expediente).":".$id_expediente."\n";
}

?>