<?php
include("cnx.php");
//Ubicando el ultimo ID registrado...
$sql1=("SELECT scfprc_id from scf_prc_04 order by scfprc_id desc limit 0,1");
$result1=mysqli_query($conex,$sql1);
$n_bank=mysqli_fetch_array($result1);
$i=1;
$total=$n_bank["scfprc_id"];

//iniciando while de consulta de bancos
while($i <= $total){
$sql=("SELECT scfprc_ds FROM scf_prc_04 WHERE scfprc_id = '$i'");
	 $resultado=mysqli_query($conex,$sql);
	if( $fila=mysqli_fetch_array($resultado) )
    {               
      $nombre[$i] = $fila['scfprc_ds'];
  	  //echo"id: ".$id[$i];
	}
$i++;	
}//cierre de while para el arreglo
 echo"<br><label for='exampleInputEmail1'>Tipo de registro</label></br>";
 echo"<select class='form-control' name='id_proc'>";
$i=1;
while ($i <= $total)
{

		echo "<option value='".$i."'>".$nombre[$i]."</option>";
		$i++;

}//cierre de while mostrar arreglo
echo"</select></br></br>";

?>
