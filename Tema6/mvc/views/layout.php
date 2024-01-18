<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Layout</title>
</head>

<body class="d-flex flex-column ">
    <header class="d-flex justify-content-evenly bg-body-tertiary ">
        <div>
            <form action="" method="post">
                <input class="btn btn-success"  type="submit" value="home" name="home">
            </form>
        </div>
        <h1> Header FIJO Página Web de Raúl</h1>
        <nav>
            <div>
                <?php if (validado()) {
                    echo "Bienvenido " . $_SESSION['usuario']->descUsuario;
                    echo '<form action="" method="post">
                    <input type="submit" value="verCitas" name="verCitas"> </form>'
                    ?>
                    <form action="" method="post">
                        <input type="submit" value="Cerrar Session" name="logout">
                        <input type="submit" value="verPerfil" name="verPerfil">
                    </form>
                <?php } else { ?>
                    <form action="" method="post">
                        <input type="submit" value="login" name="login">

                    </form>

                <?php } //cierre del else   ?>
            </div>
        </nav>
    </header>



    <main style="height: 600px;">
       <p class="text-center mt-5">MAIN FIJO PARA TODAS LAS VISTAS</p>
        <?php

        //VISTAS
        if (!isset($_SESSION['vista'])) {
            require VIEW . 'home.php'; //si no hay vista cargamos la home
        } else {
            require $_SESSION['vista'];
        }
        ?>

    </main>

    <footer class="bg-dark-subtle ">
     <p>
     FOOTER CopyRigth Raúl 
     </p> 
    </footer>

</body>

</html>