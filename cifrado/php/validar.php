<?php
session_start();
include('cnx.php');
   $pass1 = $_POST['pass'];
    $user = $_POST['user'];
    $pass=(md5($pass1));
    //consultamos al nombre de usuario y contraseña
	 $sql=("SELECT * FROM scf_us_01 WHERE scfus_nus = '$user' AND scfus_cllg = '$pass' ");
	 $resultado=mysqli_query($conex,$sql);
	  if( $fila=mysqli_fetch_array($resultado) )
    {               
    //Extraemos los datos
   		$id_num = $fila['scfus_id']; 
        $id = $fila['scfus_nus'];
        $estatus = $fila['scfus_st'];
        $nombre = $fila['scfus_nom'];
        $apellido = $fila['scfus_ape'];
        $ced = $fila['scfus_cd'];
        $ccdt = $fila['scfus_clci'];

        $passw = $fila['scfus_cllg'];
if ($id==$user && $passw ==$pass) //comparamos las contraseñas y el usuario
	{
			if ($estatus=='1') //consultamos el estatus
			{
			/* Creamos la sesión */
		$_SESSION['id_scf'] = $id_num;	
		$_SESSION['login_scf'] = $id;
		$_SESSION['st_scf'] = $estatus;
		$_SESSION['nombre_scf'] = $nombre;
		$_SESSION['apellido_scf'] = $apellido;
		$_SESSION['cedula_scf'] = $ced;
		$_SESSION['ccdt_scf'] = $ccdt;
 
		/* Si no hay una sesión creada, redireccionar al index. */
			if(empty($_SESSION['login_scf'])) 
			{ // Recuerda usar corchetes.
			header('Location: ../index.php');
			} // Recuerda usar corchetes
			else
			{
	echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
          echo" <link type='text/css' href='../css/estilos de la pagina principal2.css' rel='stylesheet' /></link>
          <script type='text/javascript' src='js/jquery_v1.7.1.js'></script>
          <script   type='text/javascript' src='js/my_script.js'></script>";
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>(Usuario ".$_SESSION['login']." Validado)</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../menu/index.php'>"; 
			}
}
else
{
	    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
          echo" <link type='text/css' href='../css/estilos de la pagina principal2.css' rel='stylesheet' /></link>
          <script type='text/javascript' src='js/jquery_v1.7.1.js'></script>
          <script   type='text/javascript' src='js/my_script.js'></script>";
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>(Usuario Inhabilitado), Comuniquese con el administrador</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../index.php'>"; 
    }
}
else {

    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
          echo" <link type='text/css' href='../css/estilos de la pagina principal2.css' rel='stylesheet' /></link>
          <script type='text/javascript' src='js/jquery_v1.7.1.js'></script>
          <script   type='text/javascript' src='js/my_script.js'></script>";
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>Usuario o contraseña Invalido</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../index.php'>"; 
		}

    }
	else {

   echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
          echo" <link type='text/css' href='../css/estilos de la pagina principal2.css' rel='stylesheet' /></link>
          <script type='text/javascript' src='js/jquery_v1.7.1.js'></script>
          <script   type='text/javascript' src='js/my_script.js'></script>";
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>Error inesperado de conexion</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../index.php'>"; 
    }

	 mysqli_close($conex);
?>
