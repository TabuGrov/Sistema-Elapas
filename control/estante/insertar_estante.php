<?php
include("../../modelo/estante.php");

$nombre = $_POST[nombre];
$tipo_estante = intval($_POST[id_tipo_estante]);
$estado = 1;

$estante = new estante();
$result = $estante->registrar_estante($nombre, $tipo_estante, $estado);
if($result)
{
    echo "Datos registrados.";
}
else
{
    echo "Ocuri&oacute; un Error. El estante ya existe.";
}

?>