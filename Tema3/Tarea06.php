
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

    <style>
        #datostabla{
            text-align: center;
           
        }
        #resultado{
            background-color: green;
            text-align: center;
        }
        #roja{
            background-color: red;
            text-align: center;
            padding; 10px;
            display : inline;
            padding-left : 5px;
            padding-right : 5px;
            
        }

        #amarilla{
            background-color: yellow;
            text-align: center;
            display : inline;
            padding-left : 5px;
            padding-right : 5px;
            margin-left : 5px;
            margin-right : 5px;
        }

        #penalti{
            background-color: orange;
            text-align: center;
            display : inline;
            padding-left : 5px;
            padding-right : 5px;
        }



    </style>
</head>
<body>  
<header>
        <?php
            include("../html/header.html");
        ?>
        </header>
        <main>
            <h3>Tabla de resultados</h3>
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
                    
                        echo '<td id="datostabla">';  //Imprimimos en cada celda los dato de los visitantes

                            

                        foreach ($resultados as $resultado => $datos) {                          
                            
                         if ($resultado=="Resultado") {
                             
                             echo '<p id="resultado">'. $datos . '</p>';
                         }
                         if ($resultado=="Roja") {
                             
                            echo '<p id="roja">'. $datos . '</p>';
                        }
                        if ($resultado=="Amarilla") {
                             
                            echo '<p id="amarilla">'. $datos . '</p>';
                        }
                        if ($resultado=="Penalti") {
                             
                            echo '<p id="penalti">'. $datos . '</p>';
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
<h3>Tabla de Clasificacion</h3>

                <table border = "1">
                    <thead>
                        <th>Equipos</th>
                        <th>Puntos</th>
                        <th>Goles a favor</th>
                        <th>Goles en contra</th>
                    </thead>

                    
<?php


foreach ($liga as $locales => $visitantes) {  //ITERAMOS ARRAY LIGA
    $golescasa = 0;
    $golesvisitante = 0;
    $puntos = 0;



    foreach ($visitantes as $parametros1 => $datos) {  //ITERAMOS PARAMETROS

        foreach ($datos as $key => $value) {        //ITERAMOS LOS DATOS


            
                       // SUMAMOS DATOS  
                        if ($key=="Resultado"){                            

                            if (substr ($value, 0,1)==substr ($value, 2,1)){
                                $puntos+=1;
                                $golescasa += (int) substr ($value, 0,1);
                                $golesvisitante += (int) substr ($value, 2,1);

                            }elseif (substr ($value, 0,1) > substr ($value, 2,1)) {
                                $puntos += 3;
                                $golescasa += (int) substr ($value, 0,1);
                                $golesvisitante += (int) substr ($value, 2,1);
                            }else{
                                $golescasa += (int) substr ($value, 0,1);
                                $golesvisitante += (int) substr ($value, 2,1);
                            }

                            
                        }
                        
                        //-----------------------------------------------
    
                    }
                }
            
                echo "<tr><td><b>$locales</b></td><td>$puntos</td><td>$golescasa</td><td>$golesvisitante</td></tr>";
            }
            
        

?>



                </table>







    </main>
<footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
</body>
</html>
