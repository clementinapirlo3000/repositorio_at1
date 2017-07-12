<?php 
/**
  * Nombre: mod_modulos.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el modificar los modulos del sistema
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
  $select_objeto_conexion_BD    = new clase_conecta_postgresql;
  $nivel_objeto_conexion_BD      = new clase_conecta_postgresql;

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

  $id_del_nivel = $_GET['id'];
  $consulta_nivel_existente = "SELECT * FROM lab_modul WHERE id_lab_modul = $id_del_nivel";
  $nivel_objeto_conexion_BD->ejecutar_sql($consulta_nivel_existente);
  $registro_nivel_existente = $nivel_objeto_conexion_BD->obtener_arreglo_objeto();
  $id_del_modulo        = $registro_nivel_existente->id_lab_modul;
  $nombre_modulos       = $registro_nivel_existente->mod_nombr;
  $posicion             = $registro_nivel_existente->mod_posic;

  $nivel_objeto_conexion_BD->liberar_resultado();
  //echo 'liter_usuario: ',$liter_usuario;
?>
<!DOCTYPE html>
<html lang="en">
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
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/formulario.css" rel="stylesheet" type="text/css">
    <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/iconos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/family-Passion-One.css' rel='stylesheet' type='text/css'>
    <link href='<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/family-Oxygen.css' rel='stylesheet' type='text/css'>
  </head>
<body>
<div class="">
 <form id="form" method="post" class="form-horizontal" action="mod_modulos_registro.php">
  <input type="hidden" name="id_del_modulo" value="<?PHP echo $id_del_modulo; ?>">
  <input type="hidden" name="nombre_modulos" value="<?PHP echo $nombre_modulos; ?>">
  <div class=" panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Modulos del Sistema</h1>
        <hr />
    </div>
  </div>  
  <div class="row main-login main-center main">
    <div class="col-lg-12">                   
      <div class="col-lg-12">                
        <div class="form-group">              
          <div class="row">                   
            <div class="col-lg-12"> 
              <div class="col-lg-6">
                <label class="control-label col-lg-offset-7">Modulo</label>
              </div>
              <div class="col-lg-6 col-lg-offset-3 validacionn">            
                <div class="">                  
                  <div class="input-group">   
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-o" aria-hidden="true"></i></span> 
                    <input type="text" class="form-control" name="modulo" value="<?PHP echo $nombre_modulos; ?>" placeholder="Nombre Modulo"/>
                  </div>                       
                </div>                          
              </div>                                                      
            </div>                                                                  
          </div>                             
        </div>                              
      </div>                                 
    </div> 
    <div class="col-lg-12">
      <div class="form-group">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-2 text-center margen-bajo col-lg-offset-4">
              <button type="submit" class="btn btn-success btn-block btn-lg" name="signup" value="Sign up">Enviar</button>
            </div>
            <div class="col-lg-2 text-left">
              <button type="button" onClick="document.location.href='consulta_modulos.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
          </div>
         </div>
        </div> 
      </div>
    </div>
  </div>         
  </form>  
</div> 
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery-1.11.2.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery-latest.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/bootstrapValidator.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/validacion_sistemas.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/bootstrap-datetimepicker.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/locales/bootstrap-datetimepicker.es.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/highlight.pack.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/base.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.ui.core.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.ui.position.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.ui.autocomplete.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/cmxforms.js" type="text/javascript"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.metadata.js" type="text/javascript"></script>
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "modulos";
  $descripcion_ejecucion = "modulos.php";
  $movimiento_bitacora = $_SESSION['idusuarios_lab'].' '.$_SESSION['nombre1_lab'].' '.$_SESSION['apellido1_lab'].'...'."ENTRO MODIFICAR";
  $objeto_bitacora = "SOLICITAR DATOS DEL MODULO DEL SISTEMA";
  $datos_anteriores = "MODULO A SER MODIFICADO: ".$id_del_modulo." NOMBRE: ".$nombre_modulos;
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
