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
   $espacios = $altura/2 -1;
   $asteriscos = 1;

  
   for ($i=0; $i < $altura/2 ; $i++) { 
        global $asteriscos;
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
   //HAsta aqui la mitad del rombo

   for ($i=0; $i < $altura/2; $i++) { 
       
       for ($b=0; $b < $espacios+1 ; $b++) { 
         echo "&nbsp";
       }
       $espacios ++;

       for ($c=0; $c <$asteriscos-2 ; $c++) { 
        echo "*";
       }
       $asteriscos -=2;
       echo "<br>";
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