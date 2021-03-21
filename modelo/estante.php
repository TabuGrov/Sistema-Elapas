<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class estante 
{
	public $id_estante;
	public $nombre;
	public $estado;
	public $id_tipo_estante;

	private $bd;

	function estante()
	{
		$this->bd = new Conexion();
	}
	function registrar_estante($nombre, $estaso, $id_estante)
	{
		$registros = $this->bd->Consulta("insert into estante values('', '$nombre', '$estado', '$id__tipo_estante')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_estante($id_estante, $nombre, $id_tipo_estante)
	{
	   if(empty($nombre))
			//REVISAR
            $registros = $this->bd->Consulta("update estante set  id_tipo_estante='$id_tipo_estante' where id_estante=$id_estante");
       else        
            $registros = $this->bd->Consulta("update estante set nombre='$nombre', id_tipo_estante='$id_tipo_estante' where id_estante=$id_estante");
        
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_estante($id_estante)
	{
		$registros = $this->bd->Consulta("select * from estante where id_estante=$id_estante");
		$registro = $this->bd->getFila($registros);

		$this->id_estante = $registro[id_estante];
		$this->nombre = $registro[nombre];
		$this->id_tipo_estante = $registro[id_tipo_estante];
		$this->estado = $registro[estado];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from estante $where");
			return $registros;
	}    
    function bloquear($id_estante)
	{
		$registros = $this->bd->Consulta("update estante set estado=0 where id_estante=$id_estante");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_estante)
	{
		$registros = $this->bd->Consulta("update estante set estado=1 where id_estante=$id_estante");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_estante)
	{
		$registros = $this->bd->Consulta("delete from estante where id_estante=$id_caja");
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