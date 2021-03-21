<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class expediente
{
	public $id_expediente;
	public $nombre_archivo;
    public $nr_fojas;
	public $codigo_catastral;
    public $observacion;
	private $bd;

	function expediente()
	{
		$this->bd = new Conexion();
	}
	function registrar_expediente($nombre_archivo, $nr_fojas, $codigo_catastral, $observacion)
	{
		$registros = $this->bd->Consulta("insert into expediente values('', '$nombre_archivo','$nr_fojas', '$codigo_catastral', '$observacion')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function get_expediente($id_expediente)
	{
		$registros = $this->bd->Consulta("select * from expediente where id_expediente=$id_expediente");
		$registro = $this->bd->getFila($registros);

		$this->id_expediente = $registro[id_expediente];
		$this->nombre_archivo = $registro[nombre_archivo];
		$this->nr_fojas = $registro[nr_fojas];
        $this->codigo_catastral = $registro[codigo_catastral];
		$this->observacion = $registro[observacion];
    }
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from expediente $where");
			return $registros;
	}    
    function bloquear($id_expediente)
	{
		$registros = $this->bd->Consulta("update expediente set estado=0 where id_expediente=$id_expediente");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_expediente)
	{
		$registros = $this->bd->Consulta("update expediente set estado=1 where id_expediente=$id_expediente");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_expediente)
	{
		$registros = $this->bd->Consulta("delete from expediente where id_expediente=$id_expediente");
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