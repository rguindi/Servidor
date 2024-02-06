<?php
if (isset($_REQUEST['Login_iniciarSesion'])) {

    //Si esta marcado recuerda guardamos cookie, si no la borramos
    if (isset($_REQUEST['recuerda'])) {
        setcookie('nombre', $_REQUEST['nombre'], time() + 3600);
        //No guardamos la contraseña por seguridad
    } else {
        setcookie('nombre', $_REQUEST['nombre'], time() - 3600);
    }

    $errores = array();
    if (validaFormulario($errores)) {
        $usuario = UserDAO::validarUser($_REQUEST['nombre'], $_REQUEST['pass']);
        if ($usuario != null) {
            if (UserDAO::isUser($usuario->id)) {
                echo 'eres usuario';
                $_SESSION['usuario'] = $usuario;
                // $_SESSION['vista'] = VIEW.'elegirNumeros.php';
                // $_SESSION['controller'] = CON.'elegirNumerosController.php';
                // header('Location: index.php');
            }
            if (UserDAO::isAdmin($usuario->id)) {
                echo 'eres administrador';
                    $_SESSION['usuario'] = $usuario;
                //     $_SESSION['vista'] = VIEW.'verApuestas.php';
                //     $_SESSION['controller'] = CON.'verApuestasController.php';
                //     header('Location: index.php');
            }

        } else {
            $errores['validado'] = 'Usuario o contraseña incorrectos';
        }
    }

}
