<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio elige idioma</title>
    <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body>
    
    <header>
        <?php
            include("../html/header.html");
        ?>
        </header>
<main>
    <a href="HolaMundoIdioma.php?idioma=es"><p>Español</p><img src="img/españa.png" alt="Imagen" width="200px" height="150px"></a>   
    <a href="HolaMundoIdioma.php?idioma=en"><p>Inglés</p><img src="img/inglaterra.png" alt="Imagen" width="200px" height="150px"></a>  
    <a href="HolaMundoIdioma.php?idioma=de"><p>Alemán</p><img src="img/alemnia.png" alt="Imagen" width="200px" height="150px"></a>  
    <a href="HolaMundoIdioma.php?idioma=pt"><p>Portugués</p><img src="img/portugal.png" alt="Imagen" width="200px" height="150px"></a>  
    <a href="HolaMundoIdioma.php?idioma=fr"><p>Francés</p><img src="img/francia.png" alt="Imagen" width="200px" height="150px"></a>  
    </main>
    <?php
    echo "<br>";
            $ruta = $_SERVER['SCRIPT_FILENAME'];
            echo "<a href=http://".$_SERVER['SERVER_ADDR']."/vercontenido.php?contenido=".$ruta.">Ver Contenido</a>";

    ?>

    <footer>
        <?php
            include("../html/footer.html");
        ?>

    
    
        </footer>
</body>
</html>