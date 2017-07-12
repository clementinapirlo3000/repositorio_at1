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
<?php

$id_del_nivel = $_GET['id'];
$clase_objeto_conexion_BD    = new clase_conecta_postgresql;
$consulta_nivel_existente = "SELECT * FROM rrh_tprof WHERE id_rrh_tprof = $id_del_nivel";
$clase_objeto_conexion_BD->ejecutar_sql($consulta_nivel_existente);
$registro_nivel_existente = $clase_objeto_conexion_BD->obtener_arreglo_objeto();
$id_del_tprof             = $registro_nivel_existente->id_rrh_tprof;
$tprof_del_descr          = $registro_nivel_existente->tpr_nombre;
$literal_tprof            = $registro_nivel_existente->tpr_literal;


$clase_objeto_conexion_BD->liberar_resultado();
?>

</head>
<body>
<div class="">
<form id="defaultForm" method="post" class="form-horizontal" action="../controlador/mod_tprofes_registro.php">
<input type="hidden" name="id" value="<?PHP echo $id_del_tprof; ?>">
<input type="hidden" name="descripcion_antes" value="<?PHP echo $tprof_del_descr; ?>">
<input type="hidden" name="literal_tprof" value="<?PHP echo $literal_tprof; ?>">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Tipo de Profesiones</h1>
    </div>
  </div>

<div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <label class="col-lg-6 control-label text-right">Tipo de la Profesi&#243;n</label>
          <div class="col-lg-6">
            <div class="input-group validacionn">  
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control text-uppercase" name="tprofe" id="tprofe" value="<?PHP echo $tprof_del_descr; ?>" placeholder="Nombre del Tipo de la Profesi&#243;n" data-bv-trigger="keyup" required data-bv-notempty-message="El Tipo de la Profesi&#243;n no puede estar vacio" />
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group">
            <label class="col-lg-6 control-label text-right">Letra de la Profesi&#243;n</label>
            <div class="col-lg-2">
              <div class="input-group validacionn">  
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control text-uppercase" name="literal" id="literal" value="<?PHP echo $literal_tprof; ?>"placeholder="Letra" data-bv-trigger="keyup" required data-bv-notempty-message="La letra del Tipo Profesi&#243;n no puede estar vacio" />
                  <div id="Validar"></div>
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
            <div class="col-lg-3 text-right"></div>
            <div class="col-lg-3 text-right">
              <button type="submit" class="btn btn-success btn-lg btn-block">Modificar</button>
            </div>
            <div class="col-lg-3 text-left">
              <button type="button" onClick="document.location.href='../controlador/consulta_tprofes.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
            </div>
            <div class="col-lg-3 text-right"></div>
          </div>
        </div> 
      </div>
    </div>
      
</div>
</form>
</div>
<?PHP require ("../../presentacion/vista/pie.php"); ?>
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "tprofe";
  $descripcion_ejecucion = "mod_tprofe.php";
  $movimiento_bitacora = $usuario_actuante.'...'."ENTRO MODIFICAR TIPO DE PROFESION";
  $objeto_bitacora = "SOLICITAR DATOS DE TIPOS DE PROFESION";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//

?>
