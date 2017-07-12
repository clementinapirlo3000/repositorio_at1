<?php 
/**
  * Nombre: mod_usuarios.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el modificar los usuarios del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");

  //include("../../metodosGenericos.php");
  //escupe($_POST);
  //escupe($_GET);
  
  $id_del_usuario = $_GET['id'];
  $select_objeto_conexion_BD    = new clase_conecta_postgresql;
  $select_tele_conexion_BD      = new clase_conecta_postgresql;

  $arreglo_fecha_final = explode("-",$usu_fenac_del_usuario);
  $formato_fecha_final = $arreglo_fecha_final[2]."-".$arreglo_fecha_final[1]."-".$arreglo_fecha_final[0];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>USUARIOS</title>
  </head>
<body>
<div class="">
  <form id="form" method="post" class="form-horizontal" action="../controlador/mod_usuarios_registro.php">
    <input type="hidden" name="id" value="<?PHP echo $id_del_usuario; ?>">
    <input type="hidden" name="nivel_acceso_antes" value="<?PHP echo $nivel_del_usuario; ?>">
    <input type="hidden" name="cedula_usuario_antes" value="<?PHP echo $cedula_usuario; ?>">
    <input type="hidden" name="nombre_usuario_antes" value="<?PHP echo $nombre_del_usuario; ?>">
    <input type="hidden" name="nombre2_usuario_antes" value="<?PHP echo $nombre2_del_usuario; ?>">
    <input type="hidden" name="apellido_usuario_antes" value="<?PHP echo $apellido_del_usuario; ?>">
    <input type="hidden" name="apellido2_usuario_antes" value="<?PHP echo $apellido2_del_usuario; ?>">
    <input type="hidden" name="usu_fenac_antes" value="<?PHP echo $formato_fecha_final; ?>">
    <input type="hidden" name="id_codci_usuario_antes" value="<?PHP echo $id_codci_usuario; ?>">
    <input type="hidden" name="id_codce_usuario_antes" value="<?PHP echo $id_codce_usuario; ?>">
    <input type="hidden" name="usu_tehab_usuario_antes" value="<?PHP echo $usu_tehab_usuario; ?>">
    <input type="hidden" name="usu_tecel_usuario_antes" value="<?PHP echo $usu_tecel_usuario; ?>">
    <input type="hidden" name="login_usuario_antes" value="<?PHP echo $login_usuario; ?>">
    <input type="hidden" name="clave_usuario_antes" value="<?PHP echo $clave_usuario; ?>">
    <input type="hidden" name="email_usuario_antes" value="<?PHP echo $email_usuario; ?>">
    <input type="hidden" name="direc_usuario_antes" value="<?PHP echo $direc_usuario; ?>">
    <input type="hidden" name="liter_usuario_antes" value="<?PHP echo $liter_usuario; ?>">
    <input type="hidden" name="sexo_usuario_antes" value="<?PHP echo $sexo_usuario; ?>">
    <input type="hidden" name="zopos_usuario_antes" value="<?PHP echo $zopos_usuario; ?>">
    <div class="row">
      <div class=" panel-heading">
         <div class="margen-bajo panel-title text-center ">
              <h1 class="title">Usuarios</h1>
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
                  <div class="col-lg-6">            
                    <div class="">                  
                      <div class="input-group">     
                        <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span><?PHP 
                          if ($liter_usuario == 'V')
                          { ?>
                            <select class="form-control" name="literal">
                              <option selected>V</option>
                              <option>E</option>
                              <option>P</option>
                            </select>  <?PHP
                          } 
                          elseif ($liter_usuario == 'E')
                          { ?>
                          <select class="form-control" name="literal">
                            <option class="enab">V</option>
                            <option selected>E</option>
                            <option>P</option>
                          </select> <?PHP
                          } 
                          elseif ($liter_usuario == 'P')
                          { ?>
                          <select class="form-control" name="literal">
                            <option>V</option>
                            <option>E</option>
                            <option selected>P</option>
                          </select> <?PHP
                          } ?>
                      </div>                       
                    </div>                         
                  </div>                           
                  <div class="col-lg-6 validacionn">           
                    <div class="">                
                      <div class="input-group">  
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-address-card-o" aria-hidden="true"></i></span> 
                          <input type="text" class="form-control" name="cedula" step="1" value="<?PHP echo $cedula_usuario; ?>"
                            min="99999" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="El n&#250;mero debe ser superior a 100.000" max="99999999" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="La entrada debe ser inferior a 99.000.000" placeholder="C&#233;dula"/>
                      </div>                        
                    </div>                         
                  </div>                           
                </div>                              
                <div class="col-lg-6 validacionn"> 
                  <div class="col-lg-12">
                    <label class="control-label">Sexo</label>
                  </div>
                  <div class="col-lg-6">           
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
                    <div class="col-lg-12">           
                      <div class="">                
                        <div class="input-group">    
                          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span> 
                            <select name="nivel" id="nivel" class="form-control" onkeyup="deshabilita(this.form)" required="required">
                          <option value="" selected>Nivel Acceso</option>
                                  <?php
                            $consulta_select_existente="SELECT * FROM rrh_gusua";
                            $select_objeto_conexion_BD->ejecutar_sql($consulta_select_existente);
                            while($registro_select_existente = $select_objeto_conexion_BD->obtener_arreglo_objeto()){ 
                                  ?>
                              <option value="<?= $id_niveacceso = $registro_select_existente->id_rrh_gusua; ?>" 
                                  <?php 
                                if($registro_select_existente->id_rrh_gusua==$niv_descr){ ?> selected <?php } ?> > 
                                  <?= $registro_select_existente->gus_descr; ?>
                              </option>
                                <?php } $select_objeto_conexion_BD->liberar_resultado();?>
                          </select>
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
              <div class="col-lg-6"> 
                <div class="col-lg-12">
                  <label class="control-label">Nombres</label>
                </div>
                <div class="col-lg-6 validacionn">            
                  <div class="">                  
                    <div class="input-group">   
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control" name="nombre1" value="<?PHP echo $nombre_del_usuario; ?>" placeholder="Primer Nombre"/>
                    </div>                       
                  </div>                          
                </div>                            
                <div class="col-lg-6">            
                  <div class="">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span> 
                      <input type="text" class="form-control" name="nombre2" value="<?PHP echo $nombre2_del_usuario; ?>" placeholder="Segundo Nombre"/>
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
                      <input type="text" class="form-control" name="apellido1" value="<?PHP echo $apellido_del_usuario; ?>" placeholder="Primer Apellido" />
                    </div>                       
                  </div>                         
                </div>                           
                <div class="col-lg-6">           
                  <div class="form-group">                  
                    <div class="input-group">    
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="apellido2" value="<?PHP echo $apellido2_del_usuario; ?>" placeholder="Segundo Apellido" />
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
                  <label class="control-label">Fecha de Nacimiento</label>
                </div>
                <div class="col-lg-12 validacionn">
                  <div id="datepicker">
                    <input class="form-control" size="12" type="date" name="fecha" id="fecha" placeholder="Fecha de Nacimiento" required="required">
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
                       <input type="text" class="form-control" name="direccion" value="<?PHP echo $direc_usuario; ?>" placeholder="Direccion" />
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
                            if($registro_select_existente->cod_numer==$codnumer_usuario){ ?> selected <?php } ?> > 
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
                          <input type="text" class="form-control" name="telhab" step="1" min="1000000" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="El n&#250;mero debe llevar este formato 9999999" max="9999999" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="El campo entrada debe tener ocho(08) digitos" placeholder="Tel&#233;fono Hab" value="<?PHP echo $usu_tehab_usuario; ?>"/>
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
                            if($registro_select_existente2->id_rrh_codce==$id_codce_usuario){ ?> selected <?php } ?> > 
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
                        <input type="text" class="form-control" name="telcel" step="1" min="1000000" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="El n&#250;mero debe llevar este formato 000.00.00" max="9000000" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="La entrada debe ser inferior a 99.000.000" value="<?PHP echo $usu_tecel_usuario; ?>" placeholder="Tel&#233;fono Celular"/>
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
              <div class="col-lg-4 validacionn">  
                <div class="col-lg-12">
                  <label class="control-label">Zona Postal</label>
                </div>
                <div class="col-lg-12">           
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
                                if($registro_select_existente2->id_rrh_zopos==$zopos_usuario){ ?> selected <?php } ?> > 
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
                      <input type="text" class="form-control" name="email" value="<?PHP echo $email_usuario; ?>" placeholder="Email"/>
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
                      <input type="text" class="form-control" name="login" value="<?PHP echo $login_usuario; ?>" placeholder="Coloque Login" />
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
                <input type="password" class="form-control" name="password" value="<?PHP echo $clave_usuario; ?>" placeholder="Contraseña"/>
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
                <input type="password" class="form-control" name="confirmPassword" value="<?PHP echo $clave_usuario; ?>" placeholder="Repita Contraseña" />
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
                  <button type="button" onClick="document.location.href='../controlador/consulta_usuario.php';" class="btn btn-warning btn-lg btn-block">Regresar</button>
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
</body>
</html>
<?php 
////// Se registra en la bitacora la acción del usuario             //
  require ("../../bitacora/vista/bitacora.php");
  $descripcion_tabla = $datos_anteriores = ""; $datos_nuevos = "";            
  $descripcion_tabla = "usuarios";
  $descripcion_ejecucion = "usuarios.php";
  $movimiento_bitacora = $_SESSION['idusuarios$nom_proyec'].' '.$_SESSION['nombre1$nom_proyec'].' '.$_SESSION['apellido1$nom_proyec'].'...'."ENTRO MODIFICAR";
  $objeto_bitacora = "SOLICITAR DATOS DEL USUARIO DEL SISTEMA";
  $datos_anteriores = "USUARIO A SER MODIFICADO: ".$id_del_usuario." CEDULA: ".$cedula_usuario." NOMBRE: ".$nombre_del_usuario." APELLIDO: ".$apellido_del_usuario;
  $datos_nuevos = "NO APLICA";
  movimiento($movimiento_bitacora,$objeto_bitacora,$datos_anteriores,$datos_nuevos);
/////-------------------------------------------------------------------------//
?>
