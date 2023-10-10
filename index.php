<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raul Ferrero Vicente</title>
    <link rel="stylesheet" href="css/styles.css">
</head>


<body>

    <header>
    <?php
        include("html/header.html");
    ?>
    </header>

    <main>
    <h2>Tema1</h2>
    <ul>
    <li><a href="/Tema1/phpinfo.php">PHP Info</a></li>
    <li><a href="/Tema1/Tutorial.pdf">Tutorial para crear servidor Linux</a></li>
    </ul>
    <h2>Tema2</h2>
    <ul>
    <li><a href="/Tema2/eligeidioma.php">Elige Idioma</a></li>
    <li><a href="/Tema2/Tarea3.php">Tarea 3-1</a></li>
    <li><a href="/Tema2/Tarea3-2.php?variable=456">Tarea 3-2</a></li>
    <li><a href="/Tema2/Tarea3-3.php?variable=2023/10/03">Tarea 3-3</a></li>
    <li><a href="/Tema2/Tarea3-4.php?raul=1982/09/24&manuel=1998/11/25">Tarea 3-4</a></li>
    </ul>
    <h2>Tema3</h2>
    <ul>
    <li><a href="/Tema3/piramide.php">Piramide</a></li>
    </ul>
    </main>

    <footer>
    <?php
        include("html/footer.html");
    ?>
    </footer>
</body>
</html>
