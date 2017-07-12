<?php

# Linea insertada para hacer una pruebita
# con Git y ver como funciona la vaina

function escupe($matriz)
{
	foreach ($matriz as $nombreCampo => $valor )
	{
		echo $nombreCampo.="=";
		echo $valor.="<BR>";
	}
}


?>