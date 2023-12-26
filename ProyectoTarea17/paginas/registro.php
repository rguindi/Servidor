<?php
session_start();
// Si ya hay un usuario de $_SESSION primero hacemoso logout
if (isset($_SESSION['usuario'])) {
    header("Location: /ProyectoTarea17/paginas/logout.php");
    exit;
}

$errores = array ();
require '../sesion/validaciones.php';
require_once '../BBDD/funciones.php';
if (registrar() && validaFormulario($errores)) {
    registrarCliente($_REQUEST['user'], $_REQUEST['pass'], $_REQUEST['email'], $_REQUEST['fecha']);
    echo '<p> Usuario registrado correctamente... Redirigiendo a Login </p>';
    ?>

<script>
    setTimeout(function() {
        window.location.href = "/ProyectoTarea17/paginas/login.php";
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
    <title>Registro</title>

</head>

<body>

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="get">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" id="user" class="form-control" name="user" value= '<?php recuerda ('user'); ?>' />
                <label class="form-label" for="user">Usuario</label>
                <p class="error"><?php errores ($errores,'user');?></p>
                <p class="error"><?php errores ($errores,'existeuser');?></p>

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" name="pass" value= '<?php recuerda ('pass'); ?>' pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$" />
                <label class="form-label" for="pass">Contraseña (Mínimo 8 caracteres, al menos una mayúscula, al menos una minúscula y al menos un número)</label>
                <p class="error"><?php errores ($errores,'pass');?></p>
                <p class="error"><?php errores ($errores,'validapass');?></p>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass2" class="form-control" name="repitepass" />
                <label class="form-label" for="pass2">Repita contraseña</label>
                <p class="error"><?php errores ($errores,'repitepass');?></p>
                <p class="error"><?php errores ($errores,'coincidepass');?></p>
            </div>

            <!-- email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" value= '<?php recuerda ('email'); ?>'/>
                <label class="form-label" for="email">Email</label>
                <p class="error"><?php errores ($errores,'email');?></p>
            </div>

            <!-- Fecha NAC -->

            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" name="fecha" value= '<?php recuerda ('fecha'); ?>' />
                <label class="form-label" for="nacimiento">Fecha de Nacimiento</label>
                <p class="error"><?php errores ($errores,'fecha');?></p>
            </div>



            <div class="text-center">
                <!-- Submit button -->
                <button type="submit" class="btn btn-warning  btn-block mb-4" name="registro">Registro</button>
                <button type="submit" class="btn btn-secondary   btn-block mb-4" name="Borrar">Borrar</button>


                <!-- Register buttons -->
                <p><a href="../">Volver</a></p>

        </form>
    </div>

</body>

</html>
<?php
} //Cierre del else
?>