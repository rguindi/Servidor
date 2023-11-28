<?php
$liga =
    array(
        "Zamora" => array(
            "Salamanca" => array(
                "Resultado" => "3-2",
                "Roja" => 1,
                "Amarilla" => 0,
                "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1",
                "Roja" => 0,
                "Amarilla" => 0,
                "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2",
                "Roja" => 1,
                "Amarilla" => 1,
                "Penalti" => 1
            )
        ),
        "Salamanca" => array(
            "Zamora" => array(
                "Resultado" => "3-2",
                "Roja" => 1,
                "Amarilla" => 0,
                "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1",
                "Roja" => 0,
                "Amarilla" => 0,
                "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2",
                "Roja" => 1,
                "Amarilla" => 2,
                "Penalti" => 1
            )
        ),
        "Avila" => array(
            "Zamora" => array(
                "Resultado" => "3-2",
                "Roja" => 1,
                "Amarilla" => 0,
                "Penalti" => 2
            ),
            "Salamanca" => array(
                "Resultado" => "1-3",
                "Roja" => 1,
                "Amarilla" => 3,
                "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-3",
                "Roja" => 1,
                "Amarilla" => 0,
                "Penalti" => 1
            )
        ),
        "Valladolid" => array(
            "Zamora" => array(
                "Resultado" => "3-2",
                "Roja" => 1,
                "Amarilla" => 0,
                "Penalti" => 0
            ),
            "Salamanca" => array(
                "Resultado" => "3-1",
                "Roja" => 0,
                "Amarilla" => 0,
                "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "1-1",
                "Roja" => 1,
                "Amarilla" => 1,
                "Penalti" => 2
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
        #datostabla {
            text-align: center;

        }

        #resultado {
            background-color: green;
            text-align: center;
        }

        #roja {
            background-color: red;
            text-align: center;
            padding;
            10px;
            display: inline;
            padding-left: 5px;
            padding-right: 5px;

        }

        #amarilla {
            background-color: yellow;
            text-align: center;
            display: inline;
            padding-left: 5px;
            padding-right: 5px;
            margin-left: 5px;
            margin-right: 5px;
        }

        #penalti {
            background-color: orange;
            text-align: center;
            display: inline;
            padding-left: 5px;
            padding-right: 5px;
        }

        table {
            background-color: black;
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
        <table border="1">
            <thead>
                <?php //Imprimimos la primera linea
                $arrayauxiliar = array();
                echo "<th> Equipos</th>";
                foreach ($liga as $key => $value) {
                    echo "<th> $key</th>";
                    array_push($arrayauxiliar, $key); //Guardamos un array auxiliar con los equipos
                }
                ?>
            </thead>
            <tbody>

                <?php



                foreach ($liga as $local => $visitantes) {
                    echo "<tr>";
                    echo "<td>$local</td>"; //Imprimimos en la primera celda de cada linea el equipo local
                
                    $contador = 0;


                    foreach ($visitantes as $visitante => $resultados) { //bucle de los visitantes
                
                        if ($arrayauxiliar[$contador] === $local)
                            echo "<td></td>"; //SI nos entramos en equipo local iprimimos en blanco
                
                        echo '<td id="datostabla">'; //Imprimimos en cada celda los dato de los visitantes
                


                        foreach ($resultados as $resultado => $datos) {

                            if ($resultado == "Resultado") {

                                echo '<p id="resultado">' . $datos . '</p>';
                            }
                            if ($resultado == "Roja") {

                                echo '<p id="roja">' . $datos . '</p>';
                            }
                            if ($resultado == "Amarilla") {

                                echo '<p id="amarilla">' . $datos . '</p>';
                            }
                            if ($resultado == "Penalti") {

                                echo '<p id="penalti">' . $datos . '</p>';
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

        <table border="1">
            <thead>
                <th>Equipos</th>
                <th>Puntos</th>
                <th>Goles a favor</th>
                <th>Goles en contra</th>
            </thead>


            <?php

            $clasificacion = array();

            foreach ($liga as $equipolocal => $equiposvisitantes) { //Recorremos liga
            
                foreach ($equiposvisitantes as $equipovisitante => $datos) {

                    $resultado = $datos["Resultado"];

                    $resul = explode("-", $resultado);

                    if ($resul[0] > $resul[1]) {
                        if (!isset($clasificacion[$equipolocal]["puntos"]))
                            $clasificacion[$equipolocal]["puntos"] = 3;
                        else
                            $clasificacion[$equipolocal]["puntos"] += 3;


                    } elseif ($resul[0] == $resul[1]) {
                        if (!isset($clasificacion[$equipolocal]["puntos"]))
                            $clasificacion[$equipolocal]["puntos"] = 1;
                        else
                            $clasificacion[$equipolocal]["puntos"] += 1;

                        if (!isset($clasificacion[$equipovisitante]["puntos"]))
                            $clasificacion[$equipovisitante]["puntos"] = 1;
                        else
                            $clasificacion[$equipovisitante]["puntos"] += 1;

                    } else {
                        if (!isset($clasificacion[$equipovisitante]["puntos"]))
                            $clasificacion[$equipovisitante]["puntos"] = 3;
                        else
                            $clasificacion[$equipovisitante]["puntos"] += 3;
                    }


                    if (!isset($clasificacion[$equipolocal]["golesfavor"]))
                        $clasificacion[$equipolocal]["golesfavor"] = $resul[0];
                    else
                        $clasificacion[$equipolocal]["golesfavor"] += $resul[0];

                    if (!isset($clasificacion[$equipolocal]["golescontra"]))
                        $clasificacion[$equipolocal]["golescontra"] = $resul[1];
                    else
                        $clasificacion[$equipolocal]["golescontra"] += $resul[1];

                    if (!isset($clasificacion[$equipovisitante]["golesfavor"]))
                        $clasificacion[$equipovisitante]["golesfavor"] = $resul[1];
                    else
                        $clasificacion[$equipovisitante]["golesfavor"] += $resul[1];

                    if (!isset($clasificacion[$equipovisitante]["golescontra"]))
                        $clasificacion[$equipovisitante]["golescontra"] = $resul[0];
                    else
                        $clasificacion[$equipovisitante]["golescontra"] += $resul[0];

                }

            }



            foreach ($clasificacion as $key => $value) {

                echo "<tr> <td>$key</td>";


                echo "<td> " . $value['puntos'] . "</td>";
                echo "<td>" . $value['golesfavor'] . "</td>";
                echo "<td> " . $value['golescontra'] . "</td>";




                echo "<tr>";
            }






            //SOLUCION  Creamos array asociativo. 
            // Indices. Nombres equipos
            //Valores. arrays de puntos Gfavor y g en contra.
            
            //foreach liga - local y partidos
            //foreach partidos - rival - partido
            //Para cortar resultados EXPLODE
            //if explode[0]>explode[1]...  añadimos al array creado [clave] [valor]   puntos
            //......
            //repetimos para goles
            

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