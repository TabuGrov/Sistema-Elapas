<?php
    session_start();
    include("../../modelo/funciones.php");
    include("../../modelo/sesion.php");  
    
        $sesion = new Sesion();
        
        $email = security($_POST[username]);
        $pass = security($_POST[password]);
        
        $resp = array();        
        $resp['submitted_data'] = $_POST;
        
        $login_status = 'invalid';
        
        if($sesion->Iniciar($email,$pass))
        {   
            $_SESSION['id_usuario'] = $sesion->id_usuario;
            $_SESSION['usuario'] = $sesion->usuario;
            $_SESSION['nombre_usuario'] = $sesion->nombre_ap;
            $_SESSION['nivel'] = $sesion->nivel;
            
            $login_status = 'success';
        }
            
        $resp['login_status'] = $login_status;
        
        if($login_status == 'success')
        {
        	$resp['redirect_url'] = '';
        }
        
        
        echo json_encode($resp);
            
?> 
