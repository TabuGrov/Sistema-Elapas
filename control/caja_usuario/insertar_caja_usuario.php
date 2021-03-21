<?php
include("../../modelo/caja_usuario.php");

$id_caja = intval($_POST[id_caja]);
$id_user_ex = intval($_POST[id_user_ex]);

$caja_usuario = new caja_usuario();
$result = $caja_usuario->registrar_caja_usuario($id_caja, $id_user_ex, date("Y-m-d"));
if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. El estante ya existe.";
}

?>