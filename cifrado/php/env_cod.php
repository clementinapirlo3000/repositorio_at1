<?php 
//include ('/var/www/html/proyecto2/funciones/estilos.php');
//include ('/var/www/html/proyecto2/funciones/estilos-js.php');
 
require_once('PHPMailer-master/PHPMailerAutoload.php');
$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail->IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
//$mail->SMTPDebug = 2;
//Debo de hacer autenticación SMTP
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
//indico el servidor de Gmail para SMTP
$mail->Host = "smtp.gmail.com";
//indico el puerto que usa Gmail
$mail->Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail->Username = "cifsis2016@gmail.com";
$mail->Password = "s1st3m4s";
$mail->SetFrom('cifsis2016@gmail.com', 'Sistema de cifrado');
$mail->AddReplyTo("cifsis2016@gmail.com","Sistema de cifrado");
$mail->Subject = "Codigo de verificacion";
$mail->MsgHTML("<html>
<head>
  <meta charset='UTF-8'>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<style>
  body{
    font-family: 'Droid Sans', sans-serif;
  }
  table{
    background: rgba(160,160,160,0.2);
    border-radius: 5px;
  }
</style>
</head>
<body>
<b>Nueva Clave: $pass</b>
<p>te recomendamos cambiarla en la proxima session</p>
</body>
</html>");
//indico destinatario
  $mail->AddAddress($email); // Cargamos el e-mail destinatario a la clase PHPMailer
  if ($mail->Send()) {
    
  }
  else {
   
   
   } // Realiza el envío =)
  $mail->ClearAddresses(); // Limpia los "Address" cargados previamente para volver a cargar uno.
    
 
     //arregla texto de asunto
     function fix_text_subject($str)
     {
          $subject = '';
          $subject_array = imap_mime_header_decode($str);
 
          foreach ($subject_array AS $obj)
               $subject .= utf8_encode(rtrim($obj->text, "\t"));
          
 
          return $subject;
     }
   echo "envio de codigo";
?>