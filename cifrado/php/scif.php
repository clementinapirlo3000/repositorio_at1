<?php
session_start();

$ccdt2=($_SESSION['nombre_scf'].$_SESSION['ccdt_scf'].$_SESSION['cedula_scf'].'car');
$ccdt='holaaaaaaaaaaaaaaa';
echo"Esta es la clave: ".$ccdt;
$cadena='hola soy la cadenas';
$action='1';
$x=encrypt_decrypt($action, $cadena, $ccdt2, $ccdt);
function encrypt_decrypt($action, $cadena, $llave, $llave_iv ) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = $llave;
    $secret_iv = $llave_iv;

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == '1' ) {
        $output = openssl_encrypt($cadena, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == '2' ){
        $output = openssl_decrypt(base64_decode($cadena), $encrypt_method, $key, 0, $iv);
    
    }

    return $output;
}

echo'aqui esta  '.$x;

?>