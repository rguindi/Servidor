<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tarea 3-1</title>
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
             
            echo "<h3> 1.  Muestra el nombre del fichero que se está ejecutando</h3>";
            echo $_SERVER['PHP_SELF'];

            echo "<h3> 2.  Muestra la dirección IP del equipo desde el que estás accediendo. </h3>";
            echo $_SERVER['SERVER_ADDR'];

            echo "<h3> 3.  Muestra el path donde se encuentra el fichero que se está ejecutando.  </h3>";
            echo $_SERVER['REQUEST_URI'];

            echo "<h3> 4.  Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18.</h3>";
            $hoy = strtotime ("now");
            echo date ("y/m/d H:i:s", $hoy);

            echo "<h3> 5.  Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de 
            mes de año, hh:mm:ss , Zona horaria).</h3>";
            
            date_default_timezone_set ("Europe/Lisbon");
            echo date ("D/M/Y h:i:s", $hoy);

            echo "<h3> 6.  Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy 
            de tu cumpleaños</h3>";
            $cumple = strtotime ("19820924");
            echo date("d/m/Y", $cumple);

            echo "<h3> 7.  Calcular la fecha y el día de la semana de dentro de 60 días.</h3>";
            
            $sesentadias = strtotime ('+30 day', $hoy);
            echo date ("r", $sesentadias);
        



        ?>

    </main>        
 

    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>