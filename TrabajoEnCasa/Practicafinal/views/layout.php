<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raul Ferrero Vicente</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="./webroot/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
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
                    echo "Bienvenido " . $_SESSION['usuario']->user;
                    ?>
                    <form action="" method="post">
                        <input type="submit" value="Cerrar Session" name="logout">
                        <input type="submit" value="verPerfil" name="verPerfil">
                    </form>
                <?php } else { ?>
                   <p>Inicie seesion</p>
                <?php } //cierre del else   ?>
            </div>
        </nav>
    </header>



    <main style="height: 600px;">
       <p class="text-center mt-5">VISTAS</p>
        <?php

        //VISTAS
        if (!isset($_SESSION['vista'])) {
            require CON. 'loginController.php';
            require VIEW . 'login.php'; //si no hay vista cargamoslogin
        } else {
            require $_SESSION['vista'];
        }
        
        ?>

    </main>


    <footer class="bg-dark-subtle ">
     <p class="text-center">
     FOOTER CopyRigth Raúl 
     </p> 
    </footer>

</body>

</html>