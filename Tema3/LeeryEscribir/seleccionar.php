<?php
    include("./validaciones.php");
//Si ha sido enviado y no existe el fichero no redirige, error
if (enviadoselecciona()) {
    if (isset($_REQUEST["leer"]) && existe()){
        header('Location: ./leer.php?texto=' . $_REQUEST['texto']);
    }elseif (isset($_REQUEST["escribir"]) && existe()){
        header('Location: ./escribir.php?texto=' . $_REQUEST['texto']);
}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../Formularios/estilosformulario.css">
    <title>Seleccionar archivo</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");
    
        ?>
    </header>


    <main>

        <form action="" method="get" name="formulario1" enctype="multipart/form-data">

            <label for="texto"><input type="text" name="texto"></input></label> <br>
            <label for="leer"><input type="submit" value="Leer" name="leer"></label>
            <label for="escribir"><input type="submit" value="Escribir" name="escribir"></label>
            <?php
            
    
        ?>
        </form>

    </main>

    <footer>
        <?php
        include("../../html/footer.html");
        ?>



    </footer>

</body>

</html>