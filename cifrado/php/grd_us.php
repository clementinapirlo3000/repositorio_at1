<?php

//Variables

$nombre= $_POST["nombre"];
$apellido= $_POST["apellido"];
$nacionalidad= $_POST["nac"];
$ced= $_POST["cedula"];
$ctelefono= $_POST["ctelf"];
$telefono= $_POST["telefono"];
$email= $_POST["correo"];
$fecha= $_POST["fechan"];
$claveci= $_POST["clavec"];
$claveci2= $_POST["clavec2"];
$nombreusu= $_POST["users"];
$passwd= $_POST["pass"];
$passwd2= $_POST["pass2"];
echo" fecha ".$fecha;
$estatus=2;
$activar= rand(1000, 999999);
$fecha_desintegrar= explode("/",$fecha);
$fecha_n=$fecha_desintegrar[2].$fecha_desintegrar[1].$fecha_desintegrar[0];
echo"aqui     ".$fecha_n;
include("cnx.php");


if($claveci==$claveci2 and $passwd2==$passwd) {
$passwdc= (md5($passwd2));
//echo"si entro";
	$sql=("SELECT scfus_cd FROM scf_us_01 WHERE scfus_cd = '$ced'");
		 $resultado=mysqli_query($conex,$sql);
	
		  if( $fila=mysqli_fetch_array($resultado) )
	    {               
	        $ced_cliente = $fila['scfus_cd'];
	        echo"La cedula ya esta registrado en el sistema";
		}	
		else
		{
		$inst1="insert into scf_us_01 values (0,'$nombre','$apellido','$nacionalidad','$fecha_n','$email','$ctelefono','$telefono','$nombreusu','$claveci','$passwdc','$ced','$activar','$estatus')";
		echo "".$inst1;
		$result1=mysqli_query($conex,$inst1); 
			if($result1)
			{
			
			$pass= $activar;
			include('../crr/env_cod.php');
					}
		else
		{
	 echo"error al guardar usuario";
		}
	}

	}	
	else {
		 echo"error al guardar clave de cifrado o logueo no son iguales";
	}
	mysqli_close($conex);
?>