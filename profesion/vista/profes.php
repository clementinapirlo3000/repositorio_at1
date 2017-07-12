<?php 
/**
  * Nombre: profes.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de las profesiones del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
$select_objeto_conexion_BD  = new clase_conecta_postgresql;
?>
<title>PROFESIONES</title>
</head>
<body>
<div class="">
<form id="defaultForm" method="post" class="form-horizontal" action="profes_registro.php">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Profesiones</h1>
    </div>
  </div>


    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <label class="col-lg-6 control-label text-right">Profesi&#243;n</label>
          <div class="col-lg-6">
            <div class="input-group validacionn">  
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control text-uppercase" name="profe" id="profe" placeholder="Profesi&#243;n" data-bv-trigger="keyup" required data-bv-notempty-message="Nombre de la Profesi&#243;n no puede estar vacio" />
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
              <select name="tprofe" id="tprofe" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                <option value="">#</option>
                  <?php 
                $consulta_select_existente="SELECT * FROM pro_tprof ORDER BY tpr_nombre";
                $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                while($registro_select_existente = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
              ?>
                <option value="<?= $id_pro_profe = $registro_select_existente->id_pro_tprof; ?>" 
              <?php 
                if($registro_select_existente->tpr_nombre==""){ ?> selected <?php } ?> > 
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
            <div class="col-lg-2 text-center margen-bajo col-lg-offset-4">
              <button type="submit" class="btn btn-success btn-block btn-lg" name="signup" value="Sign up">Enviar</button>
            </div>
            <div class="col-lg-2 text-left">
              <button type="button" onClick="document.location.href='consulta_profes.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $descripcion_tabla = "pro_profe";
  $descripcion_ejecucion = "profes.php";
  $movimiento_bitacora = $usuario_actuante.'...'."ENTRO PROFESIONES";
  $objeto_bitacora = "SOLICITAR DATOS DE PROFESIONES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//

?>
