<?php 
/**
  * Nombre: mod_profes_registro.php
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
$registro2          = $registro;
$pro_nombre_antes   = $_POST['pro_nombre_antes'];
$literal_tprof_antes= $_POST['literal_tprof_antes'];
$tprof_antes        = $_POST['tprof_antes'];

$tprof_antes_bitacora           = $tprof_antes;
$literal_tprof_antes_bitacora   = $literal_tprof_antes;
$pro_nombre_antes_bitacora      = $pro_nombre_antes;

$tprofe_despues        =  $_POST['profe'];
$literal_despues       =  $_POST['literal'];

$tprofe_despues        =  strtoupper($tprofe_despues);

$tprofe_despues_bitacora            = $tprofe_despues;
$literal_despues_despues_bitacora   = $literal_despues;

?>
<br>
<br>
<br>
<div class="">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Profesiones</h1>
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
$insertar_usuario = "UPDATE pro_profe SET pro_nombre = '$tprofe_despues', fk_id_pro_tprof = $literal_despues WHERE id_pro_profe = $registro";
$usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
$usuarios_objeto2_conexion_BD->liberar_resultado();

?>
<div class="col-lg-12">
  <div class="form-group">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-2 text-right col-lg-offset-4">
          <button type="submit" class="btn btn-success btn-lg btn-block" onClick="document.location.href='consulta_profes.php';">Modificar Otro</button>
        </div>
        <div class="col-lg-2 text-left">
          <button type="button" onClick="document.location.href='consulta_profes.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
        </div>
      </div>
    </div> 
  </div>
</div>
</html>
</body>
<?php
$bitacora_objeto_conexion_BD  = new clase_conecta_postgresql;
$consulta_bitacora_existente= "SELECT * FROM pro_profe pro, pro_tprof tpr WHERE pro.fk_id_pro_tprof = tpr.id_pro_tprof AND id_pro_profe = $registro2";
$bitacora_objeto_conexion_BD->ejecutar_sql($consulta_bitacora_existente);
$registro_bitacora_existente = $bitacora_objeto_conexion_BD->obtener_arreglo_objeto();
$id_profe_despues  = $registro_bitacora_existente->id_pro_profe;
$id_tprofe_despues = $registro_bitacora_existente->id_pro_tprof;
$tpr_nombre        = $registro_bitacora_existente->tpr_nombre;
$tpr_literal       = $registro_bitacora_existente->tpr_literal;
$pro_nombre        = $registro_bitacora_existente->pro_nombre;

$bitacora_objeto_conexion_BD->liberar_resultado();
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "pro_profe";
  $descripcion_ejecucion = "mod_profes_registro.php";
  $movimiento_bitacora = $usuario_actuante.'...'."GUARDAR DATOS DE PROFESION AL SISTEMA";
  $objeto_bitacora = "GUARDAR DATOS DE PROFESIONES AL SISTEMA";
  $datos_anteriores = "PROFESION: ".$pro_nombre_antes_bitacora." LITERAL: ".$literal_tprof_antes_bitacora." TIPO PROFESION: ".$tprof_antes_bitacora;
  $datos_nuevos = "PROFESION: ".$tprofe_despues_bitacora." LITERAL: ".$tpr_literal." TIPO PROFESION: ".$tpr_nombre;
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>