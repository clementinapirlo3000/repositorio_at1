<?php
class MySQL
{
  var $conexion;
  function MySQL()
  {
  	if(!isset($this->conexion))
	{
  		$this->conexion = (mysqli_connect("localhost","root","123456789")) or die(mysqli_error());
  		mysqli_select_db("paises",$this->conexion) or die(mysqli_error());
  	}
  }

 function consulta($consulta)
 {
	$resultado = mysqli_query($consulta,$this->conexion);
  	if(!$resultado)
	{
  		echo 'MySQL Error: ' . mysqli_error();
	    exit;
	}
  	return $resultado; 
  }
  
 function fetch_array($consulta)
 { 
  	return mysqli_fetch_array($consulta);
 }
 
 function num_rows($consulta)
 { 
 	 return mysqli_num_rows($consulta);
 }
 
 function fetch_row($consulta)
 { 
 	 return mysqli_fetch_row($consulta);
 }
 function fetch_assoc($consulta)
 { 
 	 return mysqli_fetch_assoc($consulta);
 } 
 
}

?>