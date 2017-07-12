<?php
session_start();
$nom_proyec 	= 	$_SESSION['nom_proyec']; 
//echo '$nom_proyec: ',$nom_proyec; 
$_SESSION['ruta$nom_proyec'] = 'http://localhost/sinapro/rrhh/';
if(!isset($_SESSION['login$nom_proyec']))
{         
  echo"</br></br></br></br></br> 
    <script type='text/javascript' src='".$_SESSION['ruta$nom_proyec']."bootstrap-3.3.7/dist/js/jquery-1.12.4.js'></script>
    <div class='titulo'>
      <center><br><h1 style='width:100%;'>Lo sentimos debes logearte para ingresar</h1></center>
      <br>
    </div>
    <meta http-equiv='Refresh' content='3;url='../../index.php'>";		
  exit();
}
?>
