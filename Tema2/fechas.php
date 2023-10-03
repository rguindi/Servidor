<?php

echo  time();

echo "<p>Zona que tiene el servidor</p>";

echo date_default_timezone_get();
echo "<p>Cambiada</p>";
date_default_timezone_set ("Europe/Madrid");
echo date_default_timezone_get();

echo date ("r");
echo date ("d/m/y H:i:s");



?>