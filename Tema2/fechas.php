<?php

echo  time();

echo "<p>Zona que tiene el servidor</p>";
echo date_default_timezone_get();

echo "<p>Cambiada</p>";
date_default_timezone_set ("Europe/Madrid");
echo date_default_timezone_get();
echo "<br>";

echo date ("r");
echo "<br>";
echo date ("d/m/y H:i:s");

echo "<p>Fechas cumnpleaños</p>";
$cumplea = strtotime ("09/24/1982");
echo $cumplea;
echo "<p>" .date("d/m/y", $cumplea) . "</p>";

$hoy = strtotime ("now");

echo $hoy;
echo "<p>" .date("d/m/y", $hoy) . "</p>";

$edad = $hoy-$cumplea;
 echo $edad;
 echo "<br>";
 echo "Tengo " . floor(($hoy - $cumplea) / (60 * 60 * 24 * 365)) . " años";

 
 echo '<h2>APUNTES DE INTERNET</h2>';
 //RESTAR FECHAS:


$fecha1 = new DateTime('2023-01-01 10:00:00');
$fecha2 = new DateTime('2023-02-15 15:30:45');

$diferencia = $fecha1->diff($fecha2);

echo "Años: " . $diferencia->y . "<br>";
echo "Meses: " . $diferencia->m . "<br>";
echo "Días: " . $diferencia->d . "<br>";
echo "Horas: " . $diferencia->h . "<br>";
echo "Minutos: " . $diferencia->i . "<br>";
echo "Segundos: " . $diferencia->s . "<br>";

$fecha1 = new DateTime('2023-01-01');
$fecha2 = new DateTime('2023-02-15');

// Restar las fechas y obtener un objeto DateInterval
$diferencia = $fecha1->diff($fecha2);

// Acceder a las propiedades del objeto DateInterval
echo "Años: " . $diferencia->y . "<br>";
echo "Meses: " . $diferencia->m . "<br>";
echo "Días: " . $diferencia->d . "<br>";





// Fecha actual
$fechaActual = new DateTime();

// Convertir una cadena a una fecha utilizando strtotime
$nuevaFechaStr = "2023-12-31";
$nuevaFecha = new DateTime(date('Y-m-d', strtotime($nuevaFechaStr)));

// Calcular la diferencia
$diferencia = $fechaActual->diff($nuevaFecha);

// Mostrar la diferencia en días
echo "La diferencia en días es: " . $diferencia->days;

//SUMAR FECHAS
$fecha12 = new DateTime('2023-01-01');
$fecha22 = new DateTime('2023-02-15');

// Sumar las fechas
$fecha12->add($fecha22->diff(new DateTime()));  //calcula la diferencia entre $fecha2 y la fecha actual. Luego, ese intervalo se agrega a $fecha1 usando el método add

// Mostrar la nueva fecha
echo $fecha12->format('Y-m-d');



// a partir de una cadena
$fecha = DateTime::createFromFormat('d-m-Y', '03-05-2022');
echo $fecha->format('Y-m-d');

?>