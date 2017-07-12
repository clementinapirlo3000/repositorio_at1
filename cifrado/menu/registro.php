<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type='text/javascript' src='../js/jquery-3.1.1.js'></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type='text/javascript' src="../js/bootstrap.min.js"></script>
</head>
  
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../menu/index.php">Sistema de Cifrado</a>
    </div>
<ul class="nav navbar-nav">
      <li><a href="index.php">Inicio</a></li>
      
       <li class="active"><a href="#">Registrar</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=consulta.php?tip=1>Personal</a></li>
            <li role="separator" class="divider"></li>
            <li><a href=consulta.php?tip=2>Laboral</a></li>
             <li role="separator" class="divider"></li>
            <li><a href=consulta.php?tip=3>Social</a></li>
          </ul>
        </li>
</ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php session_start(); echo"".$_SESSION['login_scf']; ?></a></li>
      <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
 

</nav>
<div class="container">
<div class="col-md-3 col-xs-12"></div>
<div class="col-md-6 col-xs-12" >
	

  <form class="form-inline" method="post" action="../php/grd_cnt.php">
	  <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico</label></br>
    <input type="text" class="form-control" id="inputSeleccionado" name="correo" placeholder="xxxxxxxx@xxxx.xxx" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de usuario para logueo</label></br>
    <input type="text" class="form-control" id="inputSeleccionado" name="usuario" placeholder="Nombre de usuario" >
  </div></br></br>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label></br>
    <input type="text" class="form-control" id="inputSeleccionado" name="pass" placeholder="Contraseña" required="">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label></br>
    <input type="text" class="form-control" id="inputSeleccionado" name="descr" placeholder="Descripcion" required="">
  </div></br>
    <div class="form-group">
    <label for="exampleInputEmail1">Observación</label></br>
    <input type="text" class="form-control" id="inputSeleccionado" name="obser" placeholder="Observacion" required="">
  </div>
  <div class="form-group">
<?php include('../php/seleccion.php'); ?>
</div>
<center><article><div class=""><button type="submit" class="btn btn-primary btn-lg active">Cifrar</button>

</form>
<a href="index.php" class="btn btn-primary btn-lg active">Atras</a></div>
</article></center>
</div>

<div class="col-md-3 col-xs-12" ></div>

</body>
</html>