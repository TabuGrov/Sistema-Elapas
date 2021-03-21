<?php
include("../../modelo/usuario_externo.php");

$id_usuario_ex = $_POST[id_usuario_ex];
$nombre = utf8_decode($_POST[nombre]);
$documento = utf8_decode($_POST[documento]);
$direccion = utf8_decode($_POST[direccion]);
$id_expediente = $_POST[id_expediente];


$usuario_externo = new usuario_externo();
$result = $usuario_externo->modificar_usuario_externo($id_usuario_ex, $nombre, $documento, $direccion, $id_expediente);

if($result){
    echo "Datos actualizados.";
}else{
    echo "Ocuri&oacute; un Error.";
}
?>