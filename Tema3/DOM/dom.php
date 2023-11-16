<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <title>DOM</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");
        ?>
    </header>

<main>


<?php


//CREAMOS XML con el DOM

$dom = new DOMDocument('1.0', 'utf-8');  //Creamos documento
$raiz = $dom->appendChild($dom->createElement('instrumentos'));
$instrumento = $dom->createElement('instrumento');
$nombre = $dom->createElement('nombre', 'guitarra');
$familia = $dom->createElement('familia', 'cuerda');
$raiz->appendChild($instrumento);
$instrumento->appendChild($nombre);
$instrumento->appendChild($familia);
$instrumento->setAttribute('id', '1');

//Otra forma de hacerlo
$instrumento = $raiz->appendChild($dom->createElement('instrumento'));
$instrumento->appendChild($dom->createElement('nombre', 'violin'));
$instrumento->appendChild($dom->createElement('familia', 'cuerda'));
$instrumento->setAttribute('id', '2');

$dom->formatOutput = true;    //Formatea el documento
$dom->save('instrumentos.xml');




//LEEMOS XML con el DOM

$dom->load('instrumentos.xml');
echo '<pre>';
// print_r($dom);

foreach ($dom->childNodes as $instrumentos) {
    foreach ($instrumentos->childNodes as $instrumento) {
        if ($instrumento->nodeType == 1) {
            echo "\n" . $instrumento->getAttribute('id');
            $nodo = $instrumento->firstChild;
            do {
                if ($nodo->nodeType == 1) {

                    echo "\n" . $nodo->tagName . ":" . $nodo->nodeValue;
                }
            } while ($nodo = $nodo->nextSibling);

        }
    }
}

$instrumentolista = $dom->getElementsByTagName("instrumento");
foreach ($instrumentolista as $value) {
    $a = $value->getElementsByTagName("nombre");
    echo "\n" . $a->item(0)->tagName . ":" . $a->item(0)->nodeValue;
    $a = $value->getElementsByTagName("familia");
    echo "\n" . $a->item(0)->tagName . ":" . $a->item(0)->nodeValue;

}

?>

<a href="./domdescarga.php">Descargar</a>

//GUARDAR EL ARCHIVO

//No se puede poner delante de un header echos (los guarda)
// header('Content-Type: text/xml');
// header("Content-Disposition: attachment; filename=instrumentos.xml");
// readfile ('instrumentos.xml');
// exit;


</main>

<footer>
    <?php
    include("../../html/footer.html");
    ?>



</footer>

</body>

</html>