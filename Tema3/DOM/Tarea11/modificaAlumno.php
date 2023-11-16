<?php
if (isset($_REQUEST['guardar'])) {
    $alumno = $_REQUEST['alumno'];
    $nota1 = $_REQUEST['nota1'];
    $nota2 = $_REQUEST['nota2'];
    $nota3 = $_REQUEST['nota3'];
    $dom = new DOMDocument();
    $dom->load('./notas.xml');


    foreach ($dom->childNodes as $notas) {
        foreach ($notas->childNodes as $alumno) {
            if ($alumno->nodeType == 1) {
                $nodo = $alumno->firstChild;
                do {
                    if (($nodo->nodeType == 1)) {
                        if (($nodo->tagName) === $alumno) {

                            $primera = $nodo->nextSibling->nodeValue = $nota1;
                            $segunda = $primera->nextSibling->nodeValue = $nota2;
                            $tercera = $segunda->nextSibling->nodeValue = $nota3;

                        }
                    }
                } while ($nodo = $nodo->nextSibling);
            }

        }
    }
    $dom->formatOutput = true; //Lo formateamos
    $dom->save('notas.xml');    //Lo guardamos

    header('Location: ./LeeFicheroXML.php');  //Nos redirigimos a la pagina donde vamos a leerlo
    exit();



} else {

    ?>



    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/styles.css">
        <link rel="stylesheet" href="./estilos.css">
        <title>DOM</title>
    </head>

    <body>
        <header>
            <?php
            include("../../../html/header.html");
            ?>
        </header>

        <main>
            <h2>MODIFICAR ALUMNO</h2>
            <table>
                <tr>
                    <th>Alumno</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota3</th>
                </tr>

                <?php

                $modificar = $_REQUEST['alumno'];

                //LEEMOS XML con el DOM
                $dom = new DOMDocument();     //Aunque el xml ya esté creado tenemos que declarar la variable (estamos en otro fichero)
                $dom->load('./notas.xml');

                $contador = 1;
                $contadornotas = 1;
                foreach ($dom->childNodes as $notas) {
                    echo '<form action="" method="get">';
                    foreach ($notas->childNodes as $alumno) {

                        echo '<tr>';
                        if ($alumno->nodeType == 1) {
                            $nodo = $alumno->firstChild;
                            do {

                                if (($nodo->nodeType == 1) && ($contador == $modificar)) {
                                    if (($nodo->tagName) === 'nombre') {

                                        echo '<td>';
                                        echo '<label for="alumno">Nombre:<input type="text" name="alumno" readonly value="' . $nodo->nodeValue . '"></input></label>';
                                        echo '</td>';
                                    } else {
                                        echo '<td>';
                                        echo '<label for="alumno">Nombre:<input type="text" name="nota' . $contadornotas . '" value="' . $nodo->nodeValue . '"></input></label>';
                                        echo '</td>';
                                        $contadornotas++;
                                    }
                                }
                            } while ($nodo = $nodo->nextSibling);
                        }
                        echo '</tr>';
                        $contador++;
                    }
                }

                echo '</table>';
                echo '<label for="guardar"><input class="boton-guarda" type="submit" value="Guardar" name="guardar"></label>';

                echo '</form>';
} ?>


    </main>

    <footer>
        <?php
        include("../../../html/footer.html");
        ?>



    </footer>

</body>

</html>