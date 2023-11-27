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
        <h3>4. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos
personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años. </h3>
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

            $diff = $date1->diff($date2);      //Resta date1-date2
            
            
            echo "Hay " . $diff->days /365 . ' años de diferencia. <br>';


            echo "<br>";
            echo "<h3>5. Crea un enlace a una página en cada página anterior que muestre el contenido del fichero
            que se está ejecutando.
             </h3>";
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