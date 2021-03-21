<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class salida
{
	public $id_salida;
    public $hora_retorno;
    public $hora_exac_llegada;
    public $hora_salida;
    public $direccion_salida;
	public $horas_justificacion_real;
    public $motivo;
    public $observaciones;
    public $fecha;
    public $vehiculo;
    public $usuario;
    public $tipo_salida;//2
	private $bd;

	function salida()
	{
		$this->bd = new Conexion();
	}
	function registrar_salida($hora_retorno, $hora_exac_llegada, $hora_salida, $horas_justificacion_real, $direccion_salida, $motivo, $observaciones, $fecha, $vehiculo, $usuario, $tipo_salida,$estado)
	{
		$registros = $this->bd->Consulta("insert into salida values('','$hora_retorno', '$hora_exac_llegada', '$hora_salida', '$horas_justificacion_real', '$direccion_salida', '$motivo', '$observaciones', '$fecha', '$vehiculo', '$usuario', '$tipo_salida','$estado')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_salida($id_salida, $hora_exac_llegada)
	{
	   $registros = $this->bd->Consulta("update salida set hora_exac_llegada='$hora_exac_llegada' where id_salida=$id_salida");
        
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_salida($id_salida)
	{
		$registros = $this->bd->Consulta("select * from salida where id_salida=$id_salida");
		$registro = $this->bd->getFila($registros);

		$this->id_salida = $registro[id_salida];
		$this->nombre = $registro[nombre];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from salida $where");
			return $registros;
	}    
    function bloquear($id_salida)
	{
		$registros = $this->bd->Consulta("update salida set descripcion=0 where id_salida=$id_salida");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_salida)
	{
		$registros = $this->bd->Consulta("update tipo_estante set descripcion=1 where id_salida=$id_salida");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_salida)
	{
		$registros = $this->bd->Consulta("delete from salida where id_salida=$id_salida");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}    
	function modificarhora($id_salida, $hora_exac_llegada)
	{
		$registros = $this->bd->Consulta("update salida set hora_exac_llegada = '$hora_exac_llegada', estado=2 where id_salida=$id_salida");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function modificar_estado_s($id_salida, $estado)
	{
		$registros = $this->bd->Consulta("update salida set estado = '$estado' where id_salida=$id_salida");
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