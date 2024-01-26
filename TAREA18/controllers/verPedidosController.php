<?php
if (!isset($_SESSION['usuario'])) {
    $_SESSION['controller'] = CON . 'loginController.php';
    $_SESSION['view'] = VIEW . 'login.php';
    header("Location: ./");
    exit;
   

// }else if(isset($_SESSION['usuario']) && isset($_REQUEST['factura'])){
//     header("Location: ../PDF/factura.php?id=".$_REQUEST['id']);
//     exit;

} 

    $pedidos = PedidoDAO::findByUser($_SESSION['usuario']->user);
    ?>