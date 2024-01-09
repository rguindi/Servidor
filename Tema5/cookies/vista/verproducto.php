<?php
if (!isset($_GET['id'])){
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
</head>
<body>
  
    <?php
    require_once '../funciones/funcionesBD.php';
    require_once '../funciones/funciones.php';
    $producto = findById($_GET['id']);
    if($producto){
        //crear cookie
        insertarCookie($_GET['id']);
        echo "<h1>".$producto['nombre']."</h1>";
        echo "<p>".$producto['descripcion']."</p>";
        echo "<img src='../".$producto['alta']."'>";
        echo "<a href='home.php'>Volver</a>";
    }else{
        echo "No existe el producto";
    }
    ?>
    
</body>
</html>
