<?php
    $altura =45;
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