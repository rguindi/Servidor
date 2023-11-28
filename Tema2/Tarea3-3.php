<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tarea 3-2</title>
    <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body>
    
    <header>
        <?php
            include("../html/header.html");
        ?>
        </header>
    <main>
    <h3>3. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre
el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023) </h3>
        <?php

            $fecha = strtotime ($_GET ['variable']);
            echo "El día de la semana de la fecha pasada por parámetro es " .date ("l", $fecha);

            echo "<br>";
            $ruta = $_SERVER['SCRIPT_FILENAME'];
            echo "<a href=http://".$_SERVER['SERVER_ADDR']."/vercontenido.php?contenido=".$ruta.">Ver Contenido</a>";
            
           
        
        ?>

    </main>


    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>