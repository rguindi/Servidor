<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Año bisiesto</title>
    <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body>
    
    <header>
        <?php
            include("../html/header.html");
        ?>
    </header>

    <main>
        <h3>Escriba un programa que se le pase un año por la URL y que escriba si es bisiesto o no.
Los años bisiestos son múltiplos de 4, pero los múltiplos de 100 no lo son, aunque los múltiplos de
400 sí</h3>
        <?php
             
        $ano = $_GET  ['ano'];
        $multiplo4 = false;
        $multiplo100 = false;
        $multiplo400 = false;

        if ($ano%4 ==0)$multiplo4 = true;
        if ($ano%100 ==0)$multiplo100 = true;
        if ($ano%400 ==0)$multiplo400 = true;

        if ($multiplo4  && !$multiplo100 ||  ($multiplo100 && $multiplo400)){

            echo "El año es bisiesto";
        }else{
            echo "El año NO es bisiesto";
        }
        $ruta = $_SERVER['SCRIPT_FILENAME'];
            echo "<br><a href=http://".$_SERVER['SERVER_ADDR']."/vercontenido.php?contenido=".$ruta.">Ver Contenido</a><br>";
            

        ?>

    </main>        
 

    <footer>
        <?php
            include("../html/footer.html");
        ?>
        </footer>
</body>
</html>