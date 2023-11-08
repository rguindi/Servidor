<?php
include("./validaciones.php");

if (modificar()) {
    header('Location: ./modificar.php?alumno=' . $_REQUEST['alumno']);
} elseif (añadir()) {
    header('Location: ./añadir.php');
}elseif (eliminar()) {
    
    
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="./styles.css">
    <title>Notas</title>
</head>

<body>
    <header>
        <?php
        include("../../html/header.html");

        ?>
    </header>


    <main>
        <br>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Nota1</th>
                <th>Nota2</th>
                <th>Nota3</th>
                <th>Modificaciones</th>
            </tr>

            <?php
            if (!$fp = fopen('./notas.csv', 'r')) //Si no se puede abrir
                echo 'Ha habido un problema al abrir el fichero.';
            else { //Si Exsiste y se abre, ejecutamos codigo
            

                echo "<tr>";
                $contador = 1;
                while ($notas = fgetcsv($fp, filesize("notas.csv"), ";")) {

                    foreach ($notas as $key => $value) {
                        echo "<td>" . $notas[$key] . "</td>";

                    }
                    echo '<form action="" method="get" enctype="multipart/form-data">';
                    echo '<td><label for="modificar"><input type="submit" value="Modificar" name="modificar"></label>';
                    echo '<label for="eliminar"><input type="submit" value="Eliminar" name="eliminar"></label></td>';
                    echo '<input type="hidden" name="alumno" value="' . $contador . '">';
                    echo '</form>';
                    echo "</tr>";
                    $contador++;
                }
                fclose($fp);
            }
            ?>


        </table>
        <br>
        <form action="" method="get" enctype="multipart/form-data">


            <label for="añadir">Añadir Registro<input type="submit" value="Añadir" name="añadir"></label>
        </form>
        <br>
    </main>

    <footer>
        <?php
        include("../../html/footer.html");
        ?>



    </footer>

</body>

</html>