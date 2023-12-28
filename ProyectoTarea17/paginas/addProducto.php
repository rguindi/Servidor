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
if (registrar() && validaSubirProducto($errores)) {

    // GUARDAMOS LA IMAGEN
    $dir_subida = '/var/www/servidor/ProyectoTarea17/img/productos/';
    $fichero_subido = $dir_subida . str_replace(' ', '_', basename($_FILES['imagen']['name']));
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.\n";
    } else {
        echo "Error subiendo archivo";
    }
    addProducto( $_REQUEST['titulo'], $_REQUEST['descripcion'], $_REQUEST['precio'], $_REQUEST['stock'], './img/productos/'.str_replace(' ', '_', basename($_FILES['imagen']['name'])));
    echo '<p> Producto añadido correctamente... Redirigiendo a productos </p>';
    ?>

<script>
    setTimeout(function() {
        window.location.href = "/ProyectoTarea17/paginas/administrarProductos.php";
    }, 3000); // 3000 milisegundos = 3 segundos
</script>
<?php
}else{
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
    <title>Modificar Producto</title>

</head>

<body>

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="post" enctype="multipart/form-data" >
            <!-- Producto input -->
            <div class="form-outline mb-4">
                <label class="form-label">Añadir Producto</label>
                
            </div>
       
            <!-- Producto Titulo -->
            <div class="form-outline mb-4">
                <input type="text" id="titulo" class="form-control" name="titulo" value= '<?php recuerda('titulo') ?>' />
                <label class="form-label" for="titulo">Titulo</label>
                <p class="error"><?php errores ($errores,'titulo');?></p>

            </div>

            <!-- Descripcion -->
            <div class="form-outline mb-4">
                <textarea name="descripcion" id="descripcion" cols="50" rows="10"><?php recuerda('descripcion'); ?></textarea><br>
                <label class="form-label" for="descripcion">Descripcion. </label>
                <p class="error"><?php errores ($errores,'descripcion');?></p>
            </div>


            <!-- Precio-->

            <div class="form-outline mb-4">
                <input type="text" id="precio" class="form-control" name="precio" value= '<?php echo recuerda('precio'); ?>' pattern="\d+(\.\d{1,2})?" />
                <label class="form-label" for="precio">Precio (Ej 6.99)</label>
                <p class="error"><?php errores ($errores,'precio');?></p>
                <p class="error"><?php errores ($errores,'preciotipo');?></p>
            </div>

            <!-- stock -->
            <div class="form-outline mb-4">
                <input type="number" id="stock" class="form-control" name="stock"  value= '<?php echo recuerda('stock'); ?>' />
                <label class="form-label" for="stock">Stock</label>  
                <p class="error"><?php errores ($errores,'stock');?></p>  
                <p class="error"><?php errores ($errores,'errordetipostock');?></p>  
            </div>
            <!-- imagen -->
            <div class="form-outline mb-4">
                <input type="file" id="imagen" class="form-control" name="imagen"/>
                <label class="form-label" for="imagen">Imagen (Formato jpg)</label>  
                <p class="error"><?php errores ($errores,'imagen');?></p>  
                <p class="error"><?php errores ($errores,'imagenjpg');?></p>  
            </div>
    

            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="registro">Añadir</button>

                <!-- Register buttons -->
                <p><a href="/ProyectoTarea17/paginas/administrarProductos.php">Volver</a></p>

        </form>
    </div>

</body>

</html>
<?php
} //Cierre del else
?>