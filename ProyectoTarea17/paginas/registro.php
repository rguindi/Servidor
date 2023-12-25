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

    <div class="container col-md-6 col-xl-5 col-xxl-4 card p-3 mt-5  ">
        <form action="" method="post" >
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="user" class="form-control" />
                <label class="form-label" for="user">Usuario</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" />
                <label class="form-label" for="pass">Contraseña</label>
            </div>
            
            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass2" class="form-control" />
                <label class="form-label" for="pass2">Repita contraseña</label>
            </div>

            <!-- email -->
            <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" />
                <label class="form-label" for="email">Email</label>
            </div>

            <!-- Fecha NAC -->
            <div class="form-outline mb-4">
                <input type="date" id="nacimiento" class="form-control" />
                <label class="form-label" for="nacimiento">Fecha de Nacimiento</label>
            </div>


    
            <div class="text-center">
            <!-- Submit button -->
            <button type="button" class="btn btn-warning  btn-block mb-4">Registro</button>

            <!-- Register buttons -->
                <p><a  href="../">Volver</a></p>
               
    </div>
    </form>

</body>

</html>