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
if (registrar() && validaAlbaran($errores)) {
    modificarAlbaran($_REQUEST['id'], $_REQUEST['producto'], $_REQUEST['cantidad'], $_REQUEST['fecha'], $_SESSION['usuario']['user']); 
    echo '<p> Albaran modificado correctamente... Redirigiendo a Albaranes </p>';
    ?>

<script>
    setTimeout(function() {
        window.location.href = "/ProyectoTarea17/paginas/administrarAlbaranes.php";
    }, 3000); // 3000 milisegundos = 3 segundos
</script>
<?php
}else{
    $albaran = getAlbaran($_REQUEST['id']);
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
    <title>Modificar Albaran</title>

</head>

<body>

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="post">
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <label class="form-label">Modificando Albaran con ID: <?php echo $albaran['Id']; ?> </label>
                
                

            </div>
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <input type="text" id="producto" class="form-control" name="producto" value= '<?php echo $albaran['cod_producto']; ?>' />
                <label class="form-label" for="producto">Codigo de producto</label>
                <p class="error"><?php errores ($errores,'producto');?></p>
                <p class="error"><?php errores ($errores,'productonoexiste');?></p>
                

            </div>

            <!-- cantidad input -->
            <div class="form-outline mb-4">
                <input type="number" id="cantidad" class="form-control" name="cantidad" value= '<?php echo $albaran['cantidad']; ?>'/>
                <label class="form-label" for="cantidad">Cantidad. <br> (Esta modificación no afectará al stock del producto, sólo al Albarán. Si desea modificar el stock vaya a productos o genere un nuevo albarán)</label>
                <p class="error"><?php errores ($errores,'cantidad');?></p>
            </div>


            <!-- Fecha-->

            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" name="fecha" value= '<?php echo $albaran['fecha']; ?>' />
                <label class="form-label" for="nacimiento">Fecha</label>
                <p class="error"><?php errores ($errores,'fecha');?></p>
            </div>

            

            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="registro">Modificar</button>

                <!-- Register buttons -->
                <p><a href="/ProyectoTarea17/paginas/administrarAlbaranes.php">Volver</a></p>

        </form>
    </div>

</body>

</html>
<?php
} //Cierre del else
?>