<?php 
/**
  * Nombre: consulta_niveles.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de tipos de profesiones
  *
**/
require ("../../presentacion/vista/cabeza_consulta.php");

 $select_objeto_conexion_BD  = new clase_conecta_postgresql;
 $consulta_zopos_existente= "SELECT * FROM rrh_tprof WHERE fk_id_rrh_estat = 1";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();
?>
<title>TIPOS PROFESIONES</title>
</head>
<body>
<div class="container">
<h2>TIPOS PROFESIONES</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='tprofes.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Tipos Profesi&#243;n</th>
          <th>Literal</th>
          <th>Acci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Tipos Profesi&#243;n</th>
          <th>Literal</th>
          <th>Acci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['tpr_nombre']."</td>
          <td>".$registro_zpos['tpr_literal']."</td>
          <td align='center'>
            <a href='../vista/mod_tprofes.php?id=$registro_zpos[id_rrh_tprof]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
                </span>
              </button>
            <a href='consulta_tprofes.php?id=$registro_zpos[id_rrh_tprof]'>
              <button type='button' class='btn btn-danger btn-xs'>
                <span class='input-group' id='basic-addon1'>
                  <i class='fa fa-minus-circle fa-lg' aria-hidden='true'></i>
                </span>
              </button>
          </td>
        </tr>"; 
      } ?>  
    </tbody>
  </table>
</fieldset>
</form>
</div>
</div>
<?PHP require ("../../presentacion/vista/pie.php"); ?>
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "pro_tprof";
  $descripcion_ejecucion = "consulta_tprofes.php";
  $movimiento_bitacora = $usuario_actuante.'...'."ENTRO A CONSULTA DE TIPOS DE PROFESIONES";
  $objeto_bitacora = "SOLICITAR CONSULTA DE TIPOS DE PROFESIONES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
