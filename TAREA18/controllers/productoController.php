<?php

    $producto = ProductoDAO::findByCodigo($_REQUEST['producto']);
    //volver
    if (isset($_REQUEST['volver'])){
        unset($_SESSION['controller']);
        unset($_SESSION['view']);
        header("Location: ./");
        exit;
    }

    //SI NO LOGIN
    if (isset ($_REQUEST['compra'])&& !isset($_SESSION['usuario'])){
        $_SESSION['controller'] = CON. 'loginController.php';
        $_SESSION['view'] = VIEW.'login.php';
        header("Location: ./");
        exit;

        //SI COMPRAMOS
    }elseif (isset ($_REQUEST['compra'])&& isset($_SESSION['usuario'])){

        //COMPROBAMOS STOCK, DE MOMENTO UNA UNIDAD
        //Si no hay stock
        if(!ProductoDAO::comprobarStock($producto->codigo, 1)){
            $_SESSION['controller'] = CON. 'productoController.php';
            $_SESSION['view'] = VIEW.'sinStock.php';
            header("Location: ./");
            exit;
        }else{
            //Si hay stock
            $_SESSION['controller'] = CON. 'carritoController.php';
            $_SESION['producto'] = $producto;
            $_SESSION['view'] = VIEW.'carrito.php';
            header("Location: ./");
            exit;


    }
        
}

?>

