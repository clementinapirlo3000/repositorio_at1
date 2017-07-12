<?php 
/**
  * Nombre: consulta_codcel.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de codigo del celular
  *
**/
require ("../../presentacion/vista/cabeza_consulta.php");
$eliminar_get = count($_GET);
if ($eliminar_get > 0)
{
  $id_del_usuario2  = $_GET['id'];
  $usuarios_objeto2_conexion_BD  = new clase_conecta_postgresql;
  $insertar_usuario = "UPDATE rrh_codce SET fk_id_rrh_estat = 2 WHERE id_rrh_codce  = $id_del_usuario2";
  $usuarios_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
}
 $select_objeto_conexion_BD  = new clase_conecta_postgresql;
 $consulta_zopos_existente= "SELECT * FROM rrh_codce WHERE fk_id_rrh_estat != 2";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();

?>
  <title>COD-CEL</title>
</head>
<body>
<div class="container">
<h2>CODIGO CELULAR</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='../vista/codcel.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Empresa</th>
          <th>C&#243;digo</th>
          <th>Opci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Empresa</th>
          <th>C&#243;digo</th>
          <th>Opci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['cod_nombr']."</td>
          <td>".$registro_zpos['cod_celul']."</td>
          <td align='center'>
            <a href='../vista/mod_codcel.php?id=$registro_zpos[id_rrh_codce]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
                </span>
              </button>
            <a href='consulta_codcel.php?id=$registro_zpos[id_rrh_codce]'>
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
  $descripcion_tabla = "codcel";
  $descripcion_ejecucion = "consulta_codcel.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."CONSULTANDO DATOS DE LOS CODIGOS DE CELULARES";
  $objeto_bitacora = "CONSULTANDO DATOS DE LOS CODIGOS CELULARES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
