<!--/**
  * Nombre: menu.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso al menu del sistema
  *
*/-->
<?php 
require ("../../presentacion/vista/cabeza.php");

  //include("metodosGenericos.php");
  //escupe($_POST);
  //escupe($_GET);
 
?>
<title>MENU <?PHP echo $_SESSION['nombre_proyecto']; ?></title>

</head> 
<body>
<div class="bs-example">
	<nav class="navbar navbar-default" role="navigation">
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-ex1-collapse">
		  <span class="sr-only">Desplegar navegación</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="http://www.corposaludtachira.gob.ve">SINAPRO_<?PHP echo $_SESSION['nombre_proyecto']; ?></a>
	  </div>
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
		  <li class="dropdown">
			<a href="#cargas" class="dropdown-toggle" data-toggle="dropdown">
			  Cargas <b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			  <li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>niveles/controlador/consulta_niveles.php">Niveles de Acceso</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>usuarios/controlador/consulta_usuario.php">Usuarios Sistema</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>empleados/controlador/consulta_empleados.php">Empleados</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>/modulos/controlador/consulta_modulos.php">Modulos</a></li>
					<li><a href="#Reporte3">Asigna Modulos</a></li>
					<!--<li><a href="#Reporte3">Zona Postal</a></li>-->
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>codcel/controlador/consulta_codcel.php">Cod.Celular</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>estatus/controlador/consulta_estatus.php">Estatus</a></li>
					<!--<li><a href="#Reporte3">Cod.Ciudad</a></li>-->
					<li role="separator" class="divider"></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>tipoprofesion/controlador/consulta_tprofes.php">Tipo Profesi&#243;n</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>profesion/controlador/consulta_profes.php">Profesi&#243;n</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>parentesco/controlador/consulta_parentesco.php">Parentesco</a></li>
					<!-- <li><a href="#Reporte3">N.Educaci&oacute;n</a></li> -->
					<!--<li><a href="#Reporte3">Nacionalidad</a></li>-->
					<!-- <li><a href="#Reporte3">Gestaci&oacute;n</a></li> -->
					<li role="separator" class="divider"></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>establecimientos/controlador/consulta_establecimientos.php">Establecimientos</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>distritos/controlador/consulta_distritos.php">Distritos</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>distritos/controlador/consulta_distritos.php">Ambulatorios</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>distritos/controlador/consulta_distritos.php">Tipos Ambulato</a></li>
					<li><a href="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>distritos/controlador/consulta_distritos.php">Tipo Hospital</a></li>
					<!-- <li role="separator" class="divider"></li> -->
					<!-- <li><a href="#Reporte3">Bioanalista</a></li> -->
					<!-- <li><a href="#Reporte3">Lab.Internos</a></li> -->
					<!-- <li><a href="#Reporte3">Lab.Externo</a></li> -->
					<!-- <li><a href="#Reporte3">Examenes</a></li> -->
					<li role="separator" class="divider"></li>
					<li><a href="#Reporte3">Pa&iacute;s</a></li>
					<li><a href="#Reporte3">Provincia</a></li>
					<li><a href="#Reporte3">Ciudad</a></li>
					<li><a href="#Reporte3">Regi&oacute;n</a></li>
					<li><a href="#Reporte3">Estado</a></li>
					<li><a href="#Reporte3">Municipio</a></li>
					<li><a href="#Reporte3">Parroquia</a></li> 
			</ul>
		  </li>
		  <li class="dropdown">
			<a href="#reportes" class="dropdown-toggle" data-toggle="dropdown">
			  Reportes <b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			  <li><a href="#Reporte1">Niveles de Acceso</a></li>
					<li><a href="#Reporte1">Reporte1</a></li>
					<li><a href="#Reporte2">Reporte2</a></li>
					<li><a href="#Reporte3">Reporte3</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">Separador1</li>
					<li><a href="#Separador1">Separador1</a></li>
					<li><a href="#Separador2">Separador2</a></li>
			</ul>
		  </li>
		  <li class="active"><a href="#">Enlace #1</a></li>
		  <li><a href="#">Enlace #2</a></li>
		</ul>	 
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Buscar">
			</div>
			<button type="submit" class="btn btn-default">Enviar</button>
		</form>
	  </div>
	</nav>
</div>
<div class="container">
	<div class="jumbotron">
		<!--<h3 class="text-primary">(...SINAPRO...)</h3>-->
		<center class="">
		<h5><p class="text-primary">Sistema - Integrado - Automatización de Procesos</p>
		<p class="text-success"><?PHP echo $_SESSION['nombre_proyecto']; ?></p>
		<p class="text-primary">Corporación de Salud del Estado Táchira</h5></p>
		<p class="text-warning"><h2>Departamento de Sistemas e Informática</h2></p>
		<br>
		</center>
		<br>
		<p class="text-warning"><h6><small><strong>Desarrollado por: Ing.</strong><em> Fernando Páez</em> -- <strong>Ing.</strong><em> Alex Castro</em> -- <strong>Ing.</strong><em> Eduardo Chacón</em></small></h6></p>
		<p class="text-warning"><h6><small><strong>T.S.U.</strong><em> Antonio Tortorella</em> -- <strong>Ing.</strong><em> Cecil Bautista</em></small></h6></p>
	</div>
</div>
<?PHP require ("../../presentacion/vista/pie.php"); ?>
</body>
</html>                                   
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "menu";
  $descripcion_ejecucion = "menu.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO AL MENU PRNCIPAL";
  $objeto_bitacora = "SOLICITAR NAVEGACION MENU DEL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
if (!empty($_GET['bandera_entrada']))
{ 
	$bandera_entrada = $_GET['bandera_entrada'];
	if ($bandera_entrada == 1)
	{
	  include ("cIP.php");
	}
}
$usuarios_objeto_conexion_BD->cerrar_conexion();

?>
