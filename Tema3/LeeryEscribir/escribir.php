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

    <form action="" method="get" name="formulario1"  enctype="multipart/form-data">

        <label for="area"><textarea name="area" id="rea" cols="30" rows="10" disabled></textarea> <br>
        <label for="archivo"><input type="button" value="Volver"></label>
        <label for="archivo"><input type="button" value="Guardar"></label>

    </form>

</main>

<footer>
    <?php
    include("../../html/footer.html");
    ?>



</footer>

</body>

</html>