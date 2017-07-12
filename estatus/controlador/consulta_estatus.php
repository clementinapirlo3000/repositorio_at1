<?php 
/**
  * Nombre: consulta_estatus.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de estatus del sistema
  *
**/
require ("../../presentacion/vista/cabeza_consulta.php");
$eliminar_get = count($_GET);
if ($eliminar_get > 0)
{
  $id_del_usuario2  = $_GET['id'];
  $usuarios_objeto2_conexion_BD  = new clase_conecta_postgresql;
  $insertar_usuario = "UPDATE rrh_estat SET fk_id_rrh_estat = 2 WHERE id_rrh_estat  = $id_del_usuario2";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
}
 $select_objeto_conexion_BD  = new clase_conecta_postgresql;
 $consulta_zopos_existente= "SELECT * FROM rrh_estat";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();

?>
  <title>ESTATUS</title>
</head>
<body>
<div class="container">
<h2>ESTATUS DE LAS TABLAS</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>estatus/vista/estatus.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Estatus</th>
          <th>Descripci&#243;n</th>
          <th>Opci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Estatus</th>
          <th>Descripci&#243;n</th>
          <th>Opci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['est_nombr']."</td>
          <td>".$registro_zpos['est_descr']."</td>
          <td align='center'>
            <a href='../vista/mod_estatus.php?id=$registro_zpos[id_rrh_estat]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
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
  $descripcion_tabla = "estatus";
  $descripcion_ejecucion = "consulta_estatus.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."CONSULTANDO DATOS DE LOS ESTATUS";
  $objeto_bitacora = "CONSULTANDO DATOS DE LOS ESTATUS DEL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
