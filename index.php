<?php    
	session_start();
    
    $titulo = "SISTEMA CATASTRO DE USUARIOS- ELAPAS";
    if(!isset($_SESSION[id_usuario]))
    {
        include_once("vista/paginas/login.php");
    }
    else
    {
        include_once("vista/paginas/admin.php");
    }    
?>
