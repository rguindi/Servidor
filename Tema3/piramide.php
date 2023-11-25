<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Rombo</title>
</head>
<body>
<header>
        <?php
            include("../html/header.html");
        ?>
        </header>
        <main>

<?php
    $altura = $_GET ['altura'];
    $espacios = $altura -1;
    $asteriscos = 1;

   
    for ($i=0; $i < $altura ; $i++) {              //Las variables extienden su ambito en sus funciones hijo, pero no al revés
       
        // global $espacios;
       for ($it=0; $it < $espacios ; $it++) { 
        echo "&nbsp";
       }
       $espacios--;
       

       for ($it=0; $it <$asteriscos ; $it++) { 
            echo "*";
       }
       echo "<br>";
       $asteriscos+=2;
       
    }

    


?>
</main>
<footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
        </body>
</html>