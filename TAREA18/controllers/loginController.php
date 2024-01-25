<?php

if (isset($_SESSION['usuario'])) {
    header("Location: ./");
    exit;
}


if (isset($_REQUEST['Entrar']) && !textoVacio('user') && !textoVacio('pass')) {
    $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);
    // Si entramoa, nos lleva a la página principal
    if ($usuario) {
        //Si el usuario ha marcado la casilla de recordar usuario, creamos la cookie
        if (isset($_REQUEST['recuerda'])) {
            insertarCookie($_REQUEST['user']);
        }
        // Indicamos en la superglobal $_SESSION el usuario con el que estamos
        $_SESSION['usuario'] = $usuario;
        header("Location: ./");
    } else {


        echo "<p class='errorlogin'>No existe el usuario o Contraseña.</p>";
    }
}

if (isset ($_REQUEST['home'])){
    $_SESSION['view'] = VIEW.'home.php';
    unset($_SESSION['controller']);
    header("Location: ./");
}

?>