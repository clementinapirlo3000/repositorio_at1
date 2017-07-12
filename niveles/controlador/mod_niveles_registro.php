<?php 
/**
  * Nombre: mod_niveles_registro.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los niveles_registro del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>NIVELES</title>  </head>
<body>
<?PHP
$numfilas=0;

$registro           = $_POST['id'];
$observacion_antes  = $_POST['observacion_antes'];
$descripcion_antes  = $_POST['descripcion_antes'];
$color_antes        = $_POST['color_antes'];

$descripcion_antes  =  strtoupper($descripcion_antes);
$observacion_antes  =  strtoupper($observacion_antes);

$usu_nivel	       =	$_POST['nivel'];
$usu_color	       =	$_POST['color'];
$usu_descripcion	 =	$_POST['descripcion'];

$usu_nivel  =  strtoupper($usu_nivel);
$usu_descripcion  =  strtoupper($usu_descripcion);

$usu_nivel_bitacora	      = $usu_nivel;
$usu_color_bitacora	      = $usu_color;
$usu_descripcion_bitacora	= $usu_descripcion;

?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Niveles de Acceso</h1>
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
$registro           = $_POST['id'];
$observacion_antes  = $_POST['observacion_antes'];
$descripcion_antes  = $_POST['descripcion_antes'];
$color_antes        = $_POST['color_antes'];

$observacion_antes  =  strtoupper($observacion_antes);
$descripcion_antes  =  strtoupper($descripcion_antes);

$usu_nivel         =  $_POST['nivel'];
$usu_color         =  $_POST['color'];
$usu_descripcion   =  $_POST['descripcion'];	

$usu_nivel  =  strtoupper($usu_nivel);
$usu_descripcion  =  strtoupper($usu_descripcion);
					 					
$usuarios_objeto2_conexion_BD      = new clase_conecta_postgresql;
  $insertar_usuario = "UPDATE rrh_gusua SET gus_descr = '$usu_nivel', gus_obser = '$usu_descripcion', gus_color = '$usu_color' WHERE id_rrh_gusua = $registro";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='consulta_niveles.php';">Modificar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $descripcion_tabla = "rrh_gusua";
  $descripcion_ejecucion = "niveles_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."GUARDAR DATOS DE NIVELES DE ACCESO AL SISTEMA";
  $objeto_bitacora = "GUARDAR DATOS DE NIVELES DE ACCESO AL SISTEMA";
  $datos_anteriores = "NIVEL DE ACCESO: ".$descripcion_antes." COLOR DEL NIVEL ES: ".$color_antes." DESCRIPCION DEL NIVEL: ".$observacion_antes;
  $datos_nuevos = "NIVEL DE ACCESO: ".$usu_nivel_bitacora." COLOR DEL NIVEL ES: ".$usu_color_bitacora." DESCRIPCION DEL NIVEL: ".$usu_descripcion_bitacora;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>