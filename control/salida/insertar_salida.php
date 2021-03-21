<?php
include("../../modelo/salida.php");

$id_usuario = $_POST[id_usuario];
$cargo = $_POST[cargo];//
$area = $_POST[area];//
$cargo2 = $_POST[cargo2];//
$tipo_salida = $_POST[tipo_salida];//2
$id_conductor = $_POST[id_conductor];
$id_vehiculo = $_POST[id_vehiculo];
$fecha = $_POST[fecha];
$horas_justificacion_real = $_POST[horas_justificacion_real];
$hora_retorno = $_POST[hora_hasta];
$hora_salida = $_POST[hora_desde];
$direccion_salida = $_POST[direccion_salida];
$motivo = $_POST[motivo];
$observaciones = $_POST[observaciones];
$hora_exac_llegada='';
$estado=0;



$salida = new salida();
$result = $salida->registrar_salida($hora_retorno, $hora_exac_llegada, $hora_salida, $horas_justificacion_real, $direccion_salida, $motivo, $observaciones, $fecha, $id_vehiculo, $id_usuario, $tipo_salida, $estado);
if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. registro no insertado";
    //echo $horas_justificacion_real;
}

?>