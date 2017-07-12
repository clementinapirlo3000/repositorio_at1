<?php
date_default_timezone_set('UTC');
function movimiento($movimientos,$objeto,$antes,$ahora)
{
	$bitacora_objeto_conexion_BD = new clase_conecta_postgresql;
	$fecha="";
	$hora = date("H:i",time()); //Hora del sistema en este momento
	$diahoy=date("d"); 	//Dia de hoy numerico
	$mes=date("m"); 	//Mes Numerico
	$ano=date("Y");		//Año
	$fecha.=$ano."-".$mes."-".$diahoy;
	$idusuario=$_SESSION['idusuarios$nom_proyec'];
	/*echo "id usu ".$idusuario;
	echo "cedula ".$cedula;
	echo "nombre ".$nombre;
	echo "apellido ".$apellido;
	echo "fecha ".$fecha;
	echo "hora ".$hora;
	echo "movimientos ".$movimientos;
	echo "objeto ".$objeto;
	echo "antes ".$antes;
	echo "ahora ".$ahora;*/
	//	ya con todos los datos necesarios capturados procedo a almacenar el movimiento del usuario en la tabla respectiva  en este caso seria en la tabla movimientos
			
	$consulta_bitacora_existente= "INSERT INTO rrh_bitac (fk_id_rrh_usuar, bit_fecha, bit_hora, bit_movim, bit_objet, bit_antes, bit_ahora) VALUES ($idusuario, '$fecha', '$hora', '$movimientos', '$objeto', '$antes', '$ahora')";
	$bitacora_objeto_conexion_BD->ejecutar_sql($consulta_bitacora_existente);
	if (!($consulta_bitacora_existente)) echo "Error en la inserccion";
	exit();	
}
?>
