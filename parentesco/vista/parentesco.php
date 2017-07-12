<?php 
/**
  * Nombre: parentesco.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los parentesco
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
    <title>PARENTESCO</title>
  </head>
<body>
<div class="">
  <form id="form" method="post" class="form-horizontal" action="../controlador/parentesco_registro.php">
    <div class=" panel-heading">
      <div class="margen-bajo panel-title text-center ">
          <h1 class="title">Parentesco</h1>
        <hr />
      </div>
    </div>  
    <div class="row main-login main-center main">
      <div class="col-lg-10">                  
        <div class="form-group">                
          <div class="row"> 
            <div class="form-group validacionn">
              <label class="col-lg-4 control-label text-right">Parentesco</label>
              <div class="col-lg-6">
                <div class="input-group">  
                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control text-uppercase" name="empresacel" id="empresacel" placeholder="Nombre de la empresa celular" data-bv-trigger="keyup" required data-bv-notempty-message="El nombre de la empresa celular no puede estar vacio" />
                  <div id="Validar"></div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-12">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-12">
                <div class="col-lg-3 text-center margen-bajo col-lg-offset-4">
                  <button type="submit" class="btn btn-success btn-block btn-lg" name="signup" value="Sign up">Enviar</button>
                </div>
                <div class="col-lg-3 text-left">
                  <button type="button" onClick="document.location.href='../controlador/consulta_parentesco.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
              </div>
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
  $('#empresacel').blur(function(){
    $('#Validar').html('<img src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>imagenes/loader.gif" alt="" />').fadeOut(1000);
    var empresacel = $(this).val();   
    var dataString = 'empresacel=' + empresacel;
    $.ajax({
            type: "POST",
            url: "../controlador/parentesco_disponible.php",
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
  $descripcion_tabla = "rrh_parent";
  $descripcion_ejecucion = "parentesco.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['idusuarios$nom_proyec'].'...'."ENTRO CARGA DE PARENTESCO";
  $objeto_bitacora = "SOLICITAR DATOS DEL PARENTESCO";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
