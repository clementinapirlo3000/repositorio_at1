<?php 
/**
  * Nombre: mod_estatus.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el modificar es estatus del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");

  $id_del_nivel = $_GET['id'];
  $nivel_objeto_conexion_BD  = new clase_conecta_postgresql;
  $consulta_nivel_existente = "SELECT * FROM rrh_estat WHERE id_rrh_estat = $id_del_nivel";
  $nivel_objeto_conexion_BD->ejecutar_sql($consulta_nivel_existente);
  $registro_nivel_existente = $nivel_objeto_conexion_BD->obtener_arreglo_objeto();
  $id_del_modulo        = $registro_nivel_existente->id_rrh_estat;
  $nombre_modulos       = $registro_nivel_existente->est_nombr;
  $posicion             = $registro_nivel_existente->est_descr;

  $nivel_objeto_conexion_BD->liberar_resultado();
  //echo 'liter_usuario: ',$liter_usuario;
?>
    <title>ESTATUS</title>
  </head>
<body>
<div class="">
 <form id="form" method="post" class="form-horizontal" action="../controlador/mod_estatus_registro.php">
  <input type="hidden" name="id_del_estatus" value="<?PHP echo $id_del_modulo; ?>">
  <input type="hidden" name="nombre_estatus" value="<?PHP echo $nombre_modulos; ?>">
  <input type="hidden" name="descrip_estatus" value="<?PHP echo $posicion; ?>">
  <div class=" panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Estatus de las tablas del Sistema</h1>
        <hr />
    </div>
  </div>  
  <div class="row main-login main-center main">
      <div class="col-lg-12">                   
        <div class="col-lg-12">                
          <div class="form-group">              
            <div class="row">                   
              <div class="col-lg-12"> 
                <div class="col-lg-6">
                  <label class="control-label col-lg-offset-7">Estatus</label>
                </div>
                <div class="col-lg-6 col-lg-offset-3 validacionn">            
                  <div class="">                  
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-check-square-o" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control text-uppercase" name="estatus" id="estatus" placeholder="Nombre del estatus" data-bv-trigger="keyup" required data-bv-notempty-message="El estatus no puede estar vacio" value="<?PHP echo $nombre_modulos; ?>" />
                    </div>                       
                  </div>                          
                </div>                                                      
              </div>
              <div class="col-lg-12"> 
                <div class="col-lg-6">
                  <label class="control-label col-lg-offset-7">Descripcion</label>
                </div>
                <div class="col-lg-6 col-lg-offset-3 validacionn">            
                  <div class="">                  
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control text-uppercase" name="descripcion" id="descripcion" placeholder="Descripcion del estatus" data-bv-trigger="keyup" required data-bv-notempty-message="Descripcion no puede estar vacio" value="<?PHP echo $posicion; ?>" />
                    </div>                       
                  </div>                          
                </div>                                                      
              </div>                                                                  
            </div>                             
          </div>                              
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
                <button type="button" onClick="document.location.href='../controlador/consulta_estatus.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
            </div>
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
  $descripcion_tabla = "modulos";
  $descripcion_ejecucion = "modulos.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].'...'."ENTRO MODIFICAR";
  $objeto_bitacora = "SOLICITAR DATOS DEL MODULO DEL SISTEMA";
  $datos_anteriores = "MODULO A SER MODIFICADO: ".$id_del_modulo." NOMBRE: ".$nombre_modulos;
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
