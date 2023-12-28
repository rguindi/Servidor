<?php
require '../sesion/validaciones.php';
require_once '../BBDD/funciones.php';
session_start();
// Si no hay un usuario de $_SESSION primero hacemoso login
if (!isset($_SESSION['usuario'])) {
    header("Location: /ProyectoTarea17/paginas/login.php");
    exit;
}
if (!isAdmin($_SESSION['usuario']['user'])) {
    header("Location: /ProyectoTarea17/paginas/logout.php");
    exit;
}


$errores = array ();
if (registrar() && validaPedido($errores)) {
    modificarPedido($_REQUEST['id'], $_REQUEST['producto'], $_REQUEST['cantidad'], $_REQUEST['fecha'], $_REQUEST['usuario'], $_REQUEST['total']);  //SEGUIMOS AQUI
    echo '<p> Pedido modificado correctamente... Redirigiendo a pedidos </p>';
    ?>

<script>
    setTimeout(function() {
        window.location.href = "/ProyectoTarea17/paginas/administrarPedidos.php";
    }, 3000); // 3000 milisegundos = 3 segundos
</script>
<?php
}else{
    $pedido = getPedido($_REQUEST['id']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <title>Modificar Pedido</title>

</head>

<body>

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="post">
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <label class="form-label">Modificando Pedido con ID: <?php echo $pedido['Id']; ?> </label>
                
                

            </div>
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <input type="number" id="producto" class="form-control" name="producto" value= '<?php echo $pedido['cod_producto']; ?>' />
                <label class="form-label" for="producto">Codigo de producto</label>
                <p class="error"><?php errores ($errores,'producto');?></p>
                <p class="error"><?php errores ($errores,'productonoexiste');?></p>
                

            </div>

            <!-- cantidad input -->
            <div class="form-outline mb-4">
                <input type="number" id="cantidad" class="form-control" name="cantidad" value= '<?php echo $pedido['cantidad']; ?>'/>
                <label class="form-label" for="cantidad">Cantidad. <br> (Esta modificación no afectará al stock del producto, sólo al Pedido. Si desea modificar el stock vaya a productos o genere un albarán)</label>
                <p class="error"><?php errores ($errores,'cantidad');?></p>
            </div>


            <!-- Fecha-->

            <div class="form-outline mb-4">
                <input type="date" id="fecha" class="form-control" name="fecha" value= '<?php echo $pedido['fecha']; ?>' />
                <label class="form-label" for="fecha">Fecha</label>
                <p class="error"><?php errores ($errores,'fecha');?></p>
            </div>

            <!-- Usuario -->
            <div class="form-outline mb-4">
                <input type="text" id="usuario1" class="form-control"  value= '<?php echo $pedido['usuario']; ?>' disabled />
                <input type="hidden" id="usuario" class="form-control" name="usuario" value= '<?php echo $pedido['usuario']; ?>' />
                <label class="form-label" for="usuario1">Usuario</label>                
            </div>
            <!-- Total -->
            <div class="form-outline mb-4">
                <input type="text" id="total" class="form-control" name="total" value= '<?php echo $pedido['total']; ?>' pattern="\d+(\.\d{1,2})?"/>
                <label class="form-label" for="total">Total (Ej 6.99)</label>     
                <p class="error"><?php errores ($errores,'total');?></p>          
                <p class="error"><?php errores ($errores,'totaltipo');?></p>          
            </div>

            

            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="registro">Modificar</button>

                <!-- Register buttons -->
                <p><a href="/ProyectoTarea17/paginas/administrarPedidos.php">Volver</a></p>

        </form>
    </div>

</body>

</html>
<?php
} //Cierre del else
?>