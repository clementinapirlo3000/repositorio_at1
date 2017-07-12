<?php
session_start();
//Variables
$id_login=$_SESSION['id_scf'];
$id_sel= $_POST["id_proc"];
$email= $_POST["correo"];
$user= $_POST["usuario"];
$contra= $_POST["pass"];
$descripcion= $_POST["descr"];
$observa= $_POST["obser"];
// estatus del contenido y Accion a ejecutarse
$estatus=1;
$action='1';
include("cnx.php");
include("cifrar.php");
//Transformando valores en cifrados
$xemail=cif_decif($action,$email);

//echo"<br>".$xemail;

$xuser=cif_decif($action,$user);

//echo"<br>".$xuser;

$xcontra=cif_decif($action,$contra);

//echo"<br>".$xcontra;

$xdescrip=cif_decif($action,$descripcion);

//echo"<br>".$xdescrip;

$xobserva=cif_decif($action,$observa);

//echo"<br>".$xobserva;


//insertando datos en la base de datos
		$inst1="insert into scf_cnt_02 values (0,'$xemail','$xuser','$xcontra','$xdescrip','$xobserva','$estatus','$id_login','$id_sel')";
		
		$result1=mysqli_query($conex,$inst1); 
			if($result1)
			{

			echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
    echo"</br>";
          echo" <link type='text/css' href='../css/estilos de la pagina principal2.css' rel='stylesheet' /></link>
          <script type='text/javascript' src='js/jquery_v1.7.1.js'></script>
          <script   type='text/javascript' src='js/my_script.js'></script>";
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>(Información cifrada correctamente)</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../menu/registro.php'>"; 
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
              echo"<div class='titulo'><center><br><h1 style='width:100%;'>(ERROR: Inténtelo nuevamente)</h1></center><br><span style='width:10%;''></span></span></div>";
           echo "<meta http-equiv='Refresh' content='3;url=../menu/registro.php'>"; 
		}


	mysqli_close($conex);
?>