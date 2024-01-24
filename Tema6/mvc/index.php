<?php
require_once './config/config.php';
session_start();

if (isset ($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'loginController.php';

    // require $_SESSION['vista'];     //SI NO QUIERO HEADER NI FOOTER
    // exit;                           //REQUIERO VISTA LOGIN Y PARO EL FLUJO PARA Q NO CARGUE EL LAYOUT
    
}elseif (isset ($_REQUEST['home'])){
    $_SESSION['vista'] = VIEW.'home.php';
}
elseif(isset($_REQUEST['logout'])){
    session_destroy();
    header('Location: index.php'); //recargamos el index para que se destruya la sesion
    exit;
}
elseif (isset($_REQUEST['verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON.'userController.php';

}
elseif (isset($_REQUEST['verCitas'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'citasController.php';

}

if(isset($_SESSION['controller'])) require_once $_SESSION['controller'];  //si existe el controlador lo cargamos

require_once './views/layout.php';

