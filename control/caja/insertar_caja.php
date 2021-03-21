<?php
include("../../modelo/caja.php");

$codigo = $_POST[codigo];
$estado = 1;
$id_estante = intval($_POST[id_estante]);

$caja = new caja();
$result = $caja->registrar_caja($codigo, $estado, $id_estante);
if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. La caja ya existe.";
}

?>