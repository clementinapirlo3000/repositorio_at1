<?php
sleep(1);
require ("../../conexion/controlador/clase_bd_conexion_postgres.php");
$usuarios_objeto_conexion_BD  = new clase_conecta_postgresql;
if($_REQUEST)
{
	$username 	= $_REQUEST['username'];
	$consulta_usuario_existente= "select * from username_availablity where username = '".strtolower($username)."'";
  	$usuarios_objeto_conexion_BD->ejecutar_sql($consulta_usuario_existente);
  	$registro_usuario_existente = $usuarios_objeto_conexion_BD->obtener_arreglo_objeto();
  	$num_rows_zopos           = $usuarios_objeto_conexion_BD->devolver_numero_filas();
	
	if((@$num_rows_zopos) > 0) 
	{
		echo '<div id="Error">Usuario ya existente</div>';
	}
	else
	{
		echo '<div id="Success">Disponible</div>';
	}
	
}?>