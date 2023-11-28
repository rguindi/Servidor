<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
<style>
    .error{
        color: red;
    }
</style>

</head>

<body>
    <header>
    </header>
<main>

<?php
 include("./validaciones.php");
 include("./añadir.php");
$errores = [];


if (enviado() && listaErrores($errores)){
    echo "<pre>";
    print_r ($_REQUEST);
    añadir();
   echo '<a href="./descargararchivo.php">Descargar</a>';
}
else{

?>






    <!-- FORMULARIO -->

<form action="" method="post" enctype="multipart/form-data">

   <label for="alfabetico">Alfabético <input type="text" name="alfabetico" id="alfabetico" value = "<?php recuerda('alfabetico') ?>" ></label> <br>
    <?php echo "<p class = 'error'>" . $errores ['alfabetico']. "</p>"  ?>
    <?php echo "<p class = 'error'>" . $errores ['Capitaliza']. "</p>"  ?>
    
   <label for="numerico">Numérico <input type="number" name="numerico" id="numerico" value = "<? recuerda('numerico') ?>" ></label> <br>
   <?php echo "<p class = 'error'>" . $errores ['numerico']. "</p>"  ?>

    <!-- FECHAS -->
   <label for="fecha">Fecha <input type="date" name="fecha" id="fecha" value = "<?php recuerda('fecha') ?>" ></label> <br>
   <?php echo "<p class = 'error'>" . $errores ['fecha']. "</p>"  ?>
   
   <!-- RADIOS -->
   <p>Radio Obligatorio</p>
   <label for="opcion1">Opcion 1 <input type="radio" name="opcion" id="opcion1" value="opcion1" <?php recuerdaRadio('opcion', 'opcion1') ?>></label> <br>
   <label for="opcion2">Opcion 2 <input type="radio" name="opcion" id="opcion2" value="opcion2" <?php recuerdaRadio('opcion', 'opcion2') ?> ></label><br>
   <label for="opcion3">Opcion 3 <input type="radio" name="opcion" id="opcion3" value="opcion3" <?php recuerdaRadio('opcion', 'opcion3') ?> > </label> <br>
   <?php echo "<p class = 'error'>" . $errores ['opcion']. "</p>"  ?>
   
   <br>


   <!-- CHECKBOX -->
   <!--Para enviar mas de una aficcion en el name el nombre con []. valor a enviar en la etiqueta value-->
   
   <p>Instrumentos (seleccionar al menos una)</p>
    <label for="ch1">Guitarra<input type="checkbox" name="aficcion[]" id="ch1"  value="guitarra" <?php recuerdaCheck('aficcion', 'guitarra') ?> ></label>
    <label for="ch2">Bateria<input type="checkbox" name="aficcion[]" id="ch2" value="bateria" <?php recuerdaCheck('aficcion', 'bateria') ?> ></label>
    <label for="ch3">Bajo<input type="checkbox" name="aficcion[]" id="ch3" value="bajo" <?php recuerdaCheck('aficcion', 'bajo') ?> ></label>
    <?php echo "<p class = 'error'>" . $errores ['aficcion']. "</p>"  ?>
    <br>   <br>


   
   <!-- SELECT -->
   <label for="select"> Select
   <select name="select" id="select">
    <option value="">Selecciona una opcion</option>
    <option value="Opcion 1" <?php recuerdaSelect('select', 'Opcion 1') ?>>Opcion 1</option>
    <option value="Opcion 2" <?php recuerdaSelect('select', 'Opcion 2') ?>>Opcion 2</option>
    <option value="Opcion 3" <?php recuerdaSelect('select', 'Opcion 3') ?>>Opcion 3</option>
   </select></label> 
   <?php echo "<p class = 'error'>" . $errores ['select']. "</p>"  ?><br>

   <label for="email">Email<input type="email" name="email" id="email" value = "<?php recuerda('email') ?>"></label> <br>
   <?php echo "<p class = 'error'>" . $errores ['email']. "</p>"  ?>
   <label for="pass">Contraseña<input type="password" name="pass" id="pass" value = "<?php recuerda('pass') ?>"></label> <br>
   <?php echo "<p class = 'error'>" . $errores ['pass']. "</p>"  ?>
   
   <!-- ARCHIVOS -->

   <label for="archivos">Subir Documentos<input type="file" name="archivo" multiple></label> <br>
   <?php echo "<p class = 'error'>" . $errores ['archivo']. "</p>"  ?>

     <!-- OCULTOS; PARA PASAR INFORMACION -->
   <input type="hidden" name="usuariovip" value="123">

    <input type="submit" value="Enviar" name="Enviar">
    <input type="submit" value="Borrar" name="Borrar">
    

</form>

<?php
 } //Cerramos el else
?>
</main>

<footer>
</footer>

</body>

</html>

