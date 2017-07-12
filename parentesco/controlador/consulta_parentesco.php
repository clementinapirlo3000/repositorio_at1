<?php 
/**
  * Nombre: consulta_parentesco.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de parentesco
  *
**/
require ("../../presentacion/vista/cabeza_consulta.php");
$eliminar_get = count($_GET);
if ($eliminar_get > 0)
{
  $id_del_usuario2  = $_GET['id'];
  $usuarios_objeto2_conexion_BD  = new clase_conecta_postgresql;
  $insertar_usuario = "UPDATE rrh_parent SET fk_id_rrh_estat = 2 WHERE id_rrh_parent  = $id_del_usuario2";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
}
 $select_objeto_conexion_BD  = new clase_conecta_postgresql;
 $consulta_zopos_existente= "SELECT * FROM rrh_parent WHERE fk_id_rrh_estat != 2";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();

?>
  <title>PARENTESCO</title>
</head>
<body>
<div class="container">
<h2>PARENTESCO</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='../vista/parentesco.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Parentesco</th>
          <th>Opci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Parentesco</th>
          <th>Opci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['par_nombr']."</td>
          <td align='center'>
            <a href='../vista/mod_parentesco.php?id=$registro_zpos[id_rrh_parent]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
                </span>
              </button>
            <a href='consulta_parentesco.php?id=$registro_zpos[id_rrh_parent]'>
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
  $descripcion_tabla = "rrh_parent";
  $descripcion_ejecucion = "consulta_parentesco.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."CONSULTANDO DATOS DE LOS CODIGOS DE CELULARES";
  $objeto_bitacora = "CONSULTANDO DATOS DE LOS CODIGOS CELULARES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
