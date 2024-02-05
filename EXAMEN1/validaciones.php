<?php
function enviado(){
    if(isset ($_REQUEST['Enviar'])) return true;
    else return false;
}
function recuerda ($dato){
if (!empty ($_REQUEST [$dato])) echo $_REQUEST [$dato];

}

function recuerdaRadio ($nombrecomun, $opcion){
    if (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion){
    echo 'checked';
    }
  }

function generaRadio(&$errores){
    $generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];
    echo 'Genero:';
    foreach ($generos as $key => $value) {

        echo '<label for="'.$value.'">'.$value.'<input type="radio" name="opcion" id="'.$value.'" value="'.$value.'" '; recuerdaRadio('opcion', $value); echo ' ></label>'; 
    }
    if (isset($errores ['opcion'])) {
        echo "<p class = 'error'>" . $errores ['lanzamiento']. "</p>";
    }

}

function buscar(){         //Comprobamos si se ha pinchado en buscar
    if (isset($_REQUEST['buscar'])) return true;
else return false;
}

function idCorrecto ($frase){ 

    $patron = '/^[0-9]{4}[A-Z]{2}-[0-9]{3}$/';

    return preg_match($patron, $frase);
}

function lanzamiento ($frase){ 

    $patron = '/^[0-9]{4}$/';

    return preg_match($patron, $frase);
}

function duracion ($frase){ 

    $patron = '/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/';

    return preg_match($patron, $frase);
}

function actores ($frase){ 

    $patron = '/^(.+,)+$/';    

    return preg_match($patron, $frase);
}

function sinopsis ($frase){ 

    if (strlen($frase)<50) return false;
   else return true;
}

function  listaErrores (&$errores){

    if (enviado()){

        if (empty ($_REQUEST ['id'])) $errores ['id'] = 'El Campo no puede estar vacío';
        if (!idCorrecto($_REQUEST ['id']) && !empty ($_REQUEST ['id'])) $errores ['formatoId'] = 'Rellene de la forma indicada. Ej: 2000FR-123';
        if (empty ($_REQUEST ['titulo'])) $errores ['titulo'] = 'El Campo no puede estar vacío';
        if (empty ($_REQUEST ['director'])) $errores ['director'] = 'El Campo no puede estar vacío';
        if (empty ($_REQUEST ['lanzamiento'])) $errores ['lanzamiento'] = 'El Campo no puede estar vacío';
        if (!lanzamiento($_REQUEST ['lanzamiento']) && !empty ($_REQUEST ['lanzamiento'])) $errores ['formLanzamiento'] = 'Deben ser 4 digitos. Ej: 1999';
        if (empty ($_REQUEST ['duracion'])) $errores ['duracion'] = 'El Campo no puede estar vacío';
        if (!duracion($_REQUEST ['duracion']) && !empty ($_REQUEST ['duracion'])) $errores ['formDuracion'] = 'Expréselo en hh:mm:ss. Ej: 01:35:46';
        if (empty ($_REQUEST ['actores'])) $errores ['actores'] = 'El Campo no puede estar vacío';
        if (!actores($_REQUEST ['actores']) && !empty ($_REQUEST ['actores'])) $errores ['formActores'] = 'Separe los nombres por comas';
        if (empty ($_REQUEST ['sinopsis'])) $errores ['sinopsis'] = 'El Campo no puede estar vacío';
        if (!sinopsis($_REQUEST ['sinopsis']) && !empty ($_REQUEST ['sinopsis'])) $errores ['formSinopsis'] = 'Mínimo 50 caracteres';
        if (!isset ($_REQUEST ['opcion'])) $errores ['opcion'] = 'El Campo no puede estar vacío';



    }

    if (count($errores)== 0) return true;
    else return false;

}


//Funcion para añadir al xml
//He creaddo  manualmente un fichero xml con el nodo raiz peliculas, a partir del cual trabajara el programa.
function añadir (){


    $dom = new DOMDocument();
    
    $dom->load('./peliculas.xml', LIBXML_NOBLANKS);     //Abrimos el fichero y le quitamos el formateo
   

   $raiz = $dom->documentElement;        //Obtiene el nodo raiz del documento
   $pelicula = $dom->createElement('pelicula');
   $pelicula->setAttribute ('id', $_REQUEST['id']);
   
   $titulo = $dom->createElement('titulo', $_REQUEST['titulo']);
   $director = $dom->createElement('director',$_REQUEST['director']);
   $ano = $dom->createElement('ano',$_REQUEST['lanzamiento']);
   $genero = $dom->createElement('genero',$_REQUEST['opcion']);
   $duracion = $dom->createElement('duracion',$_REQUEST['duracion']);
   $actores = $dom->createElement('actores');

   $arrayactores = explode(',', $_REQUEST['actores']);

   foreach ($arrayactores as $key => $value) {
       $actor = $dom->createElement('actor', $value);
       $actores->appendChild($actor);
  
   }
   $sinopsis = $dom->createElement('sinopsis',$_REQUEST['sinopsis']);
  
   
   $raiz->appendChild($pelicula);



   $pelicula->appendChild($titulo);
   $pelicula->appendChild($director);
   $pelicula->appendChild($ano);
   $pelicula->appendChild($genero);
   $pelicula->appendChild($duracion);
   $pelicula->appendChild($actores);
   $pelicula->appendChild($sinopsis);

   $dom->formatOutput = true;    //Formatea el documento de nuevo
   $dom->save('./peliculas.xml');   

}



?>