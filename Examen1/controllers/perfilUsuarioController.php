<?php
if(isset($_REQUEST['jugar'])){
         $_SESSION['vista'] = VIEW.'confJugar.php';
            $_SESSION['controller'] = CON.'confJugarController.php';
            header('Location: index.php');
}
if(isset($_REQUEST['estadisticas'])){
         $_SESSION['vista'] = VIEW.'estadisticas.php';
            $_SESSION['controller'] = CON.'estadisticasController.php';
            header('Location: index.php');
}



?>