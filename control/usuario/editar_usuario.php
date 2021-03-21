<?php
include("../../modelo/usuario.php");

$id_usuario = $_POST[id_usuario];
$cuenta = utf8_decode($_POST[usuario]);
$password = utf8_decode($_POST[password]);
$fecha_actualizacion = date("Y-m-d");
$nivel = intval($_POST[id_rol]);

// $nivel = $_POST[nivel];

$usuario = new usuario();
$result = $usuario->modificar_usuario($id_usuario, $cuenta, $password, $fecha_actualizacion, $nivel);

if($result){
    echo "Datos actualizados.";
}else{
    echo "Ocuri&oacute; un Error.";
    //echo $id_usuario."<br>".$cuenta."<br>".$password."<br>".$fecha_actualizacion."<br>".$nivel;
}
?>