<?php
include("../../modelo/usuario.php");


$user = utf8_decode($_POST[usuario]);
$password = md5($_POST[password]);
$nivel = intval($_POST[nivel]);
$trabajador = intval($_POST[id_trabajador]);
$estado_usuario = 1;

$usuario = new usuario();
$result = $usuario->registrar_usuario($user, $password, date("Y-m-d"), $nivel, $trabajador, 1);
// $result = $usuario->registrar_usuario("jaime", "123456", date("Y-m-d"), 2,11, 1);
if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. El usuario ya existe.";
    // echo gettype($usuario).":".$usuario."\n";
    // echo gettype($password).":".$password."\n";
    // echo gettype($nivel).":".$nivel."\n";
    // echo gettype(date("Y-m-d")).":".date("Y-m-d")."\n";
    // echo gettype($trabajador).":".$trabajador."\n";
    // echo gettype($estado_usuario).":".$estado_usuario."\n";
}

?>
