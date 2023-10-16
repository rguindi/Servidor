<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Tarea 05 Arrays</title>
</head>
<body>
<header>
        <?php
            include("../html/header.html");
        ?>
        </header>
        <body>
            
        
<main>
<?php

echo "<h3>1. Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya
elementos repetidos.</3> <br>
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



echo "<h3>2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y
cambie el valor por el número de la posición</h3> <br>
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

echo "<h3>3. Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4). Rellene de
la siguiente manera
</h3> <br> <img src='../img/tabla05.png' alt='Tabla' width='300px' height='400px'> <br>";


$longitud = $_GET ['lado'];

$array = array ();

    for ($i=0; $i <$longitud ; $i++) { 
        
        $array [$i] = array();

            for ($j=0; $j < $longitud; $j++) { 

                if ($i==0 || $j==0){

                $array [$i][$j] = 1;                 

                }else {
                    
                    $array [$i][$j] = $array [$i-1][$j] + $array[$i][$j-1];

                }


            }
           
        
    }

?>

<table border = "1">
    <thead>
     
    </thead>
    <tbody>
        <tr>
        <?php
       
        foreach ($array as $key => $value) {
            echo "<tr>";
              
                foreach ($value as $resultado) {
                    echo "<td>$resultado</td>";
                }

            echo "</tr>";
        }
        ?>
        </tr>
    </tbody>
</table>
</main>
<footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
    
</body>
</html>

