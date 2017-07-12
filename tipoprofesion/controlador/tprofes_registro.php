<?php 
/**
  * Nombre: niveles_registro.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los tipo de profesion del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>NIVELES</title>
  </head>
<body>
<?PHP
$numfilas=0;

$usu_nivel         =  $_POST['tprofe'];
$literal  	       =	$_POST['literal'];
$usu_nivel         =  strtoupper($usu_nivel);
$literal           =  strtoupper($literal);
$usu_nivel_bitacora = $usu_nivel;
$literal_bitacora	  = $literal;

?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Tipo Profesi&#243;n</h1>
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
$usuarios_objeto2_conexion_BD    = new clase_conecta_postgresql;
  $insertar_usuario = "INSERT INTO rrh_tprof (tpr_nombre, tpr_literal, fk_id_rrh_estat) VALUES ('$usu_nivel', '$literal', 1)";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado(); 
?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-3">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='tprofes.php';">Registrar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='consulta_tprofes.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu.php';" class="btn btn-warning btn-lg btn-block">Principal</button>
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
  $descripcion_ejecucion = "tprof_registro.php";
  $movimiento_bitacora = $usuario_actuante.'...'."GUARDAR DATOS DE TIPOS DE PROFESIONES AL SISTEMA";
  $objeto_bitacora = "GUARDAR DATOS DE TIPOS DE PROFESIONES AL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "TIPOS DE PROFESIONES: ".$usu_nivel_bitacora." LETRA: ".$literal_bitacora;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
