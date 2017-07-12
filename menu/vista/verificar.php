<?php
	session_start();
	require ("../../conexion/controlador/clase_bd_conexion_postgres.php");
	$usuarios_objeto_conexion_BD = new clase_conecta_postgresql;
	$login 				= $_POST['login'];
	$contrasenna 		= $_POST['password'];
	
	$login_bitacora		= $login;
	$clave_bitacora 	= $contrasenna;
	$consulta_usuario_existente	=	"SELECT * FROM rrh_usuar WHERE usu_login = '$login' AND usu_clave = '$contrasenna' AND fk_id_rrh_estat = '1'";
	$usuarios_objeto_conexion_BD->ejecutar_sql($consulta_usuario_existente);
	$registro_usuario_existente	= $usuarios_objeto_conexion_BD->obtener_arreglo_objeto();
	$nummero_usuario_existente	= $usuarios_objeto_conexion_BD->devolver_numero_filas();

echo "
<head>
	<title>Verificando usuario</title>
</head>
<body>";

if($nummero_usuario_existente == 0)
	{
		echo "<script> alert ('El usuario o la clave son incorrectas. Vuelva a intentarlo'); </script>";
		echo "<script languaje='Javascript'>location.href='../../index.php'</script>";
	}
else
	{
		$idusuario 		=	$registro_usuario_existente->id_rrh_usuar;
		$nivelusuario 	=	$registro_usuario_existente->fk_id_rrh_gusua;
		$cedula 		=	$registro_usuario_existente->usu_cedul;
		$nombre 		=	$registro_usuario_existente->usu_nomb1;
		$apellido 		=	$registro_usuario_existente->usu_apel1;
		$usuario 		=	$registro_usuario_existente->usu_login;
		
		$nom_proyec 	= 	'_rrhh';
		$nom_datos 	 	= 	'rrh_';

		//$_SESSION['nom_proyec']					=	$nom_proyec;
		$_SESSION['idusuarios$nom_proyec']		=	$idusuario;
		$_SESSION['cedula$nom_proyec']			=	$cedula;
		$_SESSION['nombre1$nom_proyec']			=	$nombre;
		$_SESSION['apellido1$nom_proyec']		=	$apellido;
		$_SESSION['login$nom_proyec']			=	$usuario;
		$_SESSION['nivelesacceso$nom_proyec']	=	$nivelusuario;
		$_SESSION['nom_proyec']					=	$nom_proyec;
		$_SESSION['nombre_proyecto']			=	'RECURSOS HUMANOS';
		
		echo "<script languaje='Javascript'>location.href='menu.php?bandera_entrada=1'</script>";
	}
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "verificar datos usuario";
  $descripcion_ejecucion = "verificar.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."VERIFICANDO LA ENTRADA DEL USUARIO. COLOCO EL USUARIO Y CONTRASEÑA";
  $objeto_bitacora = "SOLICITAR NAVEGACION MENU DEL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "LOGIN: ".' '.$login_bitacora;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
$usuarios_objeto_conexion_BD->cerrar_conexion();
echo "</body>";
?>