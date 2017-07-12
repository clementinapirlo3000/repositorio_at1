<?php 
/**
  * Nombre: niveles_acceso.php
  * Autores: Ing: Fernando Paez Acero, Ing: Alex Castro, Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso de los niveles_acceso del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");
?>
<title>NIVELES</title>
</head>
<body>
<div class="">
<form id="defaultForm" method="post" class="form-horizontal" action="../controlador/niveles_registro.php">
  <div class="panel-heading">
    <div class="margen-bajo panel-title text-center ">
      <h1 class="title">Niveles de Acceso</h1>
    </div>
  </div>

  <div class="row main-login main-center main">
    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group validacionn">
            <label class="col-lg-6 control-label text-right">Nombre del Nivel</label>
            <div class="col-lg-6">
              <div class="input-group">  
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control text-uppercase" name="nivel" id="nivel" placeholder="Nombre del Nivel de Acceso" data-bv-trigger="keyup" required data-bv-notempty-message="El nivel de acceso no puede estar vacio" />
                  <div id="Validar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="col-lg-10">                  
      <div class="form-group">                
        <div class="row"> 
          <div class="form-group">
            <label class="col-lg-6 control-label">Color para el Nivel</label>
            <div class="col-lg-6">
              <div class="input-group">  
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                <input class="form-control" name="color" type="color" required data-bv-hexcolor-message="El codigo del Color no es valido" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="col-lg-10">                  
      <div class="form-group">               
        <div class="row"> 
          <div class="form-group validacionn">
            <label class="col-lg-6 control-label has-error">Descripci&#243;n</label>
            <div class="col-lg-6">
              <div class="input-group">  
                <span class="input-group-addon text-uppercase" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                <textarea required class="form-control text-uppercase" name="descripcion" rows="5" data-bv-stringlength data-bv-stringlength-max="600" data-bv-stringlength-message="La descripci&oacute;,n debe tener menos de 600 caracteres"></textarea>
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
              <button type="button" onClick="document.location.href='../controlador/consulta_niveles.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
        $('#defaultForm').bootstrapValidator();
    });
</script>
<script type="text/javascript">
$(document).ready(function() {  
  $('#nivel').blur(function(){
    
    $('#Validar').html('<img src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>imagenes/loader.gif" alt="" />').fadeOut(1000);

    var nivel = $(this).val();   
    var dataString = 'nivel='+ nivel;
    
    $.ajax({
            type: "POST",
            url: "../controlador/niveles_disponible.php",
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
  $descripcion_tabla = "pro_gusua";
  $descripcion_ejecucion = "niveles_acceso.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO NIVELES DE ACCESO";
  $objeto_bitacora = "SOLICITAR DATOS DE NIVELES DE ACCESO";
  $datos_anteriores = "NO APLICA";
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//

?>
