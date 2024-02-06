<?php

if(isset($_REQUEST['jugarAleatoria'])){       //Pedimos a la api todas las palabras y escogemos una aleatoria
    $palabras = getApi('palabras');
    $palabras = json_decode($palabras, true);
    $num = count ($palabras);
    $palabra = rand(0, $num);
    $_SESSION['palabra'] = $palabras[$palabra];
    $_SESSION['vista'] = VIEW.'zonaJuego.php';
    $_SESSION['controller'] = CON.'zonaJuegoController.php';
    header('Location: index.php');

}
if(isset($_REQUEST['jugarConLetras'])){    //Pedimos a la api palabras con mas letras de las indicadas y escogemos una aleatoria
    $recurso = 'palabras?num_letras='.$_REQUEST['letraIn'];
    $palabras = getApi($recurso);
    $palabras = json_decode($palabras, true);
    $num = count ($palabras);
    $palabra = rand(0, $num);
    $_SESSION['palabra'] = $palabras[$palabra];
    $_SESSION['vista'] = VIEW.'zonaJuego.php';
    $_SESSION['controller'] = CON.'zonaJuegoController.php';
    header('Location: index.php');
}



?>