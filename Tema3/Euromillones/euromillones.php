<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estiloeuromillones.css">
    <title>Euromillones</title>
</head>
<body>

        <?php
        include("./funcioneseuromillones.php");
        ?>

<h3>Genera con 2 arrays multidimensionales el Euromillones. Muestralo como en la figura.
    Los numeros amarillos vendrán por variables de la url. var1... var5.. especial 1 y especial2.
    Utiliza la funcion generarloteria para generar los numeros ganadores, y pintalos de verde.
    Escribe en un resumen cuantos numeros normales y especiales has acertado. 
</h3>

<?php

$ganadores = generar();
print_r($ganadores);

 $normales = array();

 for ($i=1; $i <=50 ; $i = $i+7) { 
    $normales [$i] = array(); 

    for ($j=$i+1; $j < $i +7 ; $j++) { 
        
        if ($j<50)array_push ($normales [$i], $j);
    }

}

echo "<table border= 1px>";
foreach ($normales as $key => $value1) {
//---------RECORREMOS GANADORES

// foreach ($ganadores as $llave => $valor) {
//     if ($key == $valor) {echo "<tr> <td class= 'ganadores'>$key</td>";
// }else  echo "<tr> <td>$key</td>";
// }

//------------------------
    echo "<tr> <td>$key</td>";

   foreach ($value1 as $key => $value) {
   echo  "<td>$value</td>";
   }
echo "</tr>";

}

echo "</table>";

$especiales = array();

for ($k=1; $k <=4 ; $k++) { 
   $especiales [$k] = array(); 

   for ($j=$k+4; $j <= $k+8 ; $j= $j+4) { 
       
       if ($j<12) array_push ($especiales [$k], $j);
   }

}

  
echo "<table border= 1px>";
foreach ($especiales as $key2 => $value2) {

    echo "<tr> <td>$key2</td>";
    //Si el numero q quiero pintar = sorteod echo td cambia

   foreach ($value2 as $key3 => $value3) {
   echo  "<td>$value3</td>";
   }
echo "</tr>";

}

echo "</table>";
    


 

?>
    
</body>
</html>
