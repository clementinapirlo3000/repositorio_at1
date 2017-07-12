<?php 
/**
  * Nombre: mod_profes.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de profesiones del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>NIVELES</title>
<?php
$select_objeto_conexion_BD  = new clase_conecta_postgresql;
$id_del_nivel = $_GET['id'];
$clase_objeto_conexion_BD = new clase_conecta_postgresql;
$consulta_nivel_existente = "SELECT * FROM pro_profe pro, pro_tprof tpr WHERE pro.fk_id_pro_tprof = tpr.id_pro_tprof AND id_pro_profe = $id_del_nivel";
$clase_objeto_conexion_BD->ejecutar_sql($consulta_nivel_existente);
$registro_nivel_existente = $clase_objeto_conexion_BD->obtener_arreglo_objeto();
$id_pro_profe             = $registro_nivel_existente->id_pro_profe;
$id_del_tprof             = $registro_nivel_existente->id_pro_tprof;
$pro_nombre               = $registro_nivel_existente->pro_nombre;
$tprof_del_descr          = $registro_nivel_existente->tpr_nombre;
$literal_tprof            = $registro_nivel_existente->tpr_literal;


$clase_objeto_conexion_BD->liberar_resultado();
?>

</head>
<body>
<div class="">
<form id="defaultForm" method="post" class="form-horizontal" action="mod_profes_registro.php">
<input type="hidden" name="id" value="<?PHP echo $id_pro_profe; ?>">
<input type="hidden" name="pro_nombre_antes" value="<?PHP echo $pro_nombre; ?>">
<input type="hidden" name="tprof_antes" value="<?PHP echo $tprof_del_descr; ?>">
<input type="hidden" name="literal_tprof_antes" value="<?PHP echo $literal_tprof; ?>">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Tipo de Profesiones</h1>
    </div>
  </div>

<div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <label class="col-lg-6 control-label text-right">Profesi&#243;n</label>
          <div class="col-lg-6">
            <div class="input-group validacionn">  
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control text-uppercase" name="profe" id="profe" value="<?PHP echo $pro_nombre; ?>" placeholder="Profesi&#243;n" data-bv-trigger="keyup" required data-bv-notempty-message="Nombre de la Profesi&#243;n no puede estar vacio" />
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- La validacion del tipo de profesion SI puede estar vacio -->
    <div class="col-lg-6">            
 
        <div class="col-lg-12">
          <label class="control-label">Tipo de Profesi&#243;n</label>
        </div>         
          <div class="input-group">    
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span> 
            <select name="literal" id="literal" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                <option value="">#</option>
                  <?php 
                $consulta_select_existente="SELECT * FROM pro_tprof ORDER BY tpr_nombre";
                $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                while($registro_select_existente = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
              ?>
                <option value="<?= $id_pro_profe = $registro_select_existente->id_pro_tprof; ?>" 
              <?php 
                if($registro_select_existente->tpr_nombre==$tprof_del_descr){ ?> selected <?php } ?> > 
                <?= $registro_select_existente->tpr_nombre; ?>
              </option>
                    <?php } $select_objeto_conexion_BD->liberar_resultado();?>
              </select>
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
              <button type="button" onClick="document.location.href='consulta_profes.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $descripcion_tabla = "pro_gusua";
  $descripcion_ejecucion = "mod_profes.php";
  $movimiento_bitacora = $usuario_actuante.'...'."ENTRO MODIFICAR PROFESIONES";
  $objeto_bitacora = "SOLICITAR DATOS DE PROFESIONES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//

?>
