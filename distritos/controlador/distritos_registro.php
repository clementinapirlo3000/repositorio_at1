<?php 
/**
  * Nombre: distritos_registro.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de distritos
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
    <title>DISTRITOS</title>
  </head>
<body>
<?PHP
  $empresacel = $_POST['empresacel'];
  $descripcion = $_POST['descripcion'];

  $empresacel =  strtoupper($empresacel);
  $descripcion     =  strtoupper($descripcion);

  $empresacel_bitacora  = $empresacel;
  $sector_bitacora      = $descripcion;
?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Distritos</h1>
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
  $insertar_usuario = "INSERT INTO rrh_distr (dis_nombre, dis_sector, fk_id_rrh_estat) VALUES ('$empresacel', '$descripcion', 1)";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
  $usuarios_objeto2_conexion_BD->liberar_resultado();

?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-3">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='../vista/distritos.php';">Registrar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='consulta_distritos.php.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $descripcion_tabla = "rrh_distr";
  $descripcion_ejecucion = "distritos_registro.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO AL REGISTRO DE DISTRITOS";
  $objeto_bitacora = "INSERTO LOS DATOS DISTRITOS";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = 'DISTRITOS: '.$empresacel_bitacora; 
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
