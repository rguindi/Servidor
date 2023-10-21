<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="./estilosformulario.css">
    <title>Formulario</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");
        ?>
    </header>

<main>

<?php
 include ("./validaciones.php")
?>


<?php

$errores = array ();
if (enviado()){
 if (textVacio("nombre")) $errores ['nombre'] = "Nombre vacio.";
 if (textVacio("apellido")) $errores ['apellido'] = "Apellido vacio.";
}
?>


    <form action="" method="post" name="formulario1" enctype="multipart/form-data">
    <label for="nombre">Nombre:<input type="text" name="nombre" id="nombre" 
    
    value= <?php
     recuerda ('nombre');
    ?>    
    ></label>
    <p class="error"><?php errores ($errores,'nombre');?></p>

    <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido" value=
    <?php
     recuerda ('apellido');
    ?>></label>
    <p class="error"><?php errores ($errores,'apellido');?></p>


    <label for="hombre">Hombre<input type="radio" name="genero" id="hombre" value="hombre"></label>
    <label for="hombre">Mujer<input type="radio" name="genero" id="mujer" value="mujer"></label>

    <br>
    <p>Aficciones</p>
    <label for="ch1">Montar a Caballo<input type="checkbox" name="aficcion[]" id="ch1"  value="jinete"></label>
    <label for="ch2">Jugar al Futbol<input type="checkbox" name="aficcion[]" id="ch2" value="futbolista"></label>
    <label for="ch3">Nadar<input type="checkbox" name="aficcion[]" id="ch3" value="nadador"></label>
    <br>

    <label for="fecha_n">Fecha Nacimiento <input type="datetime-local" name="fecha_nac" id="fecha_nac"></label>
    <br>

    <p>Equipos Baloncesto</p>

    <select name="equipos" id="">
    <option value="0">Seleccione una opcion</option>
    <option value="lakers">Lakers</option>
    <option value="celtics">Celtics</option>
    <option value="chicago">Chicago</option>

    </select>

    <br>  <br>

    <input type="file" name="fichero" id="fichero">  

    <input type="hidden" name="usuariovip" value="123">


    <input type="submit" value="Enviar" name="Enviar">
    <input type="reset" value="Borrar" name="Borrar">
    

</form>
</main>

<footer>
    <?php
    include("../../html/footer.html");
    ?>



</footer>

</body>

</html>