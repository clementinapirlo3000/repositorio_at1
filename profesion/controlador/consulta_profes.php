<?php 
/**
  * Nombre: consulta_profes.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de profesiones
  *
**/
require ("../../presentacion/vista/cabeza_consulta.php");

 $select_objeto_conexion_BD  = new clase_conecta_postgresql;
 $consulta_zopos_existente= "SELECT * FROM pro_profe pr, pro_tprof tp WHERE pr.fk_id_pro_tprof = tp.id_pro_tprof AND pr.fk_id_pro_estat = 1";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();
?>
<title>PROFESIONES</title>
</head>
<body>
<div class="container">
<h2>PROFESIONES</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='profes.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Profesi&#243;n</th>
          <th>Tipos Profesi&#243;n</th>
          <th>Literal</th>
          <th>Acci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Profesi&#243;n</th>
          <th>Tipos Profesi&#243;n</th>
          <th>Literal</th>
          <th>Acci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['pro_nombre']."</td>
          <td>".$registro_zpos['tpr_nombre']."</td>
          <td>".$registro_zpos['tpr_literal']."</td>
          <td align='center'>
            <a href='mod_profes.php?id=$registro_zpos[id_pro_profe]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
                </span>
              </button>
            <a href='eli_profes.php?id=$registro_zpos[id_pro_profe]'>
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
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery-1.12.4.js"></script>
<script src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>bootstrap-3.3.7/dist/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false
    } );
} );
</script>
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "pro_profe";
  $descripcion_ejecucion = "consulta_profes.php";
  $movimiento_bitacora = $usuario_actuante.'...'."ENTRO A CONSULTA DE TIPOS DE PROFESIONES";
  $objeto_bitacora = "SOLICITAR CONSULTA DE TIPOS DE PROFESIONES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
