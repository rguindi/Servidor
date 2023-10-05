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
        <?php

            $fecha = strtotime ($_GET ['variable']);
            echo "El día de la semana de la fecha pasada por parámetro es " .date ("l", $fecha);
        
        ?>

    </main>


    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>