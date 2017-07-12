<?php 
/**
  * Nombre: estatus.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los modulos del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ESTATUS</title>
  </head>
<body>
<div class="">
  <form id="form" method="post" class="form-horizontal" action="../controlador/estatus_registro.php">
    <div class=" panel-heading">
      <div class="margen-bajo panel-title text-center ">
        <h1 class="title">Estatus de las Tablas del Sistema</h1>
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
                      <input type="text" class="form-control text-uppercase" name="estatus" id="estatus" placeholder="Nombre del estatus" data-bv-trigger="keyup" required data-bv-notempty-message="El estatus no puede estar vacio"/>
                      <div id="Validar"></div>
                    </div>                       
                  </div>                          
                </div>                                                      
              </div>
              <div class="col-lg-12"> 
                <div class="col-lg-6">
                  <label class="control-label col-lg-offset-7">Descripci&#243;n</label>
                </div>
                <div class="col-lg-6 col-lg-offset-3 validacionn">            
                  <div class="">                  
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-book" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control text-uppercase" name="descripcion" id="descripcion" placeholder="Descripcion del estatus" data-bv-trigger="keyup" required data-bv-notempty-message="Descripci&#243;n no puede estar vacio"/>
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
                <button type="button" onClick="document.location.href='consulta_estatus.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
            </div>
           </div>
          </div> 
        </div>
      </div>
    </div>   
  </form>
</div>      
<?PHP require ("../../presentacion/vista/pie.php"); ?>
<script type="text/javascript">
$(document).ready(function() {  
  $('#estatus').blur(function(){
    $('#Validar').html('<img src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>imagenes/loader.gif" alt="" />').fadeOut(1000);
    var estatus = $(this).val();   
    var dataString = 'estatus='+estatus;
    $.ajax({
            type: "POST",
            url: "../controlador/estatus_disponible.php",
            data: dataString,
            success: function(data) {
        $('#Validar').fadeIn(1000).html(data);
        //alert(data);
            }
        });
    });              
});    
</script>
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "estatus";
  $descripcion_ejecucion = "estatus.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO CARGA DE ESTATUS";
  $objeto_bitacora = "SOLICITAR DATOS DEL ESTATUS DE LAS TABLAS DEL SISTEMA";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
