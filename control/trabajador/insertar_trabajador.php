<?php
include("../../modelo/trabajador.php");

$documento = utf8_decode($_POST[documento]);
$nombre = utf8_decode($_POST[nombre]);
$correo = $_POST[correo];
$direccion = utf8_decode($_POST[direccion]);
$cargo = $_POST[cargo];
$unidad = $_POST[unidad];
$jefatura = $_POST[jefatura];
$estado = 1;

$trabajador = new trabajador();
$result = $trabajador->registrar_trabajador($documento, $nombre, $correo, $direccion, $cargo, $unidad, $jefatura, $estado);

if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. El trabajador ya existe.";
}

?>