<?php

include ("./funcionesutiles.php");

echo edad (1956,3,25);
 echo "<br>";
echo iva (100, 0.1);

echo "<br>";
echo iva (100);


$contador = array();

añadirArray ($contador, "uno");
añadirArray ($contador, "dos");
añadirArray ($contador, "tres");
añadirArray ($contador, "cuatro");
print_r ($contador);

?>