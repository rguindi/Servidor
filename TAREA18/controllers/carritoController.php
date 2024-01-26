<?php
if (isset($_REQUEST['compra']) && !isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;
} elseif (isset($_REQUEST['compra']) && isset($_SESSION['usuario'])) {
   
    if (!ProductoDAO::comprobarStock($_SESSION['producto']->codigo, $_REQUEST['cantidad'])) {
        $_SESSION['controller'] = CON . 'productoController.php';
        $_SESSION['view'] = VIEW . 'sinStock.php';
        header("Location: ./");
        exit;
        //SI HAY STOCK
    } else {
       //Procesamos la compra
       
    }
} elseif (isset($_REQUEST['volver'])) {
    unset($_SESSION['controller']);
    unset($_SESSION['view']);
    header("Location: ./");
    exit;
}
?>