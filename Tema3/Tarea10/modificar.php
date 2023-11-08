<?php
    include("./validaciones.php");
   
    if (volver()) {
        header('Location: ./notas.php');
    }elseif (modificar()) {
       


        
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="./styles.css">
    <title>Modificar Notas</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");
    
        ?>
    </header>


    <main>

        <form action="" method="get" name="formulario1" enctype="multipart/form-data">
            
            <label for="texto">Nombre:<input type="text" name="texto" disabled></input></label> <br>
            <label for="nota1">Nota 1:<input type="number" name="nota1" ></input></label> <br>
            <label for="nota1">Nota 2:<input type="number" name="nota1" ></input></label> <br>
            <label for="nota1">Nota 3:<input type="number" name="nota1" ></input></label> <br>
            <label for="leer"><input type="submit" value="Volver" name="volver"></label>
            <label for="escribir"><input type="submit" value="Guardar" name="guardar"></label>
           
        </form>

    </main>

    <footer>
        <?php
        include("../../html/footer.html");
        ?>



    </footer>

</body>

</html>