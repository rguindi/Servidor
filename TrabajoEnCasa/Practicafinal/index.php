<?php
require_once './config/config.php';
session_start();

if(isset($_REQUEST['logout'])){
    session_destroy();
    header('Location: index.php'); //recargamos el index para que se destruya la sesion
    exit;
}
elseif (isset($_REQUEST['verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON.'userController.php';

}


if(isset($_SESSION['controller'])) require_once $_SESSION['controller'];  //si existe el controlador lo cargamos

require_once './views/layout.php';

