<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>Añadir Registro</title>
</head>

<body>
    <?php
    include("./funcionesFormulario.php");
    $errores = array();
    
    //Si ha ido todo bienb
    if (enviado() && validaFormulario($errores)) {
        header('Location: ./index.php');


    } else {

        ?>



        <main>
            <!-- FORMULARIO -->

            <form action="" method="post" enctype="multipart/form-data">

                <label for="nombre">Nombre <input type="text" name="nombre" id="nombre" value=<?php recuerda('nombre') ?>></label> <br>
                <?php printerror($errores, 'nombre'); 
                      printerror($errores, 'validarNombre');   ?>
                <label for="posicion">Posición <input type="text" name="posicion" id="posicion" value=<?php recuerda('posicion') ?>></label> <br>
                <?php printerror($errores, 'posicion'); 
                      printerror($errores, 'validarPosicion'); ?>
                <label for="DNI">DNI <input type="text" name="DNI" id="DNI" value=<?php recuerda('DNI') ?>></label> <br>
                <?php printerror($errores, 'DNI');
                      printerror($errores, 'DNIMAL'); ?>
                <label for="fecha">Fecha de Nacimiento<input type="text" name="fecha" id="fecha" placeholder="DD/MM/AAAA" value=<?php recuerda('fecha') ?>></label> <br>
                <?php printerror($errores, 'fecha'); 
                      printerror($errores, 'formatoFecha');
                      printerror($errores, 'mayorEdad');?>
                <label for="sueldo">Sueldo <input type="text" name="sueldo" id="sueldo" value=<?php recuerda('sueldo') ?>></label> <br>
                <?php printerror($errores, 'sueldo'); 
                      ?>
                <label for="dorsal">Dorsal <input type="number" name="dorsal" id="dorsal" value=<?php recuerda('dorsal') ?>></label> <br>
                <?php printerror($errores, 'dorsal'); 
                    ?>

                <input type="submit" value="Enviar" name="Enviar">
                <input type="submit" value="Borrar" name="Borrar">


            </form>

            <?php
    } //Cerramos el else
    ?>
    </main>


</body>

</html>