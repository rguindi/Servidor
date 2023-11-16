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
<h2>FICHERO XML TRANSFORMADO</h2>


<table>
    <tr><th>Alumno</th><th>Nota 1</th><th>Nota 2</th><th>Nota3</th></tr>


<?php


//LEEMOS XML con el DOM
$dom = new DOMDocument();
$dom->load('./notas.xml');

foreach ($dom->childNodes as $notas) {
    foreach ($notas->childNodes as $alumno) {
        echo '<tr>';
        if ($alumno->nodeType == 1) {
            
            $nodo = $alumno->firstChild;
            do {
                if ($nodo->nodeType == 1) {
                    echo '<td>';
                    echo $nodo->nodeValue;
                    echo '</td>';
                }
            } while ($nodo = $nodo->nextSibling);

        }
        echo '</tr>';
    }
}
echo '</table>';

// $instrumentolista = $dom->getElementsByTagName("instrumento");
// foreach ($instrumentolista as $value) {
//     $a = $value->getElementsByTagName("nombre");
//     echo "\n" . $a->item(0)->tagName . ":" . $a->item(0)->nodeValue;
//     $a = $value->getElementsByTagName("familia");
//     echo "\n" . $a->item(0)->tagName . ":" . $a->item(0)->nodeValue;

// }



//<a href="./domdescarga.php">Descargar</a>

//GUARDAR EL ARCHIVO

//No se puede poner delante de un header echos (los guarda)
// header('Content-Type: text/xml');
// header("Content-Disposition: attachment; filename=instrumentos.xml");
// readfile ('instrumentos.xml');
// exit;



?>

</main>

<footer>
    <?php
    include("../../../html/footer.html");
    ?>



</footer>

</body>

</html>