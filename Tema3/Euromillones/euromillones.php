<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estiloeuromillones.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <title>Euromillones</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");
        ?>
    </header>

    <?php

    include("./funcioneseuromillones.php");

    ?>
    <main>

        <h3>Genera con 2 arrays multidimensionales el Euromillones. Muestralo como en la figura.
            Los numeros amarillos vendrán por variables de la url. var1... var5.. especial 1 y especial2.
            Utiliza la funcion generarloteria para generar los numeros ganadores, y pintalos de verde.
            Escribe en un resumen cuantos numeros normales y especiales has acertado.
        </h3>

        <?php

        $ganadores = generar();
        $ganadoresespeciales = generarespeciales();

        $general1 = $_GET["var1"];
        $general2 = $_GET["var2"];
        $general3 = $_GET["var3"];
        $general4 = $_GET["var4"];
        $general5 = $_GET["var5"];
        $general6 = $_GET["var6"];
        $especial1 = $_GET["especial1"];
        $especial2 = $_GET["especial2"];

        $generalesjugados = [$general1, $general2, $general3, $general4, $general5, $general6];
        $especialesjugados = [$especial1, $especial2];

        $acertados = 0;
        $acertados2 = 0;

        $normales = array();

        for ($i = 1; $i <= 50; $i = $i + 7) {
            $normales[$i] = array();

            for ($j = $i + 1; $j < $i + 7; $j++) {

                if ($j < 50)
                    array_push($normales[$i], $j);
            }

        }

        // echo '<pre>';
        // print_r ($normales);

        echo "<table border= 1px>";
        foreach ($normales as $key => $value1) {

            //---------RECORREMOS GANADORES
            $ganador1 = false;
            foreach ($ganadores as $llave => $valor) {
                if ($key == $valor)
                    $ganador1 = true;

            }
            //------------------------
        

            //RECORREMOS JUGADOS
            $jugado1 = false;
            foreach ($generalesjugados as $llave5 => $valor4) {
                if ($key == $valor4)
                    $jugado1 = true;

            }

            //----------------
        

            if ($ganador1 && $jugado1) {
                echo "<tr> <td class ='premiados'>$key</td>";
                $acertados++;
            } elseif ($jugado1)
                echo "<tr> <td class ='jugados'>$key</td>";
            elseif ($ganador1)
                echo "<tr> <td class ='ganadores'>$key</td>";
            else
                echo "<tr> <td>$key</td>";



            foreach ($value1 as $key => $value) {

                //---------RECORREMOS GANADORES
                $ganador1 = false;
                foreach ($ganadores as $llave => $valor) {
                    if ($value == $valor)
                        $ganador1 = true;

                }
                //------------------------
        

                //RECORREMOS JUGADOS
                $jugado1 = false;
                foreach ($generalesjugados as $llave5 => $valor4) {
                    if ($value == $valor4)
                        $jugado1 = true;

                }

                //----------------
        
                if ($ganador1 && $jugado1){
                    echo "<td class ='premiados'>$value</td>";
                    $acertados++;

                }
                elseif ($jugado1)
                    echo "<td class ='jugados'>$value</td>";
                elseif ($ganador1)
                    echo "<td class ='ganadores'>$value</td>";
                else
                    echo "<td>$value</td>";



                // echo $ganador1 ? "<td class ='ganadores'>$value</td>" : "<td>$value</td>";
        
            }
            echo "</tr>";

        }

        echo "</table>";

        //TABLA2
        
        $especiales = array();

        for ($k = 1; $k <= 4; $k++) {
            $especiales[$k] = array();

            for ($j = $k + 4; $j <= $k + 8; $j = $j + 4) {

                if ($j < 12)
                    array_push($especiales[$k], $j);
            }

        }


        echo "<table border= 1px>";
        foreach ($especiales as $key2 => $value2) {

            //---------RECORREMOS GANADORES ESPECIALES
            $ganador3 = false;
            foreach ($ganadoresespeciales as $llave => $valory) {
                if ($key2 == $valory)
                    $ganador3 = true;

            }
            //------------------------
        

            //---------RECORREMOS JUGADOS ESPECIALES
            $jugado9 = false;
            foreach ($especialesjugados as $llave => $valor) {
                if ($key2 == $valor)
                    $jugado9 = true;

            }
            //------------------------
        
            if ($ganador3 && $jugado9) {
                echo "<tr> <td class ='premiados'>$key2</td>";
                $acertados2++;
            } elseif ($jugado9)
                echo "<tr> <td class ='jugados'>$key2</td>";
            elseif ($ganador3)
                echo "<tr> <td class ='ganadores'>$key2</td>";
            else
                echo "<tr> <td>$key2</td>";






            // echo $ganador2 ? "<tr> <td class ='ganadores'>$key2</td>" : "<tr> <td>$key2</td>";
        


            foreach ($value2 as $key3 => $value3) {

                //---------RECORREMOS GANADORES ESPECIALES
                $ganador7 = false;
                foreach ($ganadoresespeciales as $llave => $valor) {
                    if ($value3 == $valor)
                        $ganador7 = true;

                }
                //------------------------
        

                //---------RECORREMOS JUGADOS ESPECIALES
                $jugado6 = false;
                foreach ($especialesjugados as $llave => $valor) {
                    if ($value3 == $valor)
                        $jugado6 = true;

                }
                //------------------------
                if ($ganador7 && $jugado6){
                    echo "<td class ='premiados'>$value3</td>";
                    $acertados2++;
                }
                elseif ($jugado6)
                    echo "<td class ='jugados'>$value3</td>";
                elseif ($ganador7)
                    echo "<td class ='ganadores'>$value3</td>";
                else
                    echo "<td>$value3</td>";



                // echo $ganador2 ? "<td class ='ganadores'>$value3</td>" : "<td>$value3</td>";
        

            }
            echo "</tr>";

        }

        echo "</table>";

        echo "<h5> Has acertado " . $acertados . " numeros generales y " . $acertados2 . " especiales";





        ?>
    </main>

    <footer>
        <?php
        include("../../html/footer.html");
        ?>



    </footer>

</body>

</html>