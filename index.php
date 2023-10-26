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
    <h4>Operadores y bucles</h4>
    <ul>
    <li><a href="/Tema3/piramide.php?altura=16">Piramide</a></li>
    <li><a href="/Tema3/rombo.php?altura=16">Rombo</a></li>
    <li><a href="/Tema3/rombohueco.php?altura=16">Rombo Hueco</a></li>
    <li><a href="/Tema3/monedas.php?precio=6.33&pago=10">Cambio de monedas</a></li>
    <li><a href="/Tema3/bisiestos.php?ano=1998">Año Bisiesto</a></li>
    </ul>
    <h4>Arrays básicos</h4>
    <ul>
    <li><a href="/Tema3/Tarea5Arrays.php?lado=4">Tarea Arrays</a></li>
    <li><a href="/Tema3/Tarea06.php">Tarea Equipos de Futbol</a></li>
    </ul>
    <h4>Funciones</h4>
    <ul>
    <li><a href="/Tema3/tarea07utilizarfunciones.php">Tarea Funciones</a></li>
    <li><a href="/Tema3/Euromillones/euromillones.php?var1=1&var2=18&var3=21&var4=24&var5=45&var6=48&especial1=3&especial2=4">Tarea Euromillolnes</a></li>
    </ul>
    <h4>Formularios</h4>
    <ul>
    <li><a href="/Tema3/Formularios/formulario.php">Formulario</a></li>
    <li><a href="/Tema3/Formularios/formularioarchivo.php">Formulario subir 2 archivos</a></li>
    <li><a href="/Tema3/Formularios/Tarea/tareaformulario.php">Tarea 08. Formulario</a></li>

    </ul>
    </main>

    <footer>
    <?php
        include("html/footer.html");
    ?>
    </footer>
</body>
</html>
