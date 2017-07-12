<?php
include_once('../php/session.php');

?>

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
      <a class="navbar-brand" href="index.php">Sistema de Cifrado</a>
    </div>
<ul class="nav navbar-nav">
      <li><a href="index.php">Inicio</a></li>
      
       <li ><a href="registro.php">Registrar</a></li>
        <li class="active" class="dropdown">
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php  echo"".$_SESSION['login_scf']; ?></a></li>
      <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
    </ul>
  </div>
 

</nav>


<body>
<br>
  <section>
    <div class="container">
      <div class="row">
        <div class="table">
          <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <center><h3 class="panel-title"><b>Claves registradas</b></h3></center>
                </div>
                   <div class="table-responsive">

                     <table class="table table-hover table-bordered ">
                        <tr class=warning>
                         <td>Correo</td><td>Usuario</td><td>Contraseña</td><td>Descripcion</td><td>Observacion</td>
                       </tr>
                     <?php $tip=$_GET['tip']; include('../php/cns_dt.php');?>
                    </table>
                </div>
             </div>  
           </div>
       </div>
     </div>
   </section>
 </body>
 </html>