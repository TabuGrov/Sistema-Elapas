<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class trabajador
{
	public $id_trabajador;
	public $documento;
	public $nombre;
	public $correo;
	public $direccion;
	public $cargo;
	public $unidad;
	public $jefatura;
	public $estado;
	private $bd;

	function trabajador()
	{
		$this->bd = new conexion();
	}
	function registrar_trabajador($documento, $nombre, $correo, $direccion, $cargo, $unidad, $jefatura ,$estado)
	{
		$registros = $this->bd->Consulta("insert into trabajador values('', '$documento', '$nombre', '$correo', '$direccion', '$cargo', '$unidad','$jefatura', '$estado')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_trabajador($id_trabajador, $documento, $nombre, $correo, $direccion, $cargo, $unidad, $jefatura)
	{
		$registros = $this->bd->Consulta("update trabajador set documento='$documento', nombre='$nombre', correo='$correo', direccion='$direccion', cargo='$cargo', unidad='$unidad', jefatura='$jefatura'  where id_trabajador=$id_trabajador");
		// $registros = $this->bd->Consulta("update trabajador set documento='333', nombre='loren', correo='asdas', direccion='ggf' where id_trabajador=10");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function retirar_trabajador($id_trabajador)
	{
		$registros = $this->bd->Consulta("update trabajador set estado=0 where id_trabajador=$id_trabajador");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function eliminar($id_trabajador)
	{
		$registros = $this->bd->Consulta("delete from trabajador where id_trabajador=$id_trabajador ");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_trabajador($id_trabajador)
	{
		$registros = $this->bd->Consulta("select * from trabajador where id_trabajador=$id_trabajador");
		$registro = $this->bd->getFila($registros);

		$this->id_trabajador = $registro[id_trabajador];
		$this->documento = $registro[documento];
		$this->nombre = $registro[nombre];
		$this->correo = $registro[correo];
		$this->direccion = $registro[direccion];
		$this->cargo = $cargo[cargo];
		$this->unidad = $unidad[unidad];
		$this->jefatura = $jefatura[jefatura];
		$this->estado = $registro[estado];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " $criterio";
		$registros = $this->bd->Lista("select * from trabajador $where");
			return $registros;
	}
	function __destroy()
	{
		$trabajador = $this->bd->Cerrar();
	}
}
 
?>