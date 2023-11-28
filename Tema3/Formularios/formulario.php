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

//Si ha ido todo bienb
if (enviado()&& validaFormulario($errores)){
    echo "<pre>";
    print_r ($_REQUEST);

}else{

?>


<!--
    FORM
    action= donde se quieren enviar los datos
            Si no se le da fichero llama a la pagina actual
    method: como se envian (GET en url y POST oculto en la cabecera)
    nombre: no necesario para php
    enctype: poder enviar ficheros


-->


    <form action="" method="get" name="formulario1"  enctype="multipart/form-data">
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

    <!--
        input tipo radio
        Si queremos elegir solo uno mismo nombre
        value: indica que se manda
    -->
    <label for="hombre">Hombre<input <?php recuerdaRadio ('genero', 'hombre'); ?>
    
    type="radio" name="genero" id="hombre" value="hombre"></label>
    <label for="mujer">Mujer<input <?php recuerdaRadio ('genero', 'mujer'); ?> type="radio" name="genero" id="mujer" value="mujer"></label>

    <p class="error"><?php errores ($errores,'genero');?></p>

    <br>
    <p>Aficciones (seleccionar al menos una)</p>
    <!--
        Para e3nviar mas de una aficcion en el name el nombre con [].
        valor a enviar en la etiqueta value
    -->
    <label for="ch1">Montar a Caballo<input 
    <?php
    recuerdaCheck ('aficcion','jinete');
    ?>
    
    type="checkbox" name="aficcion[]" id="ch1"  value="jinete"></label>
    <label for="ch2">Jugar al Futbol<input 
    <?php
    recuerdaCheck ('aficcion','futbolista');
    ?>
    type="checkbox" name="aficcion[]" id="ch2" value="futbolista"></label>
    <label for="ch3">Nadar<input 
    <?php
    recuerdaCheck ('aficcion','nadador');
    ?>
    type="checkbox" name="aficcion[]" id="ch3" value="nadador"></label>
    <p class="error"><?php errores ($errores,'aficcion');?></p>
    <br>
    <!--
        Laa fecha en formato AAAA-mm-dd
    -->
    <label for="fecha_nac">Fecha Nacimiento <input value='<?php recuerda('fecha_nac'); ?>'
    
    type="datetime-local" name="fecha_nac" id="fecha_nac"></label>
    <p class="error"><?php errores ($errores,'fecha_n');?></p>
    <br>

    <p>Equipos Baloncesto</p>
    <!--
        SELECT
        Valor a enviar en etiqueta value
    -->
    <select name="equipos" id="">
    <option value="0">Seleccione una opcion</option>
    <option value="lakers" <?php recuerdaSelect('equipos', 'lakers'); ?>>Lakers</option>
    <option value="celtics" <?php recuerdaSelect('equipos', 'celtics'); ?>>Celtics</option>
    <option value="chicago"<?php recuerdaSelect('equipos', 'chicago'); ?>>Chicago</option>

    </select>
    <p class="error"><?php errores ($errores,'equipos');?></p>

    <br>  <br>
 <!--
    FICHEROS
    Fichero se recibe en el servidor en $_FILES

 -->
    <input type="file" name="fichero" id="fichero">  
    <p class="error"><?php errores ($errores,'fichero');?></p>
 <!--
    El usuario no lo ve en el navegador
 -->
    <input type="hidden" name="usuariovip" value="123">

     <!--
        Verificar que se ha enviado desde el boton
     -->
    <input type="submit" value="Enviar" name="Enviar">
    <input type="submit" value="Borrar" name="Borrar">
    

</form>
<?php
}   //Cerramos el else
?>


</main>

<footer>
    <?php
    include("../../html/footer.html");
    ?>



</footer>

</body>

</html>