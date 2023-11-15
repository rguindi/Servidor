<?php
include("./validaciones.php");

if (modificar()) {
    header('Location: ./modificar.php?alumno=' . $_REQUEST['alumno'].'&nota1='.$_REQUEST['nota1'].'&nota2='.$_REQUEST['nota2'].'&nota3='.$_REQUEST['nota3']);


} elseif (añadir()) {
    header('Location: ./añadir.php');


} elseif (eliminar()) {

    $tmp = tempnam('./', 'tem.csv'); //Creamos fichero temporal.  (ruta, nombre)
    chmod($tmp, 0777); // damos permisos al fichero temporal

    if ((!$fp = fopen('notas.csv', 'r')) || (!$ft = fopen($tmp, 'w'))) //abrimos original en lectura y temporal en escritura
        echo 'Ha habido un problema al abrir el fichero.';
    else { //Ejecutamos codigo

        while ($leido = fgetcsv($fp, filesize("notas.csv"), ";")) { //Mientras leemos por lineas "todo" el archivo

            if ($leido[0] != $_REQUEST['alumno']) {

                fputcsv($ft, $leido, ";"); //Escribimos en el temporal una linea del original

            }
        }
            fclose($fp); //Cerramos ambos ficheros
            fclose($ft);
            unlink('notas.csv'); //Borra el fichero
            rename($tmp, "notas.csv"); //Renombra el fichero
    }
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
            else {


                echo "<tr>";
                $contador = 0;
                $nombre = "";
                while ($notas = fgetcsv($fp, filesize("notas.csv"), ";")) {

                    foreach ($notas as $key => $value) {
                        echo "<td>" . $notas[$key] . "</td>";
                        if ($key == 0) $nombre = $value;
                        elseif ($key == 1) $nota1 = $value;
                        elseif ($key == 2) $nota2 = $value;
                        elseif ($key == 3) $nota3 = $value;
                         

                    }
                    echo '<form action="" method="get" enctype="multipart/form-data">';
                    echo '<td><label for="modificar"><input type="submit" value="Modificar" name="modificar"></label>';
                    echo '<label for="eliminar"><input type="submit" value="Eliminar" name="eliminar"></label></td>';
                    echo '<input type="hidden" name="alumno" value="' . $nombre . '">';
                    echo '<input type="hidden" name="nota1" value="' . $nota1 . '">';
                    echo '<input type="hidden" name="nota2" value="' . $nota2 . '">';
                    echo '<input type="hidden" name="nota3" value="' . $nota3 . '">';
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