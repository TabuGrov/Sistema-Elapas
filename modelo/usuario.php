<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class usuario 
{
	public $id_usuario;
	public $cuenta;
	public $password;
	public $nivel;
	public $trabajador;
	public $fecha_registro;
	public $fecha_actualizacion;
	public $estado;
	private $bd;

	function usuario()
	{
		$this->bd = new Conexion();
	}
	function registrar_usuario($cuenta, $password, $fecha_registro, $nivel, $trabajador, $estado_usuario)
	{
		$registros = $this->bd->Consulta("insert into usuario values('', '$cuenta', '$password', '$fecha_registro', '$nivel', '$trabajador', '$estado_usuario')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_usuario($id_usuario, $cuenta, $password, $fecha_actualizacion, $nivel)
	{
	   if(empty($password))
			//REVISAR
            $registros = $this->bd->Consulta("update usuario set usuario='$cuenta', fecha='$fecha_actualizacion, id_rol='$nivel' where id_usuario=$id_usuario");
       else        
            $registros = $this->bd->Consulta("update usuario set usuario='$cuenta', password=md5('$password'), fecha='$fecha_actualizacion', id_rol='$nivel' where id_usuario=$id_usuario");
        
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_usuario($id_usuario)
	{
		$registros = $this->bd->Consulta("select * from usuario where id_usuario=$id_usuario");
		$registro = $this->bd->getFila($registros);

		$this->id_usuario = $registro[id_usuario];
		$this->cuenta = $registro[usuario];
		$this->trabajador = $registro[id_trabajador];
		$this->password = $registro[password];
		$this->nivel = $registro[nivel];
		$this->fecha_registro = $registro[fecha];
		$this->fecha_actualizacion = $registro[fecha];
		$this->estado = $registro[estado];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from usuario $where");
			return $registros;
	}    
    function bloquear($id_usuario)
	{
		$registros = $this->bd->Consulta("update usuario set estado=0 where id_usuario=$id_usuario");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_usuario)
	{
		$registros = $this->bd->Consulta("update usuario set estado=1 where id_usuario=$id_usuario");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_usuario)
	{
		$registros = $this->bd->Consulta("delete from usuario where id_usuario=$id_usuario");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}    
	function __destroy()
	{
		$registros = $this->bd->Cerrar();
	}
}
 
?>