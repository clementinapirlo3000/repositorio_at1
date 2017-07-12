<?php 
/**
  * Nombre: mod_estatus_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para Modificar los estatus del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");

//include("../../metodosGenericos.php");
//escupe($_POST);
//escupe($_GET);
?>
    <title>ESTATUS</title>
  </head>
<body>
<?PHP

$estatus      = $_POST['estatus'];
$estatus      = strtoupper($estatus);
$descripcion  = $_POST['descripcion'];
$descripcion  = strtoupper($descripcion);

$descrip_estatus      = $_POST['descrip_estatus'];
$id_del_modulo_antes  = $_POST['id_del_estatus'];
$nombre_modulos_antes = $_POST['nombre_estatus'];

$descripcion_antes_bitacora     = $descrip_estatus;
$id_del_estatus_antes_bitacora  = $id_del_modulo_antes;
$nombre_estatus_antes_bitacora  = $nombre_modulos_antes;

$estatus_despues_bitacora       = $estatus;
$descripcion_despues_bitacora   = $descripcion;
?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">ESTATUS</h1>
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
  $usuarios_objeto2_conexion_BD  = new clase_conecta_postgresql;
  $insertar_usuario = "UPDATE rrh_estat SET est_nombr = '$estatus', est_descr = '$descripcion' WHERE id_rrh_estat = $id_del_modulo_antes";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='../controlador/consulta_estatus.php';">Modificar Otro</button>
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
<?PHP require ("../../presentacion/vista/pie.php"); 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "estatus";
  $descripcion_ejecucion = "estatus_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].'...'."MODIFICO ESTATUS REGISTRO";
  $objeto_bitacora = "INSERTO LOS DATOS DEL ESTATUS";
  $datos_anteriores = "MODULOS: ".$nombre_estatus_antes_bitacora.' '." DESCRIPCION: ".$descripcion_antes_bitacora;
  $datos_nuevos = "MODULOS: ".$estatus_despues_bitacora.' '." DESCRIPCION: ".$descripcion_despues_bitacora;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
