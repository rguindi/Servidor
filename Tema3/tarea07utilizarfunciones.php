<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Tarea Funciones</title>
</head>
<body>
    <header>
        <?php
        include("../html/header.html");
        ?>
    </header>
    <main>


<?php


include("tarea07funciones.php");

echo "<h3>Crea tu propio fichero de php que tenga las funciones de:</h3>";

echo "<h4>a. br() Pinta un br</h4>";


echo "Despues de esta frase llamo a la funcion";
br();
echo "Frase después de llamar la función";

echo "<h4>b. h1( cadena ) Pinta la cadena entre dos h1</h4>";

echo h1("Frase pasada por parametro a la función");


echo "<h4>c. p(cadena) Pinta la cadena entre etiqueta p</h4>";
echo p("Frase pasada por parametro a la función");

echo "<h4>d. self() Devuelve el fichero actual</h4>";
echo self();


echo "<h4>e. letraDni() Se introduce el dni y devuelve la letra que le corresponde</h4>";

echo "La letra correspondiente al dni 11971683 es: " . Dni('11971683');



echo "<h4>f. Realiza una página que utilice estas funciones</h4>";
echo "Esta.";

echo "<h3>Haz una función que genere números aleatorios que se le pase como parámetros: <br>
a. Array para lo rellene con los números <br>
b. Número mínimo incluido <br>
c. Número máximo incluido <br>
d. Número de números generados <br>
e. True si puedes repetirse/ False si no pueden repetirse</h3>";

echo "Probamos la funcion con los siguientes numeros. minimo 1, max 10, cantidad 9, true. ";

$arrayaleatorios = array();

$arrayaleatorios = aleatorios($arrayaleatorios, 1, 10, 9, true);

br();
foreach ($arrayaleatorios as $key => $value) {
     echo "$value , ";
}
br();

echo "Probamos la funcion con los siguientes numeros. minimo 1, max 10, cantidad 9, false. ";

$arrayaleatorios = aleatorios($arrayaleatorios, 1, 10, 9, false);

br();
foreach ($arrayaleatorios as $key => $value) {
     echo "$value , ";
}
br();




?>





</main>
    <footer>
        <?php
        include("../html/footer.html");
        ?>



    </footer>
</body>

</html>