<?php
include("./validaciones.php");
//Si ha sido enviado y no existe el fichero no redirige, error
if (volver()) {

    header('Location: ./seleccionar.php');
} elseif (guardar()) {
    $archivo = $_REQUEST['nombrearchivo'];
    chmod ($archivo, 0777);         //Cambiamos permisos, aunque no funciona. (Cambiado desde terminal)
    if (!$fp = fopen($_REQUEST['nombrearchivo'], 'w')) //Se abre en modo escritura (Acordarse de los permisos)
        echo 'Ha habido un problema al abrir el fichero.';
    else { //si existe y se abre ejecutamos codigo

        if (!fwrite($fp, $_REQUEST['area'], strlen($_REQUEST['area'])))
            echo 'Error al escribir';
        fclose($fp);
        header('Location: ./escribir.php?texto='.$_REQUEST['nombrearchivo']);

    }
}







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../Formularios/estilosformulario.css">
    <title>Escribir Archivo</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");
        ?>
    </header>

    <main>

        <form action="" method="get" name="formulario1" enctype="multipart/form-data">
        <input type="hidden" name="nombrearchivo" value="<?php echo $_REQUEST['texto'] ?>"> 
            <label for="area"><textarea name="area" id="rea" cols="30" rows="10"><?php
            if (!$fp = fopen('./' . $_REQUEST['texto'], 'r')) //Si no se puede abrir
                echo 'Ha habido un problema al abrir el fichero.';
            else { //Si Exsiste y se abre, ejecutamos codigo
            
                $leido = fread($fp, filesize($_REQUEST['texto'])); //filesize es una funcion que determina el tamaño en bytes del archivo. Se puede poner una cantidad de bytes a leer.
                echo $leido;




                fclose($fp);
            }

            ?></textarea> <br>
                <label for="archivo"><input type="submit" value="Volver" name="volver"></label>
                <label for="archivo"><input type="submit" value="Guardar" name="guardar"></label>

        </form>

    </main>

    <footer>
        <?php
        include("../../html/footer.html");
        ?>



    </footer>

</body>

</html>