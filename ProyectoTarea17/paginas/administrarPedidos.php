<?php
require_once('../BBDD/funciones.php');
// Iniciamos la sesión para que el navegador la conozca
session_start();
// Si no hay un usuario de $_SESSION no podemos estar aquí
if (!isset($_SESSION['usuario'])) {
    header("Location: ./login.php");
    exit;

} else if(!isAdmin($_SESSION['usuario']['user']) && !isModerador($_SESSION['usuario']['user'])){
    header("Location: ../");
    exit;

}else

{
    $pedidos = getAllPedidos();
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&display=swap" rel="stylesheet">


        <title>Pedidos</title>
    </head>

    <body>
        <div class="cabecera">
            <?php
            require_once("../html/header.php");
            ?>
        </div>
        <main>
            <div class="container card mt-2  ">
                <div class="row">
                    <div class="col-12 text-center  ">
                        <h2>Resumen de pedidos</h2>
                    </div>
                </div>
                <div class="row mt-3 border-bottom border-black  ">
                    <div class="col-1 text-center  ">
                        <h5>Id</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Fecha</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Producto</h5>
                    </div>
                    <div class="col-1 text-center  ">
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>Precio</h5>
                    </div>
                    <div class="col-4 text-center  ">
                        <h5>Factura</h5>
                    </div>

                </div>
                <?php
                foreach ($pedidos as $key => $value) {
                    $producto= getProducto($value['cod_producto']);
                    if (isModerador($_SESSION['usuario']['user'])){
                   echo'
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-2 text-center  ">
                        <h5>'.$value['Id'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value['fecha'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>';
                        echo $producto['titulo'];
                        echo '</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value['cantidad'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value['total'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <button class="btn btn-warning mb-2">Factura</button>
                    </div>

                </div>
                   ';
                    }else if (isAdmin($_SESSION['usuario']['user'])){
                        echo'
                   <div class="row mt-3 border-bottom border-black">
                    <div class="col-1 text-center  ">
                        <h5>'.$value['Id'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value['fecha'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>';
                        echo $producto['titulo'];
                        echo '</h5>
                    </div>
                    <div class="col-1 text-center  ">
                        <h5>'.$value['cantidad'].'</h5>
                    </div>
                    <div class="col-2 text-center  ">
                        <h5>'.$value['total'].'</h5>
                    </div>
                    <div class="col-4 text-center  ">
                        <button class="btn btn-warning mb-2">Factura</button>
                        <button class="btn btn-secondary mb-2">Modificar</button>
                        <button class="btn btn-danger mb-2">Eliminar</button>
                    </div>

                </div>
                   ';
                    }
                }
               ?>

        </main>

        <div class="pie">
            <?php
            require_once('../html/footer.html');
            ?>
        </div>
    </body>

    </html>
    <?php
} // Cerramos el else
?>