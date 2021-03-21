<?php
    session_start();

    require_once('../../lib/html2pdf/html2pdf.class.php');
    ob_start();
    
    require_once('../reportes/cabeza_papeleta.php');
    include("../../modelo/salida.php");
    setlocale(LC_TIME,"es_ES");
    $id_salida=$_SESSION[id_salida];
    $salida1 = new salida();
    setlocale(LC_TIME,"es_ES");
    ini_set('date.timezone','America/La_Paz');
    $registro_salida = $bd->Consulta("select * from salida s inner join vehiculo v on v.id_vehiculo=s.id_vehiculo
                                    inner join usuario u on u.id_usuario=s.id_usuario 
                                    inner join tipo_salida ts on ts.id_tipo_salida=s.id_tipo_salida 
                                    inner join trabajador t on u.id_trabajador=t.id_trabajador 
                                    where s.id_salida=$id_salida");
    $registro = $bd->getFila($registro_salida); 
    // $fecha_s=strtotime($registro[8]);
?>
<div></div>
<h1 align="center">PAPELETA DE SALIDA</h1>
<table class="papeleta">
        <tr>
            <td class="papeleta" colspan="4">Nombre y apeellidos: <u><strong><?php echo $registro[19]; ?></strong></u></td>
        </tr>
        <tr>
            <td class="papeleta">Cargo:&nbsp;&nbsp;&nbsp;<u><strong><?php echo $registro[32]; ?></strong></u></td>
            <td class="papeleta" colspan="2">Ger. de area:&nbsp;&nbsp;&nbsp;<u><strong><?php echo $registro[33]; ?></strong></u></td>
            <td class="papeleta">Jefatura:&nbsp;&nbsp;&nbsp;<u><strong><?php echo $registro[34]; ?></strong></u></td>
        </tr>
        <tr>
        <?php $v = 1; ?>
            <td class="papeleta">Salida</td>
            <td class="papeleta">Oficial( <?php echo ('Oficial' == $registro[26]) ? '<u><strong>X</strong></u>' : ' '; ?> )</td>
            <td class="papeleta">Medica( <?php echo ('Medica' == $registro[26]) ? '<u><strong>X</strong></u>' : ' ';  ?>  )</td>
            <td class="papeleta">Particular( <?php echo ('Particular' == $registro[26]) ? '<u><strong>X</strong></u>' : ' '; ?> )</td>
            <!-- <u><strong>X</strong></u> -->
        </tr>
        <tr>
            <td class="papeleta" colspan="2">Nombre del Chofer: <u><strong><?php echo $registro[29]; ?></strong></u></td>
            <td class="papeleta" colspan="2">Placa: <u><strong><?php echo $registro[14]; ?></strong></u></td>
        </tr>
        <tr>
            <td class="papeleta" colspan="2">Tiempo Solicitado: <u><strong><?php echo $registro[4]; ?> horas</strong></u></td>
            <td class="papeleta">Hora de Salida: <u><strong><?php echo $registro[3]; ?></strong></u></td>
            <td class="papeleta">Hora de Retorno <u><strong><?php echo $registro[1]; ?></strong></u></td>
        </tr>
        <tr>
            <td class="papeleta" colspan="4">Direccion de la salida: <u><strong><?php echo $registro[5]; ?></strong></u></td>
        </tr>
        <tr>
            <td class="papeleta" colspan="4">Motivo de la Salida: <u><strong><?php echo $registro[6]; ?></strong></u></td>
        </tr>
        <tr>
            <td class="papeleta2" colspan="4">Observaciones: <u><strong><?php echo $registro[7]; ?></strong></u></td>
        </tr>
        <tr>
            <td class="papeleta" colspan="4"><strong>EL PRESENTE FORMULARIO <u><strong>NO SE TOMARA EN CUENTA</strong></u> SI NO SE CUENTA CON FIRMAS AUTORIZADAS DE SU INMEDIATO SUPERIOR</strong></td>
        </tr>
        <tr >
            <td class="papeleta" class="fecha" colspan="3"></td>
            <td >Sucre, <i><?php echo getFechaText($registro[8]) ?></i> </td>
        </tr>
        
</table>

<table>
    <tr class="firma" >
        <td class="firma1">________________________ <br><br>Firma Interesado</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td ><br>_____________________________ <br><br>Autorizado por Gerente y/o jefatura<br> de Area</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><br>_____________________<br><br>&nbsp;&nbsp;Firma Jefe Administrativo y <br> de Personal</td>
    </tr>
</table>

<?php 
    echo "</page>";
    $content = ob_get_clean();

    try
    {
        $html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', array(10, 0, 10, 0));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Papeleta_de_salida.pdf');
    }

    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

    // unset($_SESSION[mes]);
    //  unset($_SESSION[gestion]);
?>