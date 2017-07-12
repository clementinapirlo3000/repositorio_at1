<?php 
/**
  * Nombre: consulta_empleados.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de empleados del sistema
  *
**/
require ("../../presentacion/vista/cabeza_consulta.php");
$eliminar_get = count($_GET);
if ($eliminar_get > 0)
{
  $id_del_usuario2  = $_GET['id'];
  $empleados_objeto2_conexion_BD  = new clase_conecta_mysql;
  $insertar_usuario = "UPDATE rrh_usuar SET fk_id_rrh_estat = 2 WHERE id_rrh_usuar  = $id_del_usuario2";
  $empleados_objeto2_conexion_BD->ejecutar_sql($insertar_usuario);
}
$select_objeto_conexion_BD  = new clase_conecta_postgresql;
 $consulta_zopos_existente= "SELECT * FROM rrh_emple usu, rrh_codce cod WHERE usu.fk_id_rrh_codce = cod.id_rrh_codce AND usu.fk_id_rrh_estat != 2";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();
?>
<title>EMPLEADOS</title>
</head>
<body>
<div class="container">
<h2>EMPLEADOS</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='../vista/empleados.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta$nom_proyec']; ?>menu/vista/menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>C&#233;dula</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Tel.Celular</th>
          <th>E-mail</th>
          <th>Opci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>C&#233;dula</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Tel.Celular</th>
          <th>E-mail</th>
          <th>Opci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['emp_cedul']."</td>
          <td>".$registro_zpos['emp_nomb1'].' '.$registro_zpos['usu_nomb2']."</td>
          <td>".$registro_zpos['emp_apel1'].' '.$registro_zpos['usu_apel2']."</td>
          <td>".$registro_zpos['cod_celul'].'-'.$registro_zpos['usu_tecel']."</td>
          <td>".$registro_zpos['emp_email']."</td>
          <td align='center'>
            <a href='../vista/mod_empleados.php?id=$registro_zpos[id_rrh_emple]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
                </span>
              </button>
            <a href='../vista/consulta_empleados.php?id=$registro_zpos[id_rrh_emple]'>
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
  $descripcion_tabla = "empleados";
  $descripcion_ejecucion = "consulta_empleados.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."CONSULTANDO DATOS DEL EMPLEADO";
  $objeto_bitacora = "CONSULTANDO DATOS DEL EMPLEADO DEL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
