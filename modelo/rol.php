<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class rol
{
	public $id_rol;
	public $nombre;
	public $estado;
	private $bd;

	function rol()
	{
		$this->bd = new Conexion();
	}
	function registrar_rol($nombre, $estado)
	{
		$registros = $this->bd->Consulta("insert into rol values('','$nombre', '$estado')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function get_rol($id_rol)
	{
		$registros = $this->bd->Consulta("select * from rol where id_rol=$id_rol");
		$registro = $this->bd->getFila($registros);

		$this->id_rol = $registro[id_rol];
		$this->nombre = $registro[nombre];
        $this->estado = $estado[estado];
    }
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from rol $where");
			return $registros;
	}    
    function bloquear($id_rol)
	{
		$registros = $this->bd->Consulta("update rol set estado=0 where id_rol=$id_rol");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_rol)
	{
		$registros = $this->bd->Consulta("update rol set estado=1 where id_rol=$id_rol");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_rol)
	{
		$registros = $this->bd->Consulta("delete from rol where id_rol=$id_rol");
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