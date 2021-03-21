<?php

if(!class_exists("conexion"))
    include ("conexion.php");

class Sesion 
{
      private $bd;
      public $id_usuario;
      public $usuario;
      public $correo;
      public $nombre_ap;
      public $nivel;
      
    //constructor de la clase sesion
    function Sesion()
    {
        $this->bd = new Conexion();
        $this->bd->Conectar();        
    }
    function Iniciar($usuario,$pass)
    {
        //$pass = md5($pass);
        $datos = $this->bd->Consulta("select * from usuario u inner join rol r on r.id_rol=u.id_rol inner join trabajador t on t.id_trabajador=u.id_trabajador where u.usuario='$usuario' and u.password='$pass' and u.estado=1");
        
        if ($this->bd->numFila($datos)>0)
        {            
            $dato = $this->id_usuario = $this->bd->getFila($datos);
            $this->id_usuario = $dato[id_usuario];
            $this->cuenta = $dato[usuario];
            
            $this->nombre_ap = utf8_encode($dato[12]);
            $this->nivel = $dato[8];
                        
        
            
            return true;            
        } 
        else
        {
            return false;
        }
            
    }
   
}
?>