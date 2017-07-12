<?php 
include ('../funciones/estilos.php');
include ('../funciones/estilos-js.php');
include ('../funciones/conexion.php');
$email=$_SESSION['email'];
           require_once('../correos/PHPMailer-master/PHPMailerAutoload.php');
$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail->IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail->SMTPDebug = 2;
//Debo de hacer autenticación SMTP
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
//indico el servidor de Gmail para SMTP
$mail->Host = "smtp.gmail.com";
//indico el puerto que usa Gmail
$mail->Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail->Username = "ander0426@gmail.com";
$mail->Password = "dayana04263412";
$mail->SetFrom('ander0426@gmail.com', 'andersson meza');
$mail->AddReplyTo("ander0426@gmail.com","andersson meza");
$mail->Subject = "Bancos";
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
<b>cuenta: Banco de Venezuela C.A</b><br>
<b>cuenta: 1020102010</b>
<p></p>
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
   
?>