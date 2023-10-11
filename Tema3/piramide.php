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

<?php
    $altura = $_GET ['altura'];
    $espacios = $altura -1;
    $asteriscos = 1;

   
    for ($i=0; $i < $altura ; $i++) { 
       
        global $espacios;
       for ($it=0; $it < $espacios ; $it++) { 
        echo "&nbsp";
       }
       $espacios--;
       

       for ($ite=0; $ite <$asteriscos ; $ite++) { 
            echo "*";
       }
       echo "<br>";
       $asteriscos+=2;
       
    }

    


?>

<footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
        </body>
</html>