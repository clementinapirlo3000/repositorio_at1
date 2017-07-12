<?php 
/**
  * Nombre: empleados_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los empleados del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");

  //include("../../metodosGenericos.php");
  //escupe($_POST);
  //escupe($_GET); 

  $empleados_objeto2_conexion_BD    = new clase_conecta_postgresql;
  $select_tele_conexion_BD      = new clase_conecta_postgresql;
?>
    <title>EMPLEADO</title>
  </head>
<body>
<?PHP
$numfilas=0;

$usu_liter	=	$_POST['literal'];
$usu_cedul	=	$_POST['cedula'];
$usu_sexos	=	$_POST['sexo'];
$usu_nivel	=	$_POST['nivel'];
$usu_nomb1	=	$_POST['nombre1'];
$usu_nomb2	=	$_POST['nombre2'];
$usu_apel1	=	$_POST['apellido1'];
$usu_apel2	=	$_POST['apellido2'];
$usu_fechn	=	$_POST['dtp_input2'];
$usu_direc	=	$_POST['direccion'];
$usu_codar	=	$_POST['codarea'];
$usu_telha	=	$_POST['telhab'];
$usu_codce	=	$_POST['codcel'];
$usu_telce	=	$_POST['telcel'];
$usu_zopos	=	$_POST['zopos'];
$usu_email	=	$_POST['email'];
$usu_login	=	$_POST['login'];
$usu_passw  = $_POST['password'];
$usu_profe	=	$_POST['profesion'];

$usu_liter_bitacora	=	$usu_liter;
$usu_cedul_bitacora	=	$usu_cedul;
$usu_sexos_bitacora	=	$usu_sexos;
$usu_nivel_bitacora	=	$usu_nivel;
$usu_nomb1_bitacora	=	$usu_nomb1;
$usu_nomb2_bitacora	=	$usu_nomb2;
$usu_apel1_bitacora	=	$usu_apel1;
$usu_apel2_bitacora	=	$usu_apel2;
$usu_fechn_bitacora	=	$usu_fechn;
$usu_direc_bitacora	=	$usu_direc;
$usu_codar_bitacora	=	$usu_codar;
$usu_telha_bitacora	=	$usu_telha;
$usu_codce_bitacora	=	$usu_codce;
$usu_telce_bitacora	=	$usu_telce;
$usu_zopos_bitacora	=	$usu_zopos;
$usu_email_bitacora	=	$usu_email;
$usu_login_bitacora	=	$usu_login;
$usu_passw_bitacora = $usu_passw;
$usu_profe_bitacora	=	$usu_profe;

?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Empleados</h1>
    </div>
  </div>

  <div class="row main-login main-center main">
    <div class="col-lg-12">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group">
            <div class="list-group">
              <a class="list-group-item active">
                <h4 class="list-group-item-heading "><p class="text-center te">RESULTADO DE LA INCLUSION SATISFACTORIO..!</p></h4>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div> 
</div>  
<br>
<br>
<br>  								 					
<?php	

  $insertar_usuario = "INSERT INTO pro_usuar (fk_id_pro_gusua, usu_liter, usu_cedul, usu_sexo, usu_nomb1, usu_nomb2, usu_apel1, usu_apel2, usu_fenac, usu_direc, fk_id_pro_codci, usu_tehab, fk_id_pro_codce, usu_tecel, fk_id_pro_zopos, usu_email, usu_login, usu_clave, usu_fehoy, fk_id_pro_profe) VALUES ('1', '$usu_liter', '$usu_cedul', '$usu_sexos', '$usu_nomb1', '$usu_nomb2', '$usu_apel1', '$usu_apel2', '$usu_fechn', '$usu_direc', $usu_codar, $usu_telha, $usu_codce, $usu_telce, $usu_zopos, '$usu_email', '$usu_login', '$usu_passw', NOW(), $usu_profe)";
  $empleados_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $empleados_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-3">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='empleados.php';">Registrar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='consulta_empleados.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>vista/menu.php';" class="btn btn-warning btn-lg btn-block">Principal</button>
        </div>
      </div>
    </div> 
  </div>
</div>
</html>
</body>
<?php
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "empleados";
  $descripcion_ejecucion = "empleados_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO AL REGISTRO DE EMPLEADO";
  $objeto_bitacora = "INSERTO LOS DATOS EN EL EMPLEADO";
  $datos_anteriores = "LITERAL: ".$usu_liter_bitacora." CEDULA: ".$usu_cedul_bitacora." NOMBRE1: ".$usu_nomb1_bitacora." NOMBRE2: ".$usu_nomb2_bitacora." APELLIDO1: ".$usu_apel1_bitacora." APELLIDO2: ".$usu_apel2_bitacora." SEXO: ".$usu_sexos_bitacora." FECHA NACIMIENTO: ".$usu_fechn_bitacora." DIRECCION: ".$usu_direc_bitacora." COD HAB: ".$usu_codar_bitacora." TEL HAB: ".$usu_telha_bitacora." COD CEL: ".$usu_codce_bitacora." TEL CEL: ".$usu_telce_bitacora." ZONA POSTAL: ".$usu_zopos_bitacora." EMAIL: ".$usu_email_bitacora." LOGIN: ".$usu_login_bitacora." PASS: ".$usu_passw_bitacora." PROFESION: ".$usu_profe_bitacora;
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>