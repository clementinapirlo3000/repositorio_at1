<?php
	//conexion a tabla 
$dbuser="sistemas"; 
$dbhost="localhost"; 
$dbpass="b4s3d3d4t0s"; 
$dbname="sis_cif" ;
$conex= 
mysqli_connect 
($dbhost,$dbuser,$dbpass,$dbname)
	
	or  die ("error al seleccionar la Base de datos");
?>