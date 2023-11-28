<?php

// a partir de una cadena
$fecha = DateTime::createFromFormat('d-m-Y', '03-05-2022');   //Formatos https://www.php.net/manual/es/datetime.formats.php
echo $fecha->format('Y-m-d'); //2022-05-03
echo '<br>';
echo $fecha->format('Y');     //2022
echo '<br>';
echo $fecha->format('d-M-y');  //03-May-22
echo '<br>';
echo date('l',$fecha->getTimestamp());  //date funciona con Timestamp, por eso lo obtengo del DateTime
//https://www.php.net/manual/es/function.date.php


//Obtienen el mismo Resultado
echo '<br>';
echo $fecha->format('Y-m-d'); //2022-05-03
echo '<br>';
echo date('Y-m-d',$fecha->getTimestamp());

echo '<h2>sumar</h2>';

//SUMAR FECHAS
$fecha12 = new DateTime('2023-01-01');
$fecha22 = new DateTime('2023-02-15');

// Sumar las fechas
$fecha12->add($fecha22->diff(new DateTime()));  //calcula la diferencia entre $fecha2 y la fecha actual. Luego, ese intervalo se agrega a $fecha1 usando el método add

// Mostrar la nueva fecha
echo $fecha12->format('Y-m-d');  //2023-10-14
echo '<br>';
echo $fecha12->format('Y');     
echo '<br>';
echo $fecha12->format('d-M-y');


?>