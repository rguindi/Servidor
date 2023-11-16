<?php

$dom = new DOMDocument('1.0', 'utf-8');  //Creamos documento
$raiz = $dom->appendChild($dom->createElement('notas'));



if (!$fp = fopen('../../Tarea10/notas.csv', 'r')) //Si no se puede abrir
echo 'Ha habido un problema al abrir el fichero.';
else {
                    
while ($notas = fgetcsv($fp, filesize("notas.csv"), ";")) {   //Leemos el fichero CSV completo por lineas

    $alumno = $raiz->appendChild($dom->createElement('alumno'));

    foreach ($notas as $key => $value) {        //Recorremos cada elemento de la linea
        if ($key==0) {
            $nombre = $alumno->appendChild($dom->createElement('nombre', $value));           
        }elseif ($key==1) {
            $nota1 = $alumno->appendChild($dom->createElement('nota1', $value));           
        }elseif ($key==2) {
            $nota2 = $alumno->appendChild($dom->createElement('nota2', $value));           
        }elseif ($key==3) {
            $nota3 = $alumno->appendChild($dom->createElement('nota3', $value));           
        }
       

    }

}
fclose($fp);
}

$dom->formatOutput = true; //Lo formateamos
$dom->save('notas.xml');    //Lo guardamos

header('Location: ./LeeFicheroXML.php');  //Nos redirigimos a la pagina donde vamos a leerlo
exit();
?>
