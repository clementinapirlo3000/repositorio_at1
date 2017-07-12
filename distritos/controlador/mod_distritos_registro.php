<?php 
/**
  * Nombre: mod_distritos_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el Modificar los distritos
  *
**/
require ("../../presentacion/vista/cabeza.php");
//include("../../metodosGenericos.php");
//escupe($_POST);
//escupe($_GET);
?>
    <title>DISTRITOS</title>
  </head>
<body>
<?PHP
$id_del_codcel        = $_POST['id_del_codcel'];
$nombre_codcel_antes  = $_POST['nombre_codcel'];
$sector_antes_antes   = $_POST['sector_antes'];
  
$empresacel           = $_POST['empresacel'];
$descripcion          = $_POST['descripcion'];

$empresacel           =  strtoupper($empresacel);
$descripcion          =  strtoupper($descripcion);

$empresacel_bitacora_despues    = $empresacel;
$sector_bitacora_despues    = $descripcion;
$nombre_codcel_bitacoral_antes  = $nombre_codcel_antes;
$sector_antes_bitacoral_antes   = $sector_antes_antes;
?>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">DISTRITOS</h1>
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
  $insertar_usuario = "UPDATE rrh_distr SET dis_nombre = '$empresacel', dis_sector = '$descripcion' WHERE id_rrh_distr = $id_del_codcel";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='consulta_distritos.php';">Modificar Otro</button>
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
  $descripcion_tabla = "rrh_distr";
  $descripcion_ejecucion = "distritos_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."MODIFICO DISTRITOS";
  $objeto_bitacora = "INSERTO LOS DATOS DEL DISTRITOS";
  $datos_anteriores = "DISTRITOS: ".$nombre_codcel_bitacoral_antes.' '." SECTOR: ".$sector_antes_bitacoral_antes;
  $datos_nuevos = "DISTRITOS: ".$empresacel_bitacora_despues.' '." SECTOR: ".$sector_bitacora_despues;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
