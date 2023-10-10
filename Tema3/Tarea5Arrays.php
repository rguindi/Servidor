<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 05 Arrays</title>
</head>
<body>


<?php
echo "<h2>1. Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya
elementos repetidos.</h2> <br>
datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3] <br>";
$datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

echo "<br>";
echo "Imprimimos el array";
echo "<br>";
foreach ($datos as $key => $value) {
    echo $value;
    echo "&nbsp";
}
echo "<br>";

echo "ordenamos de menor a mayor el array";
asort ($datos);

echo "<br>";

foreach ($datos as $key => $value) {
    echo $value;
    echo "&nbsp";
}
echo "<br>";

echo "borramos los valores duplicados";

      $borrar =  array_unique($datos);
      echo "<br>";

//Imprimimos el array
foreach ($borrar as $key => $value) {
    echo $value;
    echo "&nbsp";
}



echo "<h2>2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y
cambie el valor por el número de la posición</h2> <br>
datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3] <br>";
$datos = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];


//Recorremos el array
    foreach ($datos as $key => $value) {

        if ($value ==3) $datos [$key] = $key;
    
    }
//Imprimimos el array
foreach ($datos as $key => $value) {
    echo $value;
    echo "&nbsp";
}

echo "<h2>3. Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4). Rellene de
la siguiente manera
</h2> <br> <img src='../img/tabla05.png' alt='Tabla' width='300px' height='400px'> <br>";


?>


    
</body>
</html>