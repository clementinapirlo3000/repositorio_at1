<?php 
/**
  * Nombre: mod_usuarios.php
  * Autor: Ing: Fernando Paez Acero
  * Autor: Ing: Alex Castro
  * Autor: Ing: Carlos Chacon
  * Acces public
  * Copyleft: 2017
  * Formulario para el modificar los usuarios del sistema
  *
**/
require ("../../presentacion/vista/cabeza.php");

  //include("../../metodosGenericos.php");
  //escupe($_POST);
  //escupe($_GET); 

?>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});

function cargar_paises()
{
	$.get("../controlador/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("../controlador/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#estado").attr("disabled",false);
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code = $("#estado").val();
	$.get("../controlador/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}
</script>
<style type="text/css">
dt{font-size:200%;}
dd{font-size:150%;}
</style>
<title>Combobox dependientes de Pa&iacute;s, Estado y Ciudad con PHP, MySQL, jQuery y un poco de AJAX</title>
</head>

<body>
<h1>Combobox dependientes de Pa&iacute;s, Estado y Ciudad con PHP, MySQL, jQuery y un poco de AJAX</h1>
<dl>
<dt>Ubicaci&oacute;n:</dt>
	<dd>Pais:</dd>
    <dd>
        <select id="pais" name="pais">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>

	<dd>Estado:</dd>
    <dd>
        <select id="estado" name="estado">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>

	<dd>Ciudad:</dd>
    <dd>
        <select id="ciudad" name="ciudad">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>
</dl>
</body>
</html>
<?PHP require ("../../presentacion/vista/pie.php"); ?>