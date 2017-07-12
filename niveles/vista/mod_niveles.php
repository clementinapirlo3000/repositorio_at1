<?php 
/**
  * Nombre: niveles_registro.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los niveles_acceso del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>NIVELES</title>
<?php

$id_del_nivel = $_GET['id'];
$nivel_objeto_conexion_BD    = new clase_conecta_postgresql;
$consulta_nivel_existente = "SELECT * FROM rrh_gusua WHERE id_rrh_gusua = $id_del_nivel";
$nivel_objeto_conexion_BD->ejecutar_sql($consulta_nivel_existente);
$registro_nivel_existente = $nivel_objeto_conexion_BD->obtener_arreglo_objeto();
$id_del_nivelacceso       = $registro_nivel_existente->id_rrh_gusua;
$nivel_del_descr          = $registro_nivel_existente->gus_obser;
$nombre_del_nivel         = $registro_nivel_existente->gus_descr;
$color_del_nivel          = $registro_nivel_existente->gus_color;
$estatus_del_nivel        = $registro_nivel_existente->fk_id_rrh_estat;

$nivel_objeto_conexion_BD->liberar_resultado();
?>

</head>
<body>
<div class="">
<form id="defaultForm" method="post" class="form-horizontal" action="../controlador/mod_niveles_registro.php">
<input type="hidden" name="id" value="<?PHP echo $id_del_nivelacceso; ?>">
<input type="hidden" name="observacion_antes" value="<?PHP echo $nivel_del_descr; ?>">
<input type="hidden" name="descripcion_antes" value="<?PHP echo $nombre_del_nivel; ?>">
<input type="hidden" name="color_antes" value="<?PHP echo $color_del_nivel; ?>">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Niveles de Acceso</h1>
    </div>
  </div>

  <div class="row main-login main-center main">
    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group validacionn">
            <label class="col-lg-6 control-label text-right">Nombre del Nivel</label>
            <div class="col-lg-6">
                <input type="text" class="form-control text-uppercase" name="nivel" value="<?PHP echo $nombre_del_nivel; ?>" placeholder="Nombre del Nivel de Acceso" data-bv-trigger="keyup" required data-bv-notempty-message="El nivel de acceso no puede estar vacio" />
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group">
            <label class="col-lg-6 control-label">Color para el Nivel</label>
            <div class="col-lg-6">
              <input class="form-control" name="color" type="color" required data-bv-hexcolor-message="El codigo del Color no es valido" value=<?PHP echo $color_del_nivel; ?> />
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="col-lg-10">                  
      <div class="form-group">               
        <div class="row"> 
          <div class="form-group validacionn">
            <label class="col-lg-6 control-label has-error">Descripci&#243;n</label>
            <div class="col-lg-6">
              <textarea required class="form-control text-uppercase" name="descripcion" rows="5" data-bv-stringlength data-bv-stringlength-max="600" data-bv-stringlength-message="La descripci&oacute;,n debe tener menos de 600 caracteres" ><?PHP echo $nivel_del_descr; ?></textarea>
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
              <button type="button" onClick="document.location.href='../controlador/consulta_niveles.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#defaultForm').bootstrapValidator();
    });
</script>
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "rrh_gusua";
  $descripcion_ejecucion = "niveles_acceso.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO MODIFICAR NIVELES DE ACCESO";
  $objeto_bitacora = "SOLICITAR DATOS DE NIVELES DE ACCESO";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//

?>
