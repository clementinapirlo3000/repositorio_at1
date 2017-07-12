<?php 
/**
  * Nombre: eli_modulos.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el eliminar los modulos del sistema de forma logica
  *
**/
require ("../../session.php");
$nivel = $_SESSION['nivelesacceso_lab'];

//include("../../metodosGenericos.php");
//escupe($_POST);
//escupe($_GET);

$login          = $_SESSION['login_lab'];
$usuario_carga  = $_SESSION['idusuarios_lab'];
$cedula_carga   = $_SESSION['cedula_lab'];

require ("../../conexion/controlador/clase_bd_conexion_postgres.php");
$usuarios_objeto2_conexion_BD  = new clase_conecta_postgresql;
$usuarios_objeto_conexion_BD  = new clase_conecta_postgresql;

$id_del_usuario2  = $_GET['id'];
$id_del_usuario  = $id_del_usuario2;

$insertar_usuario = "UPDATE lab_modul SET mod_estat = 'I' WHERE id_lab_modul  = $id_del_usuario2 ";
$usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
$usuarios_objeto2_conexion_BD->liberar_resultado();

header("Location: consulta_usuario.php");

$consulta_usuario_existente= "SELECT * FROM lab_modul WHERE id_lab_modul = $id_del_usuario";
$usuarios_objeto_conexion_BD->ejecutar_sql($consulta_usuario_existente);
$registro_usuario_existente = $usuarios_objeto_conexion_BD->obtener_arreglo_objeto();
$id_del_usuario3 	= $registro_usuario_existente->id_lab_modul;
$modulo_eliminado	= $registro_usuario_existente->mod_nombr;
$nombre_del_usuario	= $registro_usuario_existente->mod_posic;

$usuarios_objeto_conexion_BD->liberar_resultado();

////// Se registra en la bitacora la acción del usuario             //
require ("../../bitacora.php");
$descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
$descripcion_tabla = "modulos";
$descripcion_ejecucion = "eli_modulos.php";
$movimiento_bitacora = $_SESSION['idusuarios_lab'].' '.$_SESSION['nombre1_lab'].' '.$_SESSION['apellido1_lab'].'...'."ENTRO A ELIMINAR MODULOS";
$objeto_bitacora = "MODULOS EL USUARIO";
$datos_anteriores = "NO APLICA";
$datos_nuevos = "MODULO ELIMINADO: ".$modulo_eliminado;
movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
