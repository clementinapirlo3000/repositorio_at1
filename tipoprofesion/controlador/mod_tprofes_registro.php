<?php 
/**
  * Nombre: mod_niveles_registro.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los tipo de profesion del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>NIVELES</title>  </head>
<body>
<?PHP
$numfilas=0;

$registro           = $_POST['id'];
$descripcion_antes  = $_POST['descripcion_antes'];
$literal_tprof_antes= $_POST['literal_tprof'];

$descripcion_antes  =  strtoupper($descripcion_antes);
$literal_tprof_antes=  strtoupper($literal_tprof_antes);

$tprofe_despues	    =	$_POST['tprofe'];
$literal_despues    =	$_POST['literal'];

$tprofe_despues     =  strtoupper($tprofe_despues);
$literal_despues    =  strtoupper($literal_despues);

$descripcion_antes_bitacora     = $descripcion_antes;
$literal_tprof_antes_bitacora   = $literal_tprof_antes;
$ttprofe_despues_bitacora	      = $tprofe_despues;
$literal_despues_bitacora	      = $literal_despues;

?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Tipo de Profesiones</h1>
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
			 					
$usuarios_objeto2_conexion_BD      = new clase_conecta_postgresql;
$insertar_usuario = "UPDATE rrh_tprof SET tpr_nombre = '$tprofe_despues', tpr_literal = '$literal_despues' WHERE id_rrh_tprof = $registro";
$usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
$usuarios_objeto2_conexion_BD->liberar_resultado();
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='consulta_tprofes.php';">Modificar Otro</button>
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
  $descripcion_tabla = "pro_tprof";
  $descripcion_ejecucion = "mod_tprofes_registro.php";
  $movimiento_bitacora = $usuario_actuante.'...'."GUARDAR DATOS DE TIPOS DE PROFESION AL SISTEMA";
  $objeto_bitacora = "GUARDAR DATOS DE TIPOS DE PROFESIONES AL SISTEMA";
  $datos_anteriores = "TIPO DE PROFESION: ".$descripcion_antes." LETRA DE LA PROFESION: ".$literal_tprof_antes;
  $datos_nuevos = "TIPO DE PROFESION: ".$tprofe_despues." LETRA DE LA PROFESION: ".$literal_despues;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>