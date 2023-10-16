
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
    <link rel="stylesheet" href="../css/styles.css">
    <title>Equipos de Futbol</title>
</head>
<body>
<header>
        <?php
            include("../html/header.html");
        ?>
        </header>
        <main>
<table border = "1">
    <thead>
        <?php  //Imprimimos la primera linea
        $arrayauxiliar  = array ();
        echo "<th> Equipos</th>";
        foreach ($liga as $key => $value) {
            echo "<th> $key</th>";
            array_push ($arrayauxiliar, $key); //Guardamos un array auxiliar con los equipos
        }
        ?>
    </thead>
    <tbody>
        
        <?php
                    
                   

            foreach ($liga as $local => $visitantes) {
                echo "<tr>";
                echo "<td>$local</td>";    //Imprimimos en la primera celda de cada linea el equipo local

                $contador = 0;
                

                    foreach ($visitantes as $visitante => $resultados) { //bucle de los visitantes
                        
                        if ($arrayauxiliar[$contador]===$local) echo "<td></td>"; //SI nos entramos en equipo local iprimimos en blanco
                    
                        echo "<td>";  //Imprimimos en cada celd los dato de los visitantes

                            

                        foreach ($resultados as $resultado => $datos) {                          
                            
                            
                            echo "$datos";
                            
                        }
                        
                     $contador++;
                    
                    echo "</td>";
                
                
                    }
                    echo "</tr>";
                }

                foreach ($arrayauxiliar as $key => $value) {
                        }
      
        ?>
       
    </tbody>
</table>
    </main>
<footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
</body>
</html>
