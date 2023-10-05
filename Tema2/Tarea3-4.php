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

            $raul = strtotime ($_GET ['raul']);
            $manuel = strtotime ($_GET ['manuel']);
            
            echo "La fecha de nacimiento de Raúl es " . date ("d,M,Y", $raul) ."<br>";
            echo "La fecha de nacimiento de Manuel es " . date ("d,M,Y", $manuel) ."<br>";

            $hoy = strtotime ("now");
            echo "La fecha de hoy es " . date ("d,M,Y", $hoy) ."<br>";
            $edadraul = $hoy-$raul;
        

            $date1 = new DateTime($_GET ['raul']);
            $date2 = new DateTime($_GET ['manuel']);
            $diff = $date1->diff($date2);
            
            echo "Hay " . $diff->days /365 . ' años de diferencia. <br>';


            echo "<a href='/Tema2/vercontenido.php?contenido=Tarea3-4.php'>Ver Contenido</a>";
            
           

        ?>

    </main>


    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>