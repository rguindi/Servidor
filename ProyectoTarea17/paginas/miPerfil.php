<?php 
require ('../BBDD/funciones.php');
    // Iniciamos la sesión para que el navegador la conozca
    session_start();
    // Si no hay un usuario de $_SESSION, significa que nodeberiamos estar en esa web
    // por lo que no tenemos permisos para estar ahí y nos manda a login
    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tiene permisos para entrar en paginaUser";
        header("Location: ./login.php");
        exit;
    }

    else if(isset($_REQUEST['editar'])){
        updateUser($_REQUEST['pass'], $_REQUEST['email'],$_REQUEST['nacimiento'],$_SESSION['usuario']['user']);
        $_SESSION['usuario']['pass'] = $_REQUEST['pass'];
        $_SESSION['usuario']['email'] = $_REQUEST['email'];
        $_SESSION['usuario']['fecha_nac'] = $_REQUEST['nacimiento'];
        header("Location: ../index.php");
    }else{
         

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
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

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5">
        <form action="" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="user" class="form-control" name="user" value="<?php echo $_SESSION['usuario']['user']; ?>" disabled />
                <label class="form-label" for="user">Usuario</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" name="pass" value="<?php echo $_SESSION['usuario']['pass']; ?>" />
                <label class="form-label" for="pass">Contraseña</label>
            </div>
            
            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass2" class="form-control" name="repitepass" value="<?php echo $_SESSION['usuario']['pass']; ?>"/>
                <label class="form-label" for="pass2">Repita contraseña</label>
            </div>

            <!-- email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" value="<?php echo $_SESSION['usuario']['email']; ?>"/>
                <label class="form-label" for="email">Email</label>
            </div>

            <!-- Fecha NAC -->
            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" name="nacimiento" value="<?php echo $_SESSION['usuario']['fecha_nac']; ?>" />
                <label class="form-label" for="nacimiento">Fecha de Nacimiento</label>
            </div>


    
            <div class="text-center">
            <!-- Submit button -->
            <button type="submit" name="editar" class="btn btn-warning  btn-block mb-4">Editar</button>
        </form>

            <!-- Register buttons -->
                <p><a  href="../">Volver</a></p>
               
    </div>

</body>

</html>
<?php
    } //Cerramos el else
?>