<?php 
/**
  * Nombre: mod_empleados.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el modificar los empleados del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");

  //include("../../metodosGenericos.php");
  //escupe($_POST);
  //escupe($_GET); 

  $select_objeto_conexion_BD    = new clase_conecta_postgresql;
  $select_tele_conexion_BD      = new clase_conecta_postgresql;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EMPLEADOS</title>
  </head>
<body>
<div class="">
  <form id="form" method="post" class="form-horizontal" action="../controlador/empleados_registro.php">
    <div class="row">
      <div class=" panel-heading">
         <div class="margen-bajo panel-title text-center ">
              <h1 class="title">Empleados</h1>
              <hr />
          </div>
      </div>

      <div class="row main-login main-center main">
        <div class="col-lg-12">                   
            <div class="form-group">               
              <div class="row">                     
                <div class="col-lg-6">  
                  <div class="col-lg-12">
                    <label class="control-label">Datos</label>
                  </div>
                  <div class="col-lg-6 validacionn">           
                    <div class="">                 
                      <div class="input-group">    
                        <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                          <select class="form-control" name="literal" id='literal'>
                            <option>V</option>
                            <option>E</option>
                            <option>P</option>
                          </select>
                      </div>                        
                    </div>                       
                  </div>
                              
                  <div class="col-lg-6 validacionn">           
                    <div class="">                
                      <div class="input-group">  
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span> 
                          <input type="text" class="form-control" name="cedula" step="1" value=""
                            min="99999" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="El n&#250;mero debe ser superior a 100.000" max="99999999" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="La entrada debe ser inferior a 99.000.000" placeholder="C&#233;dula"/>
                            <div id="Validar"></div>
                      </div>                        
                    </div>                         
                  </div>                           
                </div>                              
                <div class="col-lg-6"> 
                  <div class="col-lg-12">
                    <label class="control-label">Sexo</label>
                  </div>
                  <div class="col-lg-6 validacionn">           
                    <div class="">                 
                      <div class="input-group">    
                        <span class="input-group-addon"><i class="fa fa-venus-mars" aria-hidden="true"></i></span>
                          <select class="form-control" name="sexo">
                            <option>Masculino</option>
                            <option>Femenino</option>
                          </select>
                      </div>                        
                    </div>                       
                  </div>                           
                  <div class="col-lg-6 validacionn">  
                    <div id="datepicker">
                    <input class="form-control" size="12" type="date" name="fecha_ingreso" id="fecha_ingreso" placeholder="Fecha de Ingreso">
                  </div>
              </div>                               
            </div>                                 
          </div> 
        </div> 

        <div class="col-lg-12">                
          <div class="form-group">              
            <div class="row">                   
              <div class="col-lg-6"> 
                <div class="col-lg-12">
                  <label class="control-label">Nombres</label>
                </div>
                <div class="col-lg-6 validacionn">            
                  <div class="">                  
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control" name="nombre1" value="" placeholder="Primer Nombre"/>
                    </div>                       
                  </div>                          
                </div>                            
                <div class="col-lg-6">            
                  <div class="">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control" name="nombre2" value="" placeholder="Segundo Nombre"/>
                    </div>                       
                  </div>                        
                </div>                          
              </div>                              
              <div class="col-lg-6"> 
                <div class="col-lg-12">
                  <label class="control-label">Apellidos</label>
                </div>
                <div class="col-lg-6 validacionn">            
                  <div class="">                 
                    <div class="input-group">     
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o" aria-hidden="true"></i></span>       
                      <input type="text" class="form-control" name="apellido1" value="" placeholder="Primer Apellido" />
                    </div>                       
                  </div>                         
                </div>                           
                <div class="col-lg-6">           
                  <div class="form-group">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="apellido2" value="" placeholder="Segundo Apellido" />
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
              <div class="col-lg-6">
                <div class="col-lg-6 validacionn">            
                  <div class="">   
                    <div class="col-lg-12">
                      <label class="control-label">Profesi&#243;n</label>
                    </div>                
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span> 
                          <select name="profesion" id="profesion" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                            <option value="">#</option>
                              <?php 
                            $consulta_select_existente="SELECT * FROM rrh_profe ORDER BY pro_nombre";
                            $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                            while($registro_select_existente = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
                          ?>
                            <option value="<?= $id_rrh_profe = $registro_select_existente->pro_nombre; ?>" 
                          <?php 
                            if($registro_select_existente->pro_nombre==""){ ?> selected <?php } ?> > 
                            <?= $registro_select_existente->pro_nombre; ?>
                          </option>
                                <?php } $select_objeto_conexion_BD->liberar_resultado();?>
                          </select>
                    </div>                        
                  </div>                         
                </div> 
                <div class="col-lg-6 validacionn">            
                  <div class="col-lg-12">   
                    <div class="col-lg-12">
                      <label class="control-label">Especialidad</label>
                    </div>         
                      <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span> 
                          <select name="codarea" id="codarea" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                            <option value="">#</option>
                              <?php 
                            $consulta_select_existente="SELECT * FROM rrh_tprof ORDER BY tpr_nombre";
                            $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                            while($registro_select_existente = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
                          ?>
                            <option value="<?= $id_rrh_profe = $registro_select_existente->total; ?>" 
                          <?php 
                            if($registro_select_existente->tpr_nombre==$codnumer_usuario){ ?> selected <?php } ?> > 
                            <?= $registro_select_existente->tpr_nombre; ?>
                          </option>
                                <?php } $select_objeto_conexion_BD->liberar_resultado();?>
                          </select>
                    </div>    
                  </div>                         
                </div>                          
              </div>                              
              <div class="col-lg-6"> 
                <div class="col-lg-12">
                  <label class="control-label">Fecha de Nacimiento</label>
                </div>
                <div class="col-lg-12">
                  <div id="datepicker">
                    <input class="form-control" size="12" type="date" name="fecha" id="fecha" placeholder="Fecha de Nacimiento">
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>

        <div class="col-lg-12">                   
          <div class="form-group">                
            <div class="row">                     
              <div class="col-lg-6 validacionn">  
                <div class="col-lg-12">
                  <label class="control-label">Direcci&#243;n</label>
                </div>
                <div class="col-lg-12">            
                  <div class="">                 
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-book-o" aria-hidden="true"></i></span>       
                       <input type="text" class="form-control" name="direccion" value="" placeholder="Direccion" />
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
              <div class="col-lg-6">  
                <div class="col-lg-12">
                  <label class="control-label">Tel&#233;fono</label>
                </div>
                <div class="col-lg-6 validacionn">            
                  <div class="">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span> 
                          <select name="codarea" id="codarea" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                            <option value="">#</option>
                              <?php 
                            $consulta_select_existente="SELECT cod_numer, COUNT(*) total FROM rrh_codci GROUP BY cod_numer HAVING COUNT(*) > 1 ORDER BY cod_numer";
                            $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                            while($registro_select_existente = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
                          ?>
                            <option value="<?= $id_codigo_ciudad = $registro_select_existente->total; ?>" 
                          <?php 
                            if($registro_select_existente->cod_numer==""){ ?> selected <?php } ?> > 
                            <?= $registro_select_existente->cod_numer; ?>
                          </option>
                                <?php } $select_objeto_conexion_BD->liberar_resultado();?>
                          </select>
                    </div>                        
                  </div>                         
                </div>                           
                <div class="col-lg-6 validacionn">           
                  <div class="">                 
                    <div class="input-group">     
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>          
                          <input type="text" class="form-control" name="telhab" step="1" min="1000000" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="El n&#250;mero debe llevar este formato 9999999" max="9999999" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="El campo entrada debe tener ocho(08) digitos" placeholder="Tel&#233;fono Hab" value=""/>
                    </div>                   
                  </div>                          
                </div>                           
              </div>                              

              <div class="col-lg-6">  
                <div class="col-lg-12">
                  <label class="control-label">Tel&#233;fono</label>
                </div>
                <div class="col-lg-6 validacionn">           
                  <div class="">                
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span> 
                          <select name="codcel" id="codcel" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                            <option value="" selected>#</option>
                              <?php
                            $consulta_select_existente="SELECT * FROM rrh_codce ORDER BY cod_celul";
                            $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                            while($registro_select_existente2 = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
                          ?>
                            <option value="<?= $id_codigo_celular = $registro_select_existente2->id_rrh_codce; ?>" 
                          <?php 
                            if($registro_select_existente2->id_rrh_codce==""){ ?> selected <?php } ?> > 
                            <?= $registro_select_existente2->cod_celul; ?>
                          </option>
                          <?php } $select_objeto_conexion_BD->liberar_resultado();?>
                          </select>
                    </div>                       
                  </div>                          
                </div>                           
                <div class="col-lg-6 validacionn">           
                  <div class="form-group">                 
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span> 
                        <input type="text" class="form-control" name="telcel" step="1" min="1000000" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="El n&#250;mero debe llevar este formato 000.00.00" max="9000000" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="La entrada debe ser inferior a 99.000.000" value="" placeholder="Tel&#233;fono Celular"/>
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
              <div class="col-lg-4">  
                <div class="col-lg-12">
                  <label class="control-label">Zona Postal</label>
                </div>
                <div class="col-lg-12 validacionn">           
                  <div class="">                  
                    <div class="input-group">     
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                      <select name="zopos" id="zopos" class="selectpicker" data-live-search="true" >
                             <option value="" selected>Dele Click</option><?php
                              $consulta_select_existente="SELECT * FROM rrh_zopos ORDER BY zop_descr";
                              $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                              while($registro_select_existente2 = $select_objeto_conexion_BD->obtener_arreglo_objeto())
                              { ?>
                                <option value="<?= $id_codigo_celular = $registro_select_existente2->id_rrh_zopos; ?>"<?php 
                                if($registro_select_existente2->id_rrh_zopos==""){ ?> selected <?php } ?> > 
                                <?= $registro_select_existente2->zop_descr.' -  '.$registro_select_existente2->zop_estad.', '.$registro_select_existente2->zop_ciuda; ?>
                            </option><?php 
                              } 
                              $select_objeto_conexion_BD->liberar_resultado();?>
                      </select>
                    </div>                        
                  </div>                         
                </div>                           
              </div>
              <div class="col-lg-5 validacionn">  
                <div class="col-lg-12">
                  <label class="control-label">Correo Electr&#243;nico</label>
                </div>
                <div class="col-lg-12">           
                  <div class="">                 
                    <div class="input-group">     
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control" name="email" value="" placeholder="Email"/>
                    </div>                     
                  </div>                         
                </div>                           
              </div>                             
              <div class="col-lg-3 validacionn"> 
                <div class="col-lg-12">
                   <label class="control-label">Nombre Usuario</label>
                </div>
                <div class="col-lg-12">            
                  <div class="">                  
                    <div class="input-group">     
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-sign-in" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control" name="login" value="" placeholder="Coloque Login" />
                      <div id="Validar2"></div>
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
            <div class="col-lg-6 validacionn">  
            <div class="col-lg-12">
              <label class="control-label">Seguridad</label>
            </div>
            <div class="col-lg-12">            
              <div class="">                 
              <div class="input-group">    
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>  
                <input type="password" class="form-control" name="password" value="" placeholder="Contraseña"/>
              </div>                     
              </div>                         
            </div>                           
            </div>                            
            <div class="col-lg-6 validacionn"> 
            <div class="col-lg-12">
               <label class="control-label">Repita</label>
            </div>
            <div class="col-lg-12">           
              <div class="">               
              <div class="input-group">    
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>         
                <input type="password" class="form-control" name="confirmPassword" value="" placeholder="Repita Contraseña" />
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
              <div class="col-lg-6"> 
                <div class="col-lg-12">
                  <label class="control-label"># HIJOS</label>
<!--numero de hijos va a ser la cantidad de solicitudes de los datos de cada hijo para llenar rrh_famil y la del parentesco rrh_parent por el tipo de relacion existente -->
                </div>
                <div class="col-lg-6 validacionn">            
                  <div class="">                  
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> 
                      <input type="number" class="form-control" name="chijos" value="" placeholder="Cantidad de Hijos"/>
                    </div>                       
                  </div>                          
                </div>                            
                <div class="col-lg-6">
                <div class="col-lg-12">
                  <label class="control-label"># Cuenta bancaria</label>
                </div>    
                  <div class="">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> 
<!--numero de cuenta bancaria donde se le deposita el sueldo esta variable debe guardarse en la tabla rrh_tcuent y no en la de empleados por el tipo de relacion existente -->
                      <input type="text" class="form-control" name="ctabanco" value="" placeholder="# de cuenta bancaria"/>
                    </div>                       
                  </div>                        
                </div>                          
              </div>                              
              <div class="col-lg-6"> 
                <div class="col-lg-12">
                  <label class="control-label">Banco receptor</label>
                </div>
                <div class="col-lg-6 validacionn">                   
                  <div class="">                  
                    <div class="input-group">     
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> 
                      <select name="zopos" id="zopos" class="selectpicker" data-live-search="true" >
                             <option value="" selected>Dele Click</option><?php
                              $consulta_select_existente="SELECT * FROM rrh_zopos ORDER BY zop_descr";
                              $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                              while($registro_select_existente2 = $select_objeto_conexion_BD->obtener_arreglo_objeto())
                              { ?>
                                <option value="<?= $id_codigo_celular = $registro_select_existente2->id_rrh_zopos; ?>"<?php 
                                if($registro_select_existente2->id_rrh_zopos==""){ ?> selected <?php } ?> > 
                                <?= $registro_select_existente2->zop_descr.' -  '.$registro_select_existente2->zop_estad.', '.$registro_select_existente2->zop_ciuda; ?>
                            </option><?php 
                              } 
                              $select_objeto_conexion_BD->liberar_resultado();?>
                      </select>
                    </div>                        
                  </div>                         
                </div>                           
              </div>                         
                </div>                           
                <div class="col-lg-6">           
                  <div class="form-group">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="apellido2" value="" placeholder="Segundo Apellido" />
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
                  <button type="button" onClick="document.location.href='../controlador/consulta_empleados.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
  $('#cedula').blur(function(){
    $('#Validar').html('<img src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>imagenes/loader.gif" alt="" />').fadeOut(1000);
    var cedula = $(this).val();   
    var dataString = 'cedula=' + cedula;
    $.ajax({
            type: "POST",
            url: "../controlador/usuario_disponible.php",
            data: dataString,
            success: function(data) {
        $('#Validar').fadeIn(1000).html(data);
        //alert(data);
            }
        });
    });              
});    
</script>
<script type="text/javascript">
$(document).ready(function() {  
  $('#login').blur(function(){
    $('#Validar2').html('<img src="<?PHP echo $_SESSION['ruta$nom_proyec']; ?>imagenes/loader.gif" alt="" />').fadeOut(1000);
    var login = $(this).val();   
    var dataString = 'login=' + login;
    $.ajax({
            type: "POST",
            url: "../controlador/usuario_login_disponible.php",
            data: dataString,
            success: function(data) {
        $('#Validar2').fadeIn(1000).html(data);
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
  $descripcion_tabla = "empleados";
  $descripcion_ejecucion = "empleados.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO MODIFICAR";
  $objeto_bitacora = "SOLICITAR DATOS DEL USUARIO DEL SISTEMA";
  $datos_anteriores = "USUARIO A SER MODIFICADO: ".$id_del_usuario." CEDULA: ".$cedula_usuario." NOMBRE: ".$nombre_del_usuario." APELLIDO: ".$apellido_del_usuario;
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
