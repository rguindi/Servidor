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

     //FUNCIONES MATEMATICAS

     //RAndom

     $num1 = rand(2, 5000);
     echo "numero aleatorio es $num1 <br>";

     // exponencia
     $num1 = pow(5, 3);
     echo "La exponencia es $num1 <br>";

     //redondeo

     $num1 = 5.2352352;
     echo "El numero redondeado es " . round ($num1, 3) ."<br>";

     //CASTING IMPLICITO
     $num2 = "5";
     $num2 = 5;

     //CASTING EXPLICITO
     $num4 = "5";
     $num5 =  (int) $num4;
     

    ?>
</body>
</html>