<?

$exp = '/maria/';

echo preg_match($exp, 'maria es mi profesora favorita'); //devuelve 1

echo '<br>';

$exp = '/mari./'; //el punto es comodin

echo preg_match($exp, 'maria es mi profesora favorita'); //devuelve 1
echo '<br>';
echo preg_match($exp, 'mariO es mi profesora favorita'); //devuelve 1
echo '<br>';

$exp = '/mari[ao]/'; //el corchete para difernetes opciones
echo preg_match($exp, 'mario es mi profesora favorita'); //devuelve 1


echo '<br>';
$frase = 'Hoy es Halloween y salimos a la calle';
$exp = '/\s[A-Za-z]\s/'; // \s para espacios    busca espacio+letra+espacio
echo preg_match($exp, $frase ); //devuelve 1
echo '<br>';
$array = array();
preg_match_all($exp, $frase, $array); //Devuelve arrays con lo q encuentra
echo '<br>';

echo '<pre>';
print_r ($array);

echo '<br>Numerico';
$frase = 'Hoy 31 de Noviembre y es Halloween y salimos a la calle';
$exp = '/[0-9]/';
$exp = '/\d/';      //Las dos encuentran numeros
preg_match_all($exp, $frase, $array); //Devuelve arrays con lo q encuentra
echo '<br>';
echo '<pre>';
print_r ($array);



echo '<br>encontrar 4 numneros';
$frase = 'Hoy 31 de Noviembrede 2024 y es Halloween y salimos a la calle';
$exp = '/\d{4}/';      //Entre llaves se multiplica
preg_match_all($exp, $frase, $array); //Devuelve arrays con lo q encuentra
echo '<br>';
echo '<pre>';
print_r ($array);


echo '<br>encontrar IBAN   ';
$exp= '/^[A-Za-z]{2}\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/';  // para busqueda extricta meter patron entre ^ y $
$IBAN = 'ES45 3456 3456 34 3456345634';
echo preg_match($exp, $IBAN);



 //Q NO CONTENGA ALGO
echo '<br>';

$exp = '/mari[^ao]/'; //el capuichon niega

echo preg_match($exp, 'maria es mi profesora favorita'); 
echo '<br>';
echo preg_match($exp, 'mario es mi profesora favorita'); 
echo '<br>';



//nov, noviembre, o november

echo ' nov, noviembre, november<br>';
$exp = '/^nov(iembre|ember)?$/'; 

echo preg_match($exp, 'maria nocv es mi profesora favorita');
echo '<br>';
echo preg_match($exp, 'nov');
echo '<br>';
echo preg_match($exp, 'noviembre');
echo '<br>';
echo preg_match($exp, 'november');
echo '<br>';


echo ' QUE ACABEN EN ES<br>';
$array = ['Lunes', 'Martes', 'Sabado'];
$exp = '/es$/'; 
print_r (preg_grep($exp, $array));



//REEMPLAZAR
echo ' REEMPLAZAR<br>';
$array = [1, 'a', 'B', 4];
$patron = ['/^\d$/', '/^\D$/'];  //DOS EXPRESIONES REGULARES
$cambio = ['numero', 'letra'];  //LO Q SE CAMBIA. SE ASOCIAN PRIMERO CON PRIMERO SEGUNDO CON SEGUNDO

print_r (preg_replace($patron, $cambio, $array));  //REPLACE DEVUELVE TODOS


echo ' FILTRAR<br>';
$array = [1, 'a', 'B', 4];
$patron = ['/^\d$/']; 
$cambio = ['numero'];  

print_r (preg_filter($patron, $cambio, $array));  //FILTER DEVULEVE LO Q SE CAMBIA DEVUELVE TODOS








echo ' CALLBACK<br>';
// //COMPROBAR FECHAS CALLBACK         


// Formato fecha correcto

$frase = 'Si hay una fecha 1/2/2012 esta bien, pero 1/2/2021 mal, 15/12/21 mal';

 

// Si el mes y el dia tienen solo 1 digito, añado 0 delante.

// Si el año tiene 2 dígitos: si es <= 23 añado 20 delante y si es > 23 añado 19 delante



function corrige($coincide) {
    print_r($coincide);
    if ($coincide[1] < 10 && strlen($coincide[1]) != 2) {
        $coincide[1] = '0'.$coincide[1];
    }

    if ($coincide[3] < 10 && strlen($coincide[3]) != 2) {
        $coincide[3] = '0'.$coincide[3];

    }
    if ($coincide[5] <= 23) {

        $coincide[5] = '20'.$coincide[5];
    } elseif ($coincide[5] > 23 && $coincide[5] < 100) {

        $coincide[5] = '19'.$coincide[5];
    }
    echo "<br>";
    return $coincide[1].$coincide[2].$coincide[3].$coincide[4].$coincide[5];

}

$exp_Fecha = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';

// preg_match_all($exp_Fecha, $frase, $array);

echo "<pre>";

// print_r($array);

print_r(preg_replace_callback($exp_Fecha, 'corrige', $frase));