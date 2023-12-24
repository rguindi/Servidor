<?php
require('../BBDD/funciones.php');
// Iniciamos la sesión para que el navegador la conozca
session_start();
// Si no hay un usuario de $_SESSION no podemos comprar
// por lo que no tenemos permisos para estar ahí y nos manda a login
if (!isset($_SESSION['usuario'])) {
    $_SESSION['error'] = "No se ha iniciado sesion";
    header("Location: ./login.php");
    exit;
    
}elseif (isset($_REQUEST['compra'])) {
    $producto = getProducto($_REQUEST['producto']);
    $cantidad = $_REQUEST['cantidad'];
    $usuario = $_SESSION['usuario'];
    $total = $producto['precio'] * $cantidad;
    $fecha = date('Y-m-d');

    if (compraProducto($producto['codigo'], $cantidad, $fecha, $usuario, $total)) {
        echo 'Compra realizada con exito';
    }

}else {
    $producto = getProducto($_REQUEST['producto']);
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


        <title>Comprar</title>
    </head>

    <body>
        <div class="cabecera">
            <?php
            require("../html/header.php");
            // require("../BBDD/funciones.php");
            // $producto = getProducto($_REQUEST['producto']);
            ?>
        </div>
        <main>
            <div class="container card mt-2  ">
                <div class="row">
                    <div class="col-12 text-center  ">
                        <h2>Resumen de compra</h2>
                    </div>
                </div>
                <div class="row mt-3 border-bottom border-black  ">
                    <div class="col-3 text-center  ">
                        <h5>Producto</h5>
                    </div>
                    <div class="col-3 text-center  ">
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-3 text-center  ">
                        <h5>Precio unitario</h5>
                    </div>
                    <div class="col-3 text-center  ">
                        <h5>Suma</h5>
                    </div>

                </div>
                <div class="row  border-bottom border-black">
                    <div class="col-3 p-4 text-center">
                        <h6><?php echo $producto['titulo']  ?></h6>
                    </div>
                    <div class="col-3 p-4 text-center">
                    <form action="" method="get">
                       <input id="cantidad" type="number" value="1" style=" width: 3em;" class="text-end " >
                    </div>
                    <div class="col-3 p-4 text-center">
                        <h6><?php echo $producto['precio']  ?></h6>
                    </div>
                    <div class="col-3 p-4 text-center">
                        <h6><span id="suma" ><?php echo $producto['precio']?></span>€</h6>
                    </div>
                </div>
                <div class="row text-end ">
                    <div class="col-3 offset-6 p-4 text-center">
                        <h6>IVA: <span id="iva"></span>€</h6>
                    </div>
                    <div class="col-3 p-4 text-center ">
                        <h6 class="fw-bold " >TOTAL: <span id="total" ></span>€</h6>
                    </div>
                 
                </div>
                <div class="row text-center">
                    <div class="col-3 offset-9 pb-3">
                        
                            
                                <button type="submit" name="compra" class="btn btn-success">Confirmar compra</button>
                                <input type="hidden" name="producto" value="<?php echo $producto['codigo']  ?>">
                            </form>
                        
                    </div>

        </main>
        <script>
            let total = document.getElementById('total');
            let precio = <?php echo $producto['precio']  ?>;
            let cantidad = document.getElementById('cantidad');
            let suma = document.getElementById('suma');
            let iva = document.getElementById('iva');
            iva.innerHTML = (precio * cantidad.value) * 0.21;
            total.innerHTML = precio;
            cantidad.addEventListener('change', () => {
                total.innerHTML = ((precio * cantidad.value)).toFixed(2);
                suma.innerHTML = ((precio * cantidad.value)).toFixed(2);
                iva.innerHTML = ((precio * cantidad.value) * 0.21).toFixed(2);
            });
        </script>


        <div class="pie">
            <?php
            require('../html/footer.html');
            ?>
        </div>
    </body>

    </html>
    <?php
} // Cerramos el else
?>