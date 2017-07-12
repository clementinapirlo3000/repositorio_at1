<?php 
/**
  * Nombre: tprofes.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los tipos de profesiones del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>TIPOS PROFESIONES</title>
</head>
<body>
<div class="">
<form id="defaultForm" method="post" class="form-horizontal" action="tprofes_registro.php">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Tipos de Profesiones</h1>
    </div>
  </div>

    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <label class="col-lg-6 control-label text-right">Tipo de la Profesi&#243;n</label>
          <div class="col-lg-6">
            <div class="input-group validacionn">  
              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                <input type="text" class="form-control text-uppercase" name="tprofe" id="tprofe" placeholder="Nombre del Tipo de la Profesi&#243;n" data-bv-trigger="keyup" required data-bv-notempty-message="El Tipo de la Profesi&#243;n no puede estar vacio" />
                <div id="Validar"></div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group">
            <label class="col-lg-6 control-label text-right">Letra de la Profesi&#243;n</label>
            <div class="col-lg-2">
              <div class="input-group validacionn">  
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control text-uppercase" name="literal" id="literal" placeholder="Letra" data-bv-trigger="keyup" required data-bv-notempty-message="La letra del Tipo Profesi&#243;n no puede estar vacio" />
                  <div id="Validar2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  
    <div class="col-lg-12 validacionn">
      <div class="form-group">
        <div class="row">
          <div class="col-lg-12 validacionn">
            <div class="col-lg-2 text-center margen-bajo col-lg-offset-4">
              <button type="submit" class="btn btn-success btn-block btn-lg" name="signup" value="Sign up">Enviar</button>
            </div>
            <div class="col-lg-2 text-left">
              <button type="button" onClick="document.location.href='consulta_tprofes.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $('#tprofe').blur(function(){
    
    $('#Validar').html('<img src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>imagenes/loader.gif" alt="" />').fadeOut(1000);

    var tprofe = $(this).val();   
    var dataString = 'tprofe=' + tprofe;
    
    $.ajax({
            type: "POST",
            url: "../controlador/tprofes_disponible.php",
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
  $descripcion_tabla = "tprofe";
  $descripcion_ejecucion = "tprofes.php";
  $movimiento_bitacora = $usuario_actuante.'...'."ENTRO TIPOS DE PROFESIONES";
  $objeto_bitacora = "SOLICITAR DATOS DE TIPOS DE PROFESIONES";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//

?>
