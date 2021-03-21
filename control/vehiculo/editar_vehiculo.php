<?php
include("../../modelo/vehiculo.php");

$id_vehiculo = $_POST[id_vehiculo];
$placa = utf8_decode($_POST[placa]);
$estado = $_POST[estado];

// $nivel = $_POST[nivel];

$vehiculo = new vehiculo();
$result = $vehiculo->modificar_vehiculo($id_vehiculo, $placa, $estado);

if($result){
    echo "Datos actualizados.";
}else{
    echo "Ocuri&oacute; un Error.";
}
?>