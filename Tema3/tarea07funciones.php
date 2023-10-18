<?php



function br()
{
    echo "<br>";
}


function h1($cadena)
{

    echo "<h1>$cadena</h1>";
}

function p($cadena)
{

    echo "<p>$cadena</p>";
}


function self()
{

    return basename($_SERVER['PHP_SELF']);

}


function Dni($dni)
{

    $resto = $dni % 23;
    $patron = "TRWAGMYFPDXBNJZSQVHLCKE";

    return substr($patron, $resto, 1);

}

//FUNCION NUMEROS ALEATORIOS


function aleatorios($arrayarellenar, $min, $max, $cantidad, $repetir){


    if ($repetir){ 
        for ($i=0; $i < $cantidad; $i++) { 
            $arrayarellenar [$i]= rand ($min, $max); 
        }
    }


    elseif (!$repetir){ 

        for ($i=0; $i < $cantidad; $i++) { 

            $repetido = false;
            
            do{
                $aleatorio = rand ($min, $max);

                foreach ($arrayarellenar as $key => $value) {
                    if ($value == $aleatorio)    {
                        $repetido =true;
                        break;
                    }
                    else  $repetido = false;
                }
            
            if (!$repetido) $arrayarellenar [$i]= $aleatorio; 

            }while ($repetido);
        }



    }
    
    return $arrayarellenar;


}


?>