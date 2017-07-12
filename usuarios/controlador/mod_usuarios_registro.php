<?php 
/**
  * Nombre: mod_usuarios_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el Modificar los usuarios del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");


//include("../../metodosGenericos.php");
//escupe($_POST);
//escupe($_GET);

$id_del_usuario  = $_POST['id'];
$usuarios_objeto2_conexion_BD      = new clase_conecta_postgresql;


?>
<html>
  <head>
    <title>USUARIOS</title>
  </head>
<body>
<?PHP
$numfilas=0;

$nivel_acceso_antes     = $_POST['nivel_acceso_antes'];
$cedula_usuario_antes   = $_POST['cedula_usuario_antes'];
$nombre_usuario_antes   = $_POST['nombre_usuario_antes'];
$nombre2_usuario_antes  = $_POST['nombre2_usuario_antes'];
$apellido_usuario_antes = $_POST['apellido_usuario_antes'];
$apellido2_usuario_antes= $_POST['apellido2_usuario_antes'];
$usu_fenac_antes        = $_POST['usu_fenac_antes'];
$id_codci_usuario_antes = $_POST['id_codci_usuario_antes'];
$id_codce_usuario_antes = $_POST['id_codce_usuario_antes'];
$usu_tehab_usuario_antes= $_POST['usu_tehab_usuario_antes'];
$usu_tecel_usuario_antes= $_POST['usu_tecel_usuario_antes'];
$login_usuario_antes    = $_POST['login_usuario_antes'];
$clave_usuario_antes    = $_POST['clave_usuario_antes'];
$email_usuario_antes    = $_POST['email_usuario_antes'];
$direc_usuario_antes    = $_POST['direc_usuario_antes'];
$liter_usuario_antes    = $_POST['liter_usuario_antes'];
$sexo_usuario_antes     = $_POST['sexo_usuario_antes'];
$zopos_usuario_antes    = $_POST['zopos_usuario_antes'];

$nivel_acceso_antes_bitacora     = $nivel_acceso_antes;
$cedula_usuario_antes_bitacora   = $cedula_usuario_antes;
$nombre_usuario_antes_bitacora   = $nombre_usuario_antes;
$nombre2_usuario_antes_bitacora  = $nombre2_usuario_antes;
$apellido_usuario_antes_bitacora = $apellido_usuario_antes;
$apellido2_usuario_antes_bitacora= $apellido2_usuario_antes;
$usu_fenac_antes_bitacora        = $usu_fenac_antes;
$id_codci_usuario_antes_bitacora = $id_codci_usuario_antes;
$id_codce_usuario_antes_bitacora = $id_codce_usuario_antes;
$usu_tehab_usuario_antes_bitacora= $usu_tehab_usuario_antes;
$usu_tecel_usuario_antes_bitacora= $usu_tecel_usuario_antes;
$login_usuario_antes_bitacora    = $login_usuario_antes;
$clave_usuario_antes_bitacora    = $clave_usuario_antes;
$email_usuario_antes_bitacora    = $email_usuario_antes;
$direc_usuario_antes_bitacora    = $direc_usuario_antes;
$liter_usuario_antes_bitacora    = $liter_usuario_antes;
$sexo_usuario_antes_bitacora     = $sexo_usuario_antes;
$zopos_usuario_antes_bitacora    = $zopos_usuario_antes;

$cedula_despues     = $_POST['cedula'];
$sexo_despues       = $_POST['sexo'];
$nivel_despues      = $_POST['nivel'];
$nombre1_despues    = $_POST['nombre1'];
$nombre2_despues    = $_POST['nombre2'];
$apellido1_despues  = $_POST['apellido1'];
$apellido2_despues  = $_POST['apellido2'];
$fecnac_despues     = $_POST['fecha'];
$direccion_despues  = $_POST['direccion'];
$codarea_despues    = $_POST['codarea'];
$telhab_despues     = $_POST['telhab'];
$codcel_despues     = $_POST['codcel'];
$telcel_despues     = $_POST['telcel'];
$zopos_despues      = $_POST['zopos'];
$email_despues      = $_POST['email'];
$login_despues      = $_POST['login'];
$password_despues   = $_POST['password'];
$literal_despues    = $_POST['literal'];

$cedula_despues_bitacora     = $cedula_despues;
$sexo_despues_bitacora       = $sexo_despues;
$nivel_despues_bitacora      = $nivel_despues;
$nombre1_despues_bitacora    = $nombre1_despues;
$nombre2_despues_bitacora    = $nombre2_despues;
$apellido1_despues_bitacora  = $apellido1_despues;
$apellido2_despues_bitacora  = $apellido2_despues;
$fecnac_despues_bitacora     = $fecnac_despues;
$direccion_despues_bitacora  = $direccion_despues;
$codarea_despues_bitacora    = $codarea_despues;
$telhab_despues_bitacora     = $telhab_despues;
$codcel_despues_bitacora     = $codcel_despues;
$telcel_despues_bitacora     = $telcel_despues;
$zopos_despues_bitacora      = $zopos_despues;
$email_despues_bitacora      = $email_despues;
$login_despues_bitacora      = $login_despues;
$password_despues_bitacora   = $password_despues;
$literal_despues_bitacora    = $literal_despues;

?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">USUARIOS</h1>
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
  $insertar_usuario = "UPDATE rrh_usuar SET usu_liter = '$literal_despues', usu_cedul = '$cedula_despues', usu_sexo = '$sexo_despues', usu_nomb1 = '$nombre1_despues', usu_nomb2 = '$nombre2_despues', usu_apel1 = '$apellido1_despues', usu_apel2 = '$apellido2_despues', usu_fenac = '$fecnac_despues', usu_direc = '$direccion_despues', fk_id_rrh_codci = $codarea_despues, usu_tehab = $telhab_despues, fk_id_rrh_codce = $codcel_despues, usu_tecel = $telcel_despues, fk_id_rrh_zopos = $zopos_despues, usu_email = '$email_despues', usu_login = '$login_despues', usu_clave = '$password_despues' WHERE id_rrh_usuar = $id_del_usuario";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='../controlador/consulta_usuario.php';">Modificar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
        </div>
      </div>
    </div> 
  </div>
</div>
</html>
</body>
<?php
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "usuarios";
  $descripcion_ejecucion = "usuarios_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO MODIFICAR USUARIO REGISTRO";
  $objeto_bitacora = "INSERTO LOS DATOS EN EL USUARIO";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
