<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class usuario_externo
{
	public $id_usuario_ex;
	public $nombre;
	public $documento;
	public $direccion;
	public $id_expediente;
	
	private $bd;

	function usuario_externo()
	{
		$this->bd = new Conexion();
	}
	function registrar_usuario_externo($nombre, $documento, $direccion, $id_expediente)
	{
		$registros = $this->bd->Consulta("insert into usuario_externo values('', '$nombre', '$documento', '$direccion', '$id_expediente')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_usuario_externo($id_usuario_ex, $nombre, $documento, $direccion, $id_expediente)
	{
	   $registros = $this->bd->Consulta("update usuario_externo set nombre='$nombre', documento='$docuemnto', direccion='$direccion', id_expediente='$id_expediente' where id_usuario_ex=$id_usuario_ex");
        
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_usuario_ex($id_usuario_ex)
	{
		$registros = $this->bd->Consulta("select * from usuario_externo where id_usuario_ex=$id_usuario_ex");
		$registro = $this->bd->getFila($registros);

		$this->id_usuario_ex = $registro[id_usuario_ex];
		$this->nombre = $registro[nombre];
        $this->documento = $registro[documento];
		$this->direccion = $registro[direccion];
		$this->id_expediente = $registro[id_expediente];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from usuario_externo $where");
			return $registros;
	}    
    function bloquear($id_usuario_ex)
	{
		$registros = $this->bd->Consulta("update usuario_externo set estado=0 where id_usuario_ex=$id_usuario_ex");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_usuario_ex)
	{
		$registros = $this->bd->Consulta("update usuario_externo set estado=1 where id_usuario_ex=$id_usuario_ex");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_usuario_ex)
	{
		$registros = $this->bd->Consulta("delete from usuario_externo where id_usuario_ex=$id_usuario_ex");
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