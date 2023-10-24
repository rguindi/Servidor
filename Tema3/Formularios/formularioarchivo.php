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

<form action="subir.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fichero">
    <input type="submit" value="Enviar">

</form>


</main>

<footer>
    <?php
    include("../../html/footer.html");
    ?>



</footer>

</body>

</html>