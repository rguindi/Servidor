<?php
$liga =
array(
    "Zamora" =>  array(
        "Salamanca" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
        )
    ),
    "Salamanca" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
        )
    ),
    "Avila" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
        ),
        "Salamanca" => array(
            "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
        )
    ),
    "Valladolid" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Salamanca" => array(
            "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "1-1", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
        )
    ),
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de Futbol</title>
</head>
<body>
    
<table border = "1">
    <thead>
        <?php
        $arrayauxiliar  = array ();
        echo "<th> Equipos</th>";
        foreach ($liga as $key => $value) {
            echo "<th> $key</th>";
            array_push ($arrayauxiliar, $key);
        }
        ?>
    </thead>
    <tbody>
        
        <?php
                    
                   

            foreach ($liga as $key => $value) {
                echo "<tr>";
                echo "<td>$key</td>";
                $contador = 0;
                

                    foreach ($value as $key1 => $value1) {
                        
                    
                        echo "<td>";
                        foreach ($value1 as $key2 => $value2) {                          
                            if ($arrayauxiliar[$contador]==$key2){
                                echo "<br></br>";
                            }else{
                            echo "$value2";
                            }
                        }
                        
                     $contador++;
                    
                    echo "</td>";
                
                
                    }
                    echo "</tr>";
                }
      
        ?>
       
    </tbody>
</table>
    
</body>
</html>