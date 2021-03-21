<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class caja 
{
	public $id_caja;
	public $codigo;
	public $estado;
	public $id_estante;

	private $bd;

	function caja()
	{
		$this->bd = new Conexion();
	}
	function registrar_caja($codigo, $estaso, $id_estante)
	{
		$registros = $this->bd->Consulta("insert into caja values('', '$codigo', '$estado', '$id_estante')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_caja($id_caja, $codigo, $id_estante)
	{
	   if(empty($codigo))
			//REVISAR
            $registros = $this->bd->Consulta("update caja set  id_estante='$id_estante' where id_caja=$id_caja");
       else        
            $registros = $this->bd->Consulta("update caja set codigo='$codigo', id_estante='$id_estante' where id_caja=$id_caja");
        
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_caja($id_caja)
	{
		$registros = $this->bd->Consulta("select * from caja where id_caja=$id_caja");
		$registro = $this->bd->getFila($registros);

		$this->id_caja = $registro[id_caja];
		$this->codigo = $registro[codigo];
		$this->id_estante = $registro[id_estante];
		$this->estado = $registro[estado];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from caja $where");
			return $registros;
	}    
    function bloquear($id_caja)
	{
		$registros = $this->bd->Consulta("update caja set estado=0 where id_caja=$id_caja");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_caja)
	{
		$registros = $this->bd->Consulta("update caja set estado=1 where id_caja=$id_caja");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_caja)
	{
		$registros = $this->bd->Consulta("delete from caja where id_caja=$id_caja");
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