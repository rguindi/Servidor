<?php
$palabra = $_SESSION['palabra']['palabra'];
$letra = '';

if (isset($_SESSION['intentos'])) { 
    $intentos = $_SESSION['intentos'];

    //comprobamos lsi acierta
    if (!strpos($palabra, $_REQUEST['letra'])) {
        
        $intentos ++;
    }

    $_SESSION['intentos'] = $intentos;

} else {
    $intentos = 0;
    $_SESSION['intentos'] = $intentos;
}
if (isset($_REQUEST['letra'])) {
    $errores = array();
    if (validaLetra($errores))
    $letra = $_REQUEST['letra'];

}

if (isset($intentos) && $intentos >= 6) {

    $estadistica = [
        "id_usuario" => $_SESSION['usuario']->id_usuario,
        "id_palabra" => $_SESSION['palabra']['id_palabra'],
        "resultado" => "perdida",
        "intentos" => 6, 
        "fecha" => date('Y-m-d'), 
    ];
    post("estadisticas", $estadistica);
    unset($_SESSION['intentos']);
    unset($_SESSION['todas']);
    unset($_SESSION['palabra']);
    $_SESSION['vista'] = VIEW . 'fracaso.php';


}

if (isset($_SESSION['todas'])){


    if (isset($intentos) && $intentos < 6 && $palabra === $_SESSION['todas']) {
    
        $estadistica = [
            "id_usuario" => $_SESSION['usuario']->id_usuario,
            "id_palabra" => $_SESSION['palabra']['id_palabra'],
            "resultado" => "ganada",
            "intentos" => 6, 
            "fecha" => date('Y-m-d'), 
        ];
        post("estadisticas", $estadistica);
        unset($_SESSION['intentos']);
        unset($_SESSION['todas']);
        unset($_SESSION['palabra']);
        $_SESSION['vista'] = VIEW . 'victoria.php';
    
    
    }
}

if (isset($_REQUEST['volver'])) {
    $_SESSION['vista'] = VIEW . 'perfilUsuario.php';
    $_SESSION['controller'] = CON . 'perfilUsuarioController.php';
    unset($_SESSION['palabra']);
    unset($_SESSION['intentos']);
    unset($_SESSION['todas']);
    header('Location: index.php');
}



?>