<?php
sleep(1);
require ("../../conexion/controlador/clase_bd_conexion_postgres.php");
$usuarios_objeto_conexion_BD2  = new clase_conecta_postgresql;
if($_REQUEST)
{
	$nivel 	= $_REQUEST['nivel'];
	$consulta_usuario_existente2= "SELECT * FROM lab_nivel WHERE niv_descr = '".strtolower($nivel)."'";
  	$usuarios_objeto_conexion_BD2->ejecutar_sql($consulta_usuario_existente2);
  	$registro_usuario_existente2 = $usuarios_objeto_conexion_BD2->obtener_arreglo_objeto();
  	$num_rows_zopos2           = $usuarios_objeto_conexion_BD2->devolver_numero_filas();
	
	if((@$num_rows_zopos2) > 0) 
	{
		echo '<div id="Error">Nivel ya existente</div>';
	}
	elseif ((@$num_rows_zopos2) <= 0)
	{
		echo '<div id="Success">Vacio</div>';
	}
	else 
	{
		echo '<div id="Success">Disponible</div>';
	}
	
}?>