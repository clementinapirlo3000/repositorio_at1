<?php
include("class.combos.php");
$ciudades = new selects();
$ciudades->code = $_GET["code"];
$ciudades = $ciudades->cargarCiudades();
foreach($ciudades as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>