<?php

//funciones = edad
// opcional argtumentos = ano mes dia
// Si queremos modificar variable dentro de la funcion se pasa con &$
//opcional return

//no adminte sobrecarga


function edad ($ano, $mes, $dia){

    $fecha1 =  new Datetime ($ano."-".$mes."-".$dia);
    $fecha2 = new Datetime ();
    $annos = ($fecha1->diff($fecha2))->y;
    return $annos;

}


function iva ($precio, $ivaP = 0.21){
return $precio * $ivaP;
}



function añadirArray ($array, $value){  // funcionamiento arraypush

$ultimo = count($array);
$array [$ultimo] = $value;

}


?>