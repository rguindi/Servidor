<?
//Este fichero no voy a llamarlo desde el formulario, sólo lo ejecuto una vez para crear un xml con su estructura. Añadiré los contactos recibidos por formlario desde añadir.php

$dom = new DOMDocument('1.0', 'utf-8');  //Creamos documento
$raiz = $dom->appendChild($dom->createElement('contactos'));
$contacto = $dom->createElement('contacto');

$alfabetico = $dom->createElement('alfabetico');
$numerico = $dom->createElement('numerico');
$fecha = $dom->createElement('fecha');
$radio = $dom->createElement('radio');

$instrumentos = $dom->createElement('instrumentos');
$instrumento = $dom->createElement('instrumento');

$select = $dom->createElement('select');
$email = $dom->createElement('email');
$pass = $dom->createElement('pass');




$raiz->appendChild($contacto);
$contacto->setAttribute('id', '1');
$contacto->appendChild($alfabetico);
$contacto->appendChild($numerico);
$contacto->appendChild($fecha);
$contacto->appendChild($radio);
$contacto->appendChild($instrumentos);
$instrumentos->appendChild($instrumento);
$contacto->appendChild($select);
$contacto->appendChild($email);
$contacto->appendChild($pass);


$dom->formatOutput = true;    //Formatea el documento
$dom->save('./contactos.xml');

