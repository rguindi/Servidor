<?
/*
//Primero ver si existe
//abrir y leer
echo '<h1>ABRIR Y LEER </h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe<br>';
    if (!$fp = fopen('fichero.txt', 'r'))
        echo 'Ha habido un problema al abrir el fichero.';
    else {
        $leido = fread($fp, filesize('fichero.txt'));
        echo $leido;
        fclose($fp);
    }
} else {
    echo 'No existe';

}


/*

//Escribir
echo '<h1>Escribir Borra lo anterior</h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('fichero.txt', 'w'))
    echo 'Ha habido un problema al abrir el fichero.';
else {
    
    $texto = 'Escribiendo...';
    if (!fwrite($fp, $texto, strlen($texto)))
            echo 'Error al escribir';
        
    
        fclose($fp);
    }
} else {
    echo 'No exisste';
}




//Escribir al final
echo '<h1>Escribir al final</h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('fichero.txt', 'a'))
        echo 'Ha habido un problema al abrir el fichero.';
    else {

        $texto = 'Escribiendo...';
        if (!fwrite($fp, $texto, strlen($texto)))
            echo 'Error al escribir';

        fclose($fp);
    
    }
} else {
    echo 'No exisste';
}



//Escribir al medio
echo '<h1>Escribir al Medio</h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('fichero.txt', 'c'))
        echo 'Ha habido un problema al abrir el fichero.';
    else {

        $texto = 'medio';
        fseek($fp, 28);
        if (!fwrite($fp, $texto, strlen($texto)))
            echo 'Error al escribir';


        fclose($fp);
    }
} else {

    echo 'No exisste';
}


//Leer un fichero por lineas
echo '<h1>Leer un fichero por lineas</h1>';
if (file_exists('ficherolineas.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('ficherolineas.txt', 'r'))
        echo 'Ha habido un problema al abrir el fichero.';
    else {

       while  ($leido = fgets ($fp, filesize("ficherolineas.txt"))){
        echo '<br>' .$leido;
       }
        fclose($fp);
    }
} else {
    echo 'No existe';
}

//Escribir un fichero por lineas al final
echo '<h1>Escribir un fichero por lineas al final</h1>';
if (file_exists('ficherolineas.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('ficherolineas.txt', 'a'))
        echo 'Ha habido un problema al abrir el fichero.';
    else {
        $texto = "\nMi nueva linea";
        if (!fputs($fp,$texto, strlen($texto)))
        echo ' Error al escribir';
       
        
        fclose($fp);
    }
} else {
    echo 'No existe';
}


*/
//Escribir un fichero en la "X" linea
echo '<h1>Escribir un fichero en la segunda linea</h1>';

//Modificar un fichero secuencial
//Creamos arcgivo temporal, leer y modificar
//borrar anterior y renombrar el temporal 

$tmp = tempnam('.','tem.txt');

if (file_exists('ficherolineas.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('ficherolineas.txt', 'r'|| !$ft = fopen ($tmp, 'w')))
        echo 'Ha habido un problema al abrir el fichero.';
    else {

        $texto = "Texto que quiero escribir\n";
        $contador = 1;
       while  ($leido = fgets ($fp, filesize("ficherolineas.txt"))){
            fputs ($ft, $leido, strlen ($texto));
            if($contador==1){
            fputs ($ft, $texto, strlen ($texto));
            fputs ($ft, "\n", strlen ("\n"));
            $contador++;
            }
       }
        fclose($fp);
        fclose($ft);
        unlink('ficherolineas.txt');
        rename ($tmp,"ficherolineas.txt");
    }
} else {
    echo 'No existe';
}