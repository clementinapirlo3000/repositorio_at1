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
require ("../../presentacion/vista/cabeza.php");
//include("../../metodosGenericos.php");
//escupe($_POST);
//escupe($_GET);
?>
    <title>COD-CEL</title>
  </head>
<body>
<?PHP
$id_del_codcel        = $_POST['id_del_codcel'];
$nombre_codcel_antes  = $_POST['nombre_codcel'];
$codcel_antes         = $_POST['codcel'];
  
$empresacel           = $_POST['empresacel'];
$numerocel            = $_POST['numerocel'];
$empresacel           =  strtoupper($empresacel);

$empresacel_bitacora_despues    = $empresacel;
$numerocel_bitacora_despues     = $numerocel;
$nombre_codcel_bitacoral_antes  = $nombre_codcel_antes;
$codcel_antes_bitacoral_antes   = $codcel_antes;
?>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">C&#243;digos Celulares</h1>
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
  $insertar_usuario = "UPDATE rrh_codce SET cod_nombr = '$empresacel', cod_celul = '$numerocel' WHERE id_rrh_codce = $id_del_codcel";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='consulta_codcel.php';">Modificar Otro</button>
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
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "lab_codcel";
  $descripcion_ejecucion = "codcel_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."MODIFICO CODIGO CELULAR";
  $objeto_bitacora = "INSERTO LOS DATOS DEL CODIGO CELULAR";
  $datos_anteriores = "EMPRESA: ".$nombre_codcel_bitacoral_antes." "." CODIGO: ".$codcel_antes_bitacoral_antes;
  $datos_nuevos = "EMPRESA: ".$empresacel_bitacora_despues." "." CODIGO: ".$numerocel_bitacora_despues;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
