<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tarea 3-2</title>
    <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body>
    
    <header>
        <?php
            include("../html/header.html");
        ?>
        </header>
    <main>
        <?php
            
            $variable1=$_GET ['variable'];
            echo "<p> La variable contiene el valor = " . $variable1 . "</p>";
            echo "<p> La variable es de tipo = " . gettype ($variable1) . "</p>";

            $numerico = (is_numeric ($variable1)?"La variable es de tipo numérica":"La variable no es de tipo numérica");
            echo $numerico;
            echo "<br>";
            $entero = (is_int ($variable1)?"La variable es de tipo numérica":"La variable no es de tipo entero");
            echo $entero;
            echo "<br>";
            $float = (is_float ($variable1)?"La variable es de tipo float":"La variable no es de tipo float");
            echo $float;
            echo "<br>";

            echo "<br>";
            $ruta = $_SERVER['SCRIPT_FILENAME'];
            echo "<a href=http://".$_SERVER['SERVER_ADDR']."/vercontenido.php?contenido=".$ruta.">Ver Contenido</a>";

            
           


        
        ?>

    </main>


    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>