<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <div><form action="" method="post">
                <input type="submit" value="home" name="home">
            </form></div>
        </nav>
        <h1>Página Web de Raúl</h1>
        <nav>
            
            <div>
                <? if (validado()){
                    echo "Bienvenido".$_SESSION['usuario']->descUsuario;
              ?>
            
            <form action="" method="post">
                <input type="submit" value="Cerrar Session" name="logout">
                <input type="submit" value="verPerfil" name="verPerfil">
            </form>
        <?php }else{
            ?>
                <form action="" method="post">
                <input type="submit" value="login" name="login">
               
            </form>

      <?  } ?>

        </div>
        </nav>
    </header>
    <main>
        Bienvenidpos a mi página web
    <?php



        if (!isset($_SESSION['vista'])) {
           require VIEW.'home.php';
           echo ' Bienvenidos a mi página web';
        }else{
            require $_SESSION['vista'];
        }

    ?>
        <!-- //VISTAS -->
    </main>

    <footer>
        CopyRigth Raúl
    </footer>

</body>
</html>