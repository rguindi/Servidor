<?php

echo  time();

echo "<p>Zona que tiene el servidor</p>";
echo date_default_timezone_get();

echo "<p>Cambiada</p>";
date_default_timezone_set ("Europe/Madrid");
echo date_default_timezone_get();

echo date ("r");
echo date ("d/m/y H:i:s");

echo "<p>Fechas cumnpleaños</p>";
$cumplea = strtotime ("24/21/1982");
echo $cumplea;
echo "<p>" .date("d/m/y", $cumplea) . "</p>";

$hoy = strtotime ("now");

echo $hoy;
echo "<p>" .date("d/m/y", $hoy) . "</p>";

$edad = $hoy-$cumplea;
 echo $edad;

?>