<?php
    echo "Hola mundo";
    echo "<br>Hola mundo", "Hola";

    print "<br>Hola mundo con print";

    //17,99

print "<br>";
printf ("%s", "17,99");
print "<br>";
printf ("%d", "17,99");
print "<br>";
printf ("%f", "17.99");

print "<br> información de var_dump";
print "<br>";
var_dump("Raul");
print "<br>";
var_dump(3, "Maria", true);


//declarar variables
print "<br> Tipos de variables<br> ";
$mivariable =6;
echo "mi variable es $mivariable es de tipo " . gettype($mivariable);
print "<br>";

$mivariable = 6.5;
echo "mi variable es $mivariable es de tipo " . gettype($mivariable);

print "<br> El raro del booleano";
print "<br>";
$boleano = true; 
echo "mi variable es $boleano es de tipo " . gettype($boleano);
print "<br>";
$boleano = false; 
echo "mi variable es $boleano es de tipo " . gettype($boleano);
print "<br>";
var_dump ($boleano);
print "<br>";
$micadena = "Hola";
echo "mi variable es $micadena es de tipo " . gettype($micadena);
print "<br>";

$nulo = null;
echo "mi variable es $nulo es de tipo " . gettype($nulo);
print "<br>";

$cadena = "Se escribe con comillas \"a\"";
print "<br>";
echo $cadena;
print "<br>";

$heredoc = <<< TEXT
escribo todo lo que quiero con "comillas"
TEXT;
echo $heredoc;
print "<br>";

$var = 0x2A;
echo $var;

print "<br>";
$var = 8.3e-1;
echo $var;

echo "<h2>Conversion de tipòs</h2>";

$a = 4;
$b = 4.5;
$c = "Raul";
$d = true;
$e = null;
echo "<br>";
$r=$a+$b;
echo "Mi variable $a +$b es $r de tipo " .gettype ($r);
echo "<br>";
$r=$a.$c;
echo "Mi variable $a.$c es $r de tipo " .gettype ($r);
echo "<br>";
$r=$a+$d;
echo "Mi variable $a +$d es $r de tipo " .gettype ($r);

echo "<h2>Variable de variables</h2>";

$alumno1 = "miguel";
$alumno2 = "fernando";
$alumno3 = "Giorgi";
$alumno4 = "Raul";

$elegido = "alumno".random_int (1,4);

echo $elegido;
echo "<br>";
echo $$elegido;
echo "<br>";

?>
<a href="mipagina.php?nombre=raul&nombre2=pepe"> link</a>




