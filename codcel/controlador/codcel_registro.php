<?php 
/**
  * Nombre: codcel_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de codigos celulares
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
    <title>COD-CEL</title>
  </head>
<body>
<?PHP
  $empresacel = $_POST['empresacel'];
  $numerocel	=	$_POST['numerocel'];

  $empresacel         =  strtoupper($empresacel);

  $empresacel_bitacora  = $empresacel;
  $numerocel_bitacora   =	$numerocel;
?>
<br>
<br>
<br>
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
  $usuarios_objeto2_conexion_BD    = new clase_conecta_postgresql;
  $insertar_usuario = "INSERT INTO rrh_codce (cod_nombr, cod_celul, fk_id_rrh_estat) VALUES ('$empresacel', '$numerocel', 1)";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();

?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-3">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='../vista/codcel.php';">Registrar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='consulta_codcel.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-lg btn-block">Principal</button>
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
  $descripcion_tabla = "modulos";
  $descripcion_ejecucion = "modulos_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO AL REGISTRO DE CODIGOS CELULARES";
  $objeto_bitacora = "INSERTO LOS DATOS CODIGOS CELULARES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = 'NOMBRE: '.$empresacel_bitacora." NUMERO: ".$numerocel_bitacora; 
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
