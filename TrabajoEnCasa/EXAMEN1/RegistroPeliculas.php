<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Peliculas</title>
    <style>
    .error{
        color: red;
    }
</style>
</head>
<body>

<?php
 include("./validaciones.php");
$errores = array ();


if (enviado() && listaErrores($errores)){

    añadir();

}elseif(buscar()){
    header('Location: ./buscar.php');
}
else{

?>


    <!-- FORMULARIO -->

<form action="" method="GET" enctype="multipart/form-data">

<label for="id">ID (Formato: 0000-MM-000) <input type="text" name="id" id="id" value = "<?php recuerda('id') ?>" ></label> <br>
<?php if (isset($errores ['id'])) echo "<p class = 'error'>" . $errores ['id']. "</p>"  ?>
<?php if (isset($errores ['formatoId'])) echo "<p class = 'error'>" . $errores ['formatoId']. "</p>"  ?>

<label for="titulo">Titulo<input type="text" name="titulo" id="titulo" value = "<?php recuerda('titulo') ?>" ></label> <br>
<?php if (isset($errores ['titulo'])) echo "<p class = 'error'>" . $errores ['titulo']. "</p>"  ?>


<label for="director">Director<input type="text" name="director" id="director" value = "<?php recuerda('director') ?>" ></label> <br>
<?php if (isset($errores ['director'])) echo "<p class = 'error'>" . $errores ['director']. "</p>"  ?>


<label for="lanzamiento">Año de lanzamiento <input type="number" name="lanzamiento" id="lanzamiento" value = "<? recuerda('lanzamiento') ?>" ></label> <br>
<?php if (isset($errores ['lanzamiento']))echo "<p class = 'error'>" . $errores ['lanzamiento']. "</p>"  ?>
<?php if (isset($errores ['formLanzamiento']))echo "<p class = 'error'>" . $errores ['formLanzamiento']. "</p>"  ?>

<?php generaRadio($errores); ?>
  
<label for="duracion">Duracion (hh:mm:ss)<input type="text" name="duracion" id="duracion" value = "<?php recuerda('duracion') ?>" ></label> <br>
<?php if (isset($errores ['duracion']))echo "<p class = 'error'>" . $errores ['duracion']. "</p>"  ?>
<?php if (isset($errores ['formDuracion']))echo "<p class = 'error'>" . $errores ['formDuracion']. "</p>"  ?>

<label for="actores">Actores Principales<input type="text" name="actores" id="actores" value = "<?php recuerda('actores') ?>" ></label> <br>
<?php if (isset($errores ['actores']))echo "<p class = 'error'>" . $errores ['actores']. "</p>"  ?>
<?php if (isset($errores ['formActores']))echo "<p class = 'error'>" . $errores ['formActores']. "</p>"  ?>


<label for="sinopsis"><textarea name="sinopsis" id="sinopsis" cols="30" rows="10"><?php recuerda('sinopsis') ?></textarea> <br>
<?php if (isset($errores ['sinopsis']))echo "<p class = 'error'>" . $errores ['sinopsis']. "</p>"  ?>
<?php if (isset($errores ['formSinopsis']))echo "<p class = 'error'>" . $errores ['formSinopsis']. "</p>"  ?>


<input type="submit" value="Registrar Pelicula" name="Enviar">
<input type="submit" value="Buscar" name="buscar">



</form>

<?php
 } //Cerramos el else
?>

</body>
</html>