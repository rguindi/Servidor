<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
    <?php
    require("./funcionesBD.php");
    // cargarScript();

    ?>
    <br><br>
    
    <form action="" method="get">
       <input name = 'leer' type="submit" value="Mostrar Datos">
       
    </form>
    <br><br>
 <?php 
 if (botonLeer()) {
    leerTabla(); 
 }
 ?>

<form action="" method="get">
       <input name = 'add' type="submit" value="+">
       
    </form>

    
</body>
</html>