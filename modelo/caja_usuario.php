<?php
if(!class_exists("conexion"))
	include ("conexion.php");
class caja_usuario
{
    public $id_caja_usuario;
	public $id_caja;
	public $id_user_ex;
    public $fecha;
	private $bd;

	function caja_usuario()
	{
		$this->bd = new Conexion();
	}
	function registrar_caja_usuario($caja, $id_user_ex, $fecha)
	{
		$registros = $this->bd->Consulta("insert into caja_usuario values('', '$id_caja', '$id_user_ex', '$fecha')");
		if($this->bd->numFila_afectada()>0)
			return true;
		else
			return false;
	}
	function modificar_caja_usuario($id_caja_usuario, $id_caja, $id_user_ex)
	{
	   if(empty($fecha))
            $registros = $this->bd->Consulta("update caja_usuario set id_user_ex='$id_user_ex', id_caja='$id_caja' where id_caja_usuario=$id_caja_usuario");
       else        
            $registros = $this->bd->Consulta("update caja_usuario set id_user_ex='$id_user_ex', id_caja='$id_caja' where id_caja_usuario=$id_caja_usuario");
        
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
	function get_usuario($id_caja_usuario)
	{
		$registros = $this->bd->Consulta("select * from caja_usuario where id_caja_usuario=$id_caja_usuario");
		$registro = $this->bd->getFila($registros);

		$this->id_caja_usuario = $registro[id_caja_usuario];
		$this->id_caja = $registro[id_caja];
		$this->id_user_ex = $registro[id_user_ex];
		$this->fecha = $registro[fecha];
	}
	function get_all($criterio)
	{
		if(empty($criterio)) $where = ""; else $where = " where $criterio";
		$registros = $this->bd->Lista("select * from caja_usuario $where");
			return $registros;
	}    
    function bloquear($id_caja_usuario)
	{
		$registros = $this->bd->Consulta("update caja_usuario set estado=0 where id_caja=$id_caja");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function habilitar($id_caja_usuario)
	{
		$registros = $this->bd->Consulta("update caja_usuario set estado=1 where id_caja=$id_caja");
		if($this->bd->numFila_afectada($registros)>0)
			return true;
		else
			return false;
	}
    function eliminar($id_caja_usuario)
	{
		$registros = $this->bd->Consulta("delete from caja_usuario where id_caja_usuario=$id_caja_usuario");
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