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
            
            echo "<p> La variable contiene el valor = " . $_GET ['variable'] . "</p>";
            echo "<p> La variable es de tipo = " . gettype ($_GET ['variable']) . "</p>";

            $numerico = (is_numeric ($_GET ['variable'])?"La variable es de tipo numérica":"La variable no es de tipo numérica");
            echo $numerico;
            echo "<br>";
            $entero = (is_int ($_GET ['variable'])?"La variable es de tipo numérica":"La variable no es de tipo entero");
            echo $entero;
            echo "<br>";
            $float = (is_float ($_GET ['variable'])?"La variable es de tipo numérica":"La variable no es de tipo float");
            echo $float;
            echo "<br>";


        
        ?>

    </main>


    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>