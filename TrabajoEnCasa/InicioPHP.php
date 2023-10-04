<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
</head>
<body>
    <?php

    print "Empiezo el curso  <br>" ;  //Con salto de linea

    $nombre = "Raul";
    $edad = 41;

    print "Me llamo  $nombre y tengo " . $edad . " años. <br>";
    print 'Me llamo  $nombre y tengo ' . $edad . " años. <br>"; //Diferencia con comillas simples


   //Comparacion de dos cadenas iguales
    $primera ="casa";
    $segunda = "CASA";

    $resultado = strcmp ($primera,$segunda);
     echo "El resultado es $resultado <br>";
     $resultado = strcasecmp ($primera, $segunda);   //ignorando mayusculas
     echo "El resultado es $resultado <br>";

    ?>
</body>
</html>