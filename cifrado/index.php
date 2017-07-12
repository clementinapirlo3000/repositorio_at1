<?php
    session_start();
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
  echo "".$_SERVER['REMOTE_ADDR'];
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type='text/javascript' src='js/jquery-3.1.1.js'></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type='text/javascript' src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
 
</nav>
<div style="width:-20px height:-20px;"><center><img style="margin-top:-20px;" src="pictures/logo.png"></center></div>
<article><center>
<img style="margin-top:-10px;" src="pictures/icono_login.jpg">
<form class="form-inline" method= "POST" action="php/validar.php">
  
  <div class="form-group">

    <input type="text" class="form-control" id="inputSeleccionado" name="user" placeholder="Usuario" required>
  </div><br><br>
    <div class="form-group">

    <input class="form-control" id="inputSeleccionado" type="password" name="pass" placeholder="Contraseña" required>
  </div><br><br>


<input  class="btn btn-primary btn-lg active" type="submit" name="boton" value="Entrar"/><br> <br>
<a href="php/registro.php">Registrarse</a>
</td>
</tr>
</table>
</form>
</article></div></center>
<footer style="margin-top:5%;">
<center><img class="" src=""></center>
</footer>
</body>
</html>
