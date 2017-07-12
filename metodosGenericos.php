<?php
function escupe($matriz)
{
	foreach ($matriz as $nombreCampo => $valor )
	{
		echo $nombreCampo.="=";
		echo $valor.="<BR>";
	}
}


?>