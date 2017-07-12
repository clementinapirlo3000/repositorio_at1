<?php 
/**
  * Nombre: consulta_modulos.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para la consulta de modulos del sistema
  *
**/
require ("../../session.php");

 $nivel = $_SESSION['nivelesacceso_lab'];
 $login          = $_SESSION['login_lab'];
 $usuario_carga  = $_SESSION['idusuarios_lab'];
 $cedula_carga   = $_SESSION['cedula_lab'];

 require ("../../conexion/controlador/clase_bd_conexion_postgres.php");
 $usuarios_objeto_conexion_BD  = new clase_conecta_postgresql;
 $select_objeto_conexion_BD    = new clase_conecta_postgresql;
 $select_tele_conexion_BD      = new clase_conecta_postgresql;

 $consulta_usuario_existente= "SELECT * FROM lab_usuar WHERE id_lab_usuar = $usuario_carga";
 $usuarios_objeto_conexion_BD->ejecutar_sql($consulta_usuario_existente);
 $registro_usuario_existente = $usuarios_objeto_conexion_BD->obtener_arreglo_objeto();
 $id_del_usuario       = $registro_usuario_existente->id_lab_usuar;
 $cedula_usuario       = $registro_usuario_existente->usu_cedul;
 $nombre_del_usuario   = $registro_usuario_existente->usu_nomb1;
 $nombre2_del_usuario  = $registro_usuario_existente->usu_nomb2;
 $apellido_del_usuario = $registro_usuario_existente->usu_apel1;
 $apellido2_del_usuario= $registro_usuario_existente->usu_apel2;
 $login_usuario        = $registro_usuario_existente->usu_login;
 $email_usuario        = $registro_usuario_existente->usu_email;
  
 $usuario_actuante = 'ID: '.$usuario_carga.' '.$cedula_usuario.' '.$nombre_del_usuario.' '.$apellido_del_usuario;

 $usuarios_objeto_conexion_BD->liberar_resultado();

 $consulta_zopos_existente= "SELECT * FROM lab_modul";
 $select_objeto_conexion_BD->ejecutar_sql($consulta_zopos_existente);
 $num_rows_zopos           = $select_objeto_conexion_BD->devolver_numero_filas();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta name="description" content="Sistema desarrollado por el Departamento de Sistemas e Informática de la Corporación de Salud del Estado Táchira"/>
  <meta name="keywords" content="desarrollos de sistemas informaticos a medida"/>
  <meta name="author" content="Ing. Fernando Paez Acero, Ing. Alex Castro, Ing. Carlos E. Chacón" />
  <link href="<?PHP echo $_SESSION['ruta_lab']; ?>imagenes/corposaludlogo.ico" rel="icon">
  <title>MODULOS</title>
  <link rel="stylesheet" href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/bootstrap.css"/>
  <link rel="stylesheet" href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/css/formulario.css" type="text/css">
 <link href="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/iconos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<h2>MODULOS DEL SISTEMA</h2>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='modulos.php';" class="btn btn-primary btn-xs">Agregar</button>
</div>
<div class="col-xs-1">
  <button type="button" onClick="document.location.href='<?PHP echo $_SESSION['ruta_lab']; ?>menu.php';" class="btn btn-warning btn-xs">Regresar</button>
</div>
<div class="bs-example">
<form>
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th>Modulos</th>
          <th>Opci&#243;n</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Modulos</th>
          <th>Opci&#243;n</th>
        </tr>
    </tfoot>
    <tbody> <?PHP
      while($registro_zpos =  $select_objeto_conexion_BD->obtener_arreglo())
      { echo "
        <tr>
          <td>".$registro_zpos['mod_nombr']."</td>
          <td align='center'>
            <a href='mod_modulos.php?id=$registro_zpos[id_lab_modul]'>
              <button type='button' class='btn btn-info btn-xs'>
                <span class='input-group' id='basic-addon1'>
                 <i class='fa fa-pencil fa-lg' aria-hidden='true'></i>
                </span>
              </button>
            <a href='eli_modulos.php?id=$registro_zpos[id_lab_modul]'>
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
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery-1.12.4.js"></script>
<script src="<?PHP echo $_SESSION['ruta_lab']; ?>bootstrap-3.3.7/dist/js/jquery.dataTables.js"></script>
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
  require ("../../bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "modulos";
  $descripcion_ejecucion = "consulta_modulos.php";
  $movimiento_bitacora = $_SESSION['idusuarios_lab'].' '.$_SESSION['nombre1_lab'].' '.$_SESSION['apellido1_lab'].'...'."CONSULTANDO DATOS DE LOS MODULOS";
  $objeto_bitacora = "CONSULTANDO DATOS DE LOS MODULOS DEL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
