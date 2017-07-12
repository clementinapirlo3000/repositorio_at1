<?php
session_start();
//$ccdt=($_SESSION['nombre_scf'].$_SESSION['ccdt_scf'].$_SESSION['cedula_scf']);
$ccdt2='';
echo"Esta es la clave: ".$ccdt2;
$cadena='BTA9HuBJMpdX/qzg368YQ//hS54ksWdU9WwFP+DS13A=';
 $x2=sdcif($cadena);
function sdcif($cadena){
     $key=$ccdt2;  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}
echo'aqui esta  '.$x2;
?>