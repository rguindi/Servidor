<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tarea cambio de monedas</title>
    <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body>
    
    <header>
        <?php
            include("../html/header.html");
        ?>
    </header>

    <main>
        <h3>4. Realiza un programa que le introduzca un valor (pasado por la URL) de un producto con 2 decimales
y posteriormente un valor con el que pagar por encima (Valor del producto 6.33€ y ha pagado con
10€). Muestra el número mínimo de monedas con las que puedes devolver el cambio </h3>
        <?php
             
             
            $resto = $pago = ($_GET['pago']*100) - ($_GET['precio'])*100;
           
            echo "<br>". $resto;
            //Monedas de 2€
            $monedas2 = floor($resto/200);

            echo "<br>". $resto/200;

            echo "monedas de 2€ : " . $monedas2."<br>";

            $resto= $resto%200;
            

             //Monedas de 1€
             $monedas2 = floor($resto/100);

             echo "monedas de 1€ : " . $monedas2."<br>";
 
             $resto= $resto%100;

             //Monedas de 0,50€
             $monedas2 = floor($resto/50);

             echo "monedas de 0,50€ : " . $monedas2."<br>";
 
             $resto= $resto%50;

             //Monedas de 0,20€
             $monedas2 = floor($resto/20);

             echo "monedas de 0,20€ : " . $monedas2."<br>";
 
             $resto= $resto%20;

             //Monedas de 0,10€
             $monedas2 = floor($resto/10);

             echo "monedas de 0,10€ : " . $monedas2."<br>";
 
             $resto= $resto%10;

             //Monedas de 0,05€
             $monedas2 = floor($resto/5);

             echo "monedas de 0,05€ : " . $monedas2."<br>";
 
             $resto= $resto%5;

             //Monedas de 0,02€
             $monedas2 = floor($resto/2);

             echo "monedas de 0,02€ : " . $monedas2."<br>";
 
             $resto= $resto%2;

             //Monedas de 0,01€
        

             echo "monedas de 0,05€ : " . $resto."<br>";
 
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