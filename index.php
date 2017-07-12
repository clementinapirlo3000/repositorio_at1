<!--/**
  * Nombre: index.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el ingreso del sistema
  *
*/-->
<?php
//Declarando color del tema a usar
 $tema='azul';
// Nombre del sistema en ejecucion
 $nombre='SINAPRO-RRHH';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Sistema desarrollado por el Departamento de Sistemas e Informática de la Corporación de Salud del Estado Táchira"/>
    <meta name="keywords" content="desarrollo de sistemas informaticos a medida" />
    <meta name="author" content="Ing. Fernando Paez Acero, Ing. Alex Castro, Ing. Carlos E. Chacón" />
	  <title>Login del USUARIO</title>
    <!-- Bootstrap -->
    <link href="vendor/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendor/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendor/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendor/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    
    <!-- JQVMap -->
    
    <!-- bootstrap-daterangepicker -->
    <link href="vendor/material-kit/assets/css/material-kit-<?php echo $tema;?>.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

   <!--   JS de Material KIT   -->

  <!--   Core JS Files   -->
  <script src='vendor/material-kit/assets/js/jquery.min.js' type='text/javascript'></script>
  <script src='vendor/material-kit/assets/js/bootstrap.min.js' type='text/javascript'></script>
  <script src='vendor/material-kit/assets/js/material.min.js'></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src='vendor/material-kit/assets/js/nouislider.min.js' type='text/javascript'></script>

  <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
  <script src='vendor/material-kit/assets/js/bootstrap-datepicker.js' type='text/javascript'></script>

  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script src='vendor/material-kit/assets/js/material-kit.js' type='text/javascript'></script>
  </head>
  </head>
  <body>
<body class="signup-page" onload='Reloj()'>
 <div class="wrapper">
    <div class=" header-filter">

      <div class="container">
      <center><img class="img-responsive" src="pictures/membrete-doble.png" ></center>
        <div class="">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card-signup">
              <form method= "POST" name="form1" id="form1" action="menu/vista/verificar.php">
                <div class="header header-primary text-center">
                  <h4><?php echo$nombre;?></h4>
                  <br>
                </div>
                <div class="center-block">
                  <center><img class="img-rounded img-responsive" src="pictures/rrhh2.png" ></center>
                  

                </div>
                <div class="content">

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-user"></i>
                    </span>
                    <input type="text" name="login" class="form-control" type="text"  required  id="login" placeholder="Usuario" autocomplete="off" />
                  </div>

                  
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-lock"></i>
                    </span>
                    <input type="password"  name="password"  required class="form-control" id="password" placeholder="Contraeña" autocomplete="off"/>
                  </div>


                  <!-- If you want to add a checkbox to this form, uncomment this code-->

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="" checked>
                      Recordar usuario...!
                    </label>
                  </div> 
                </div>
                <div class="footer text-center">
                  <button type="submit" style="background: transparent; border: 0px;">
                    <a class="btn btn-simple btn-primary btn-lg">Iniciar</a>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>













    <!--<div class="container">
      <form class="form-signin" method="post" name="form1" id="form1" action="menu/vista/verificar.php">
        <h2 class="form-signin-heading">(SINAPRO)</h2>
        <h2 class="text-capitalize"><center>
          Sistema Integrado de Automatización de Procesos</span>
          </span>
        </center>
        </h2>
		<label for="inputEmail" class="sr-only">Login</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="glyphicon glyphicon-user"></i>
			</span>
			<input name="login" type="text" autofocus required class="form-control" id="login" placeholder="Usuario">
		</div>
		<label for="inputPassword" class="sr-only">Password</label>
			<div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-lock"></i>
				</span>
				<input name="password" type="password" autofocus required class="form-control" id="password" placeholder="Contraeña">
			</div>    
		<div class="checkbox">
			<label class="text-capitalize">
				<input type="checkbox" value="remember-me"> Recuerdame
			</label>
        </div>
		</div>
		<div align=center>
        <button class="btn btn-md btn-primary" type="submit">Continuar</button>
		 </div>
      </form>
    </div>--> <!-- /container -->
  </body>
</html>
