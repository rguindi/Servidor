<?php
function generar()
{
    $arrayganador = array();

    for ($i = 0; $i < 6; $i++) {
        $num = rand(1, 50);

        while (in_array($num, $arrayganador)) {
            $num = rand(1, 50);


        }
        array_push($arrayganador, $num);


        
    }
    return $arrayganador;

}


function generarespeciales()
{
    $arrayespeciales = array();

    for ($i = 0; $i < 2; $i++) {
        $num1 = rand(1, 11);

        while (in_array($num1, $arrayespeciales)) {
            $num1 = rand(1, 11);


        }
        array_push($arrayespeciales, $num1);


        
    }
    return $arrayespeciales;

}




?>