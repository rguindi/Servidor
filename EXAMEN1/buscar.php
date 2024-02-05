<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
</head>
<body>

<form action="" method="GET" enctype="multipart/form-data">
<label for="buscarpeli">Introduzca título o actor <input type="text" name="buscarpeli" id="buscarpeli" ></label> <br>
<input type="submit" value="Buscar" name="buscarpelicula">
<br><br>
<?php

if (isset ($_REQUEST['buscarpelicula'])){


    
    // Lectura de un XML sabiendo el nombre de las etiquetas a recorrer
    if (file_exists('peliculas.xml')) {
        $xml = simplexml_load_file('peliculas.xml');

        $palabra = $_REQUEST['buscarpeli'];
      
        foreach ($xml as $elemento) {
           
            $titulo = $elemento->titulo;

            $actores = $elemento->actores;
            $actor = $actores->actor;

             
           


            if(str_contains($titulo, $palabra)||str_contains($actor, $palabra)){   //Clave de busqueda

          echo '<br>';
          echo   $elemento->titulo;
          echo '<br>';
          echo   $elemento->director;
          echo '<br>';
          echo   $elemento->ano;
          echo '<br>';
          echo   $elemento->genero;
          echo '<br>';
          echo   $elemento->duracion;
          echo '<br>';


        foreach ($actor as $key => $value) {
            echo   $value;
            echo '<br>';
        }

          echo   $elemento->sinopsis;
          echo '<br>';
        }
    
}
    } else {
        exit('Error abriendo fichero.xml.');
    }



}

?>


</form>
    
</body>
</html>