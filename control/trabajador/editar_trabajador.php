<?php
include("../../modelo/trabajador.php");

$id_trabajador = intval($_POST[id_trabajador]);
$documento = utf8_decode($_POST[documento]);
$nombre = utf8_decode($_POST[nombre]);
$correo = $_POST[correo];
$direccion = utf8_decode($_POST[direccion]);
$cargo = $_POST[cargo];
$unidad = $_POST[unidad];
$jefatura = $_POST[jefatura];

$trabajador = new trabajador();
$result = $trabajador->modificar_trabajador($id_trabajador, $documento, $nombre, $correo, $direccion, $cargo, $unidad, $jefatura);
// $result = $personal->modificar_trabajador(10, "33443", "loren", "loren@gmail.com", "estadium");
if($result){
    echo "Datos actualizados.";
}else{
    echo "Ocuri&oacute; un Error.";
}
?>