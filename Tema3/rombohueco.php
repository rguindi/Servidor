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
   $espacios = $altura/2 -1;
   $asteriscos = 1;
   $huecos= 0;

  
   for ($i=0; $i < $altura/2 ; $i++) { 
        global $asteriscos;
       global $espacios;

      for ($it=0; $it < $espacios ; $it++) { 
       echo "&nbsp";
      }
      $espacios--;
      
      echo "*";

      for ($ite=0; $ite <$huecos ; $ite++) { 
           echo "&nbsp";
      }
      echo "*";
      echo "<br>";

      $huecos+=2;
      
   }
   //HAsta aqui la mitad del rombo
   $espacios = 0;
   for ($i=0; $i < $altura/2 ; $i++) { 
  

  for ($it=0; $it < $espacios ; $it++) { 
   
   echo "&nbsp";
  }
  $espacios++;


  echo "*";

  for ($ite=0; $ite <$huecos-2 ; $ite++) { 
       echo "&nbsp";
  }
  echo "*";
  echo "<br>";

  $huecos-=2;
}

?>

<footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
        </body>
</html>