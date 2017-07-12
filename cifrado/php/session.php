<?php
    /* Empezamos la sesión */
    session_start();
    $session=$_SESSION['login_scf'];
    
	if(empty($session)) {
			echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
          echo" <link type='text/css' href='../css/estilos de la pagina principal2.css' rel='stylesheet' /></link>
          <script type='text/javascript' src='js/jquery_v1.7.1.js'></script>
          <script   type='text/javascript' src='js/my_script.js'></script>";
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>(Debes loguearte)</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../index.php'>"; 
    } // Recuerda usar corchetes
?>
