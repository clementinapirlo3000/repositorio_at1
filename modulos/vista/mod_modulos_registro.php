<?php 
/**
  * Nombre: mod_usuarios_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el Modificar los modulos del sistema
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
$usuarios_objeto_conexion_BD  = new clase_conecta_postgresql;
$usuarios_objeto2_conexion_BD  = new clase_conecta_postgresql;
  
  $consulta_usuario_existente= "SELECT * FROM lab_usuar WHERE id_lab_usuar = $usuario_carga";
  $usuarios_objeto_conexion_BD->ejecutar_sql($consulta_usuario_existente);
  $registro_usuario_existente = $usuarios_objeto_conexion_BD->obtener_arreglo_objeto();
  $id_del_usuario       = $registro_usuario_existente->id_lab_usuar;
  $nivel_del_usuario    = $registro_usuario_existente->fk_id_lab_nivel;
  $cedula_usuario       = $registro_usuario_existente->usu_cedul;
  $nombre_del_usuario   = $registro_usuario_existente->usu_nomb1;
  $nombre2_del_usuario  = $registro_usuario_existente->usu_nomb2;
  $apellido_del_usuario = $registro_usuario_existente->usu_apel1;
  $apellido2_del_usuario= $registro_usuario_existente->usu_apel2;
  $usu_fenac_del_usuario= $registro_usuario_existente->usu_fenac;
  $id_codci_usuario     = $registro_usuario_existente->fk_id_lab_codci;
  $id_codce_usuario     = $registro_usuario_existente->fk_id_lab_codce;
  $usu_tehab_usuario    = $registro_usuario_existente->usu_tehab;
  $usu_tecel_usuario    = $registro_usuario_existente->usu_tecel;
  $login_usuario        = $registro_usuario_existente->usu_login;
  $email_usuario        = $registro_usuario_existente->usu_email;
  $liter_usuario        = $registro_usuario_existente->usu_liter;
  $direc_usuario        = $registro_usuario_existente->usu_direc;
  $clave_usuario        = $registro_usuario_existente->usu_clave;
  $sexo_usuario         = $registro_usuario_existente->usu_sexo;
  $zopos_usuario        = $registro_usuario_existente->fk_id_lab_zopos;
  
$usuario_actuante = 'ID: '.$usuario_carga.' '.$cedula_usuario.' '.$nombre_del_usuario.' '.$apellido_del_usuario;

$usuarios_objeto_conexion_BD->liberar_resultado();

?>
<html>
  <head>
    <title>MODULOS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Sistema desarrollado por el Departamento de Sistemas e Informática de la Corporación de Salud del Estado Táchira"/>
    <meta name="keywords" content="desarrollos de sistemas informaticos a medida"/>
    <meta name="author" content="Ing. Fernando Paez Acero, Ing. Alex Castro, Ing. Carlos E. Chacón" />
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>imagenes/corposaludlogo.ico" rel="icon">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/bootstrapValidator.css" rel="stylesheet"/>
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
      <!-- Website CSS style -->
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/formulario.css" rel="stylesheet" type="text/css">
      <!-- Website Font style -->
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/iconos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Google Fonts -->
    <link href='<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/family-Passion-One.css' rel='stylesheet' type='text/css'>
    <link href='<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/family-Oxygen.css' rel='stylesheet' type='text/css'>
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/highlight.css" rel="stylesheet">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/base.css" rel="stylesheet">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/custom.css" rel="stylesheet">
  </head>
<body>
<?PHP
$modulo_despues  = $_POST['modulo'];
$id_del_modulo_antes  = $_POST['id_del_modulo'];
$nombre_modulos_antes  = $_POST['nombre_modulos'];

$modulo_despues_bitacora        = $modulo_despues;
$id_del_modulo_antes_bitacora   = $id_del_modulo_antes;
$nombre_modulos_antes_bitacora  = $nombre_modulos_antes;
?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">MODULOS</h1>
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
  $insertar_usuario = "UPDATE lab_modul SET mod_nombr = '$modulo_despues', mod_posic = '0' WHERE id_lab_modul = $id_del_modulo_antes";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='consulta_modulos.php';">Modificar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta_lab']; ?>menu.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $descripcion_tabla = "usuarios";
  $descripcion_ejecucion = "usuarios_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios_lab'].' '.$_SESSION['nombre1_lab'].' '.$_SESSION['apellido1_lab'].'...'."MODIFICO MODULO REGISTRO";
  $objeto_bitacora = "INSERTO LOS DATOS DEL MODULO";
  $datos_anteriores = "MODULOS: ".$nombre_modulos_antes;
  $datos_nuevos = "MODULOS: ".$modulo_despues;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
