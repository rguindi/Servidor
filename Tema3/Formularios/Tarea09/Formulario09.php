<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/styles.css">
    <link rel="stylesheet" href="./estilosformulario.css">
    <title>Formulario Tarea 09</title>
</head>

<body>
    <header>
        <?php
        include("../../../html/header.html");
        include("./tareaprocesa.php");
        ?>
    </header>

    <?php

    $errores = array();
    
    //Si ha ido todo bienb
    if (enviado() && validaFormulario($errores)) {

        include("./tareasubir.php");


    } else {

        ?>



        <main>
            <!-- FORMULARIO -->

            <form action="" method="post" enctype="multipart/form-data">

                <label for="nombre">Nombre <input type="text" name="nombre" id="nombre" value=<?php recuerda('nombre') ?>></label> <br>
                <?php printerror($errores, 'nombre'); ?>
                <label for="apellidos">Apellidos <input type="text" name="apellidos" id="apellidos" value=<?php recuerda('apellidos') ?>></label> <br>
                <?php printerror($errores, 'apellidos'); ?>
                <label for="pass">Contraseña<input type="password" name="pass" id="pass" value=<?php recuerda('pass') ?>></label> <br>
                <?php printerror($errores, 'pass'); ?>
                <label for="repitepass">Repite contraseña<input type="password" name="repitepass" id="repitepass" value=<?php recuerda('repitepass') ?>></label> <br>
                <?php printerror($errores, 'repitepass'); ?>
                <label for="fecha">Fecha <input type="text" name="fecha" id="fecha" value=<?php recuerda('fecha') ?>></label> <br>
                <?php printerror($errores, 'fecha'); ?>
                <label for="DNI">DNI <input type="text" name="DNI" id="DNI" value=<?php recuerda('DNI') ?>></label> <br>
                <?php printerror($errores, 'DNI');?>
                <label for="email">Email<input type="email" name="email" id="email" value=<?php recuerda('email') ?>></label> <br>
                <?php printerror($errores, 'email'); ?>

                <!-- ARCHIVO -->
                <label for="archivo">Subir Imagen<input type="file" name="archivo"></label> <br>
                <?php  printerror($errores, 'archivo');  ?>

                <input type="submit" value="Enviar" name="Enviar">
                <input type="submit" value="Borrar" name="Borrar">


            </form>

            <?php
    } //Cerramos el else
    ?>
    </main>

    <footer>
        <?php
        include("../../../html/footer.html");
        ?>



    </footer>

</body>

</html>