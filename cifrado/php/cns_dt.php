<?php

// llenando variables de usuario

$usuario=$_SESSION['id_scf'];
$nom_usu=$_SESSION['login_scf'];
include("cnx.php");
include("cifrar.php");
//Ubicando el ultimo ID registrado...
$sql1=("SELECT * from scf_cnt_02 where $usuario=fk_scfus_id and $tip=fk_scfprc_id order by scfcnt_id asc");
$result1=mysqli_query($conex,$sql1);

while ($n_datos=mysqli_fetch_array($result1)) {
 				if($n_datos['scfcnt_st']=1){
 						echo"<tr>
                         <td>".cif_decif(2, $n_datos['scfcnt_cr'])."</td>
                         <td>".cif_decif(2, $n_datos['scfcnt_us'])."</td>
                         <td>".cif_decif(2, $n_datos['scfcnt_ct'])."</td>
                         <td>".cif_decif(2, $n_datos['scfcnt_dsc'])."</td>
                         <td>".cif_decif(2, $n_datos['scfcnt_ob'])."</td>
                       
                       </tr>";
                        }
                 
			}//cierre de if del arreglo
			





?>