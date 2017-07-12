<?php
require ("../../conexion/controlador/clase_bd_conexion_postgres.php");
class selects extends clase_conecta_postgresql
{
	var $code = "";
	
	function cargarPaises()
	{
		$consulta = parent::ejecutar_sql("SELECT name FROM country ORDER BY name ASC");
		$num_total_registros = parent::devolver_numero_filas($consulta);
		if($num_total_registros>0)
		{
			$paises = array();
			while($pais = parent::obtener_arreglo_asociado($consulta))
			{
				$code = $pais["name"];
				$name = $pais["name"];				
				$paises[$code]=$name;
			}
			return $paises;
		}
		else
		{
			return false;
		}
	}
	function cargarEstados()
	{
		$consulta = parent::ejecutar_sql("SELECT Name FROM province WHERE Country = '".$this->code."'");
		$num_total_registros = parent::devolver_numero_filas($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::obtener_arreglo_asociado($consulta))
			{
				$name = $estado["Name"];				
				$estados[$name]=$name;
			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
		
	function cargarCiudades()
	{
		$consulta = parent::ejecutar_sql("SELECT Name FROM city WHERE Province = '".$this->code."'");
		$num_total_registros = parent::devolver_numero_filas($consulta);
		if($num_total_registros>0)
		{
			$ciudades = array();
			while($ciudad = parent::obtener_arreglo_asociado($consulta))
			{
				$name = $ciudad["Name"];				
				$ciudades[$name]=$name;
			}
			return $ciudades;
		}
		else
		{
			return false;
		}
	}		
}
?>