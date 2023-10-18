<?php
function generar(){
    $arrayganador = array();

    for ($i=0; $i <6 ; $i++) { 
        array_push ($arrayganador, rand(1, 50));
    }
    
    foreach ($arrayganador as $key => $value) {
       
      
    }
    return $arrayganador;

}

 

?>