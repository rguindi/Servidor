<?php
if (!validado()) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'loginController.php';
} else {
    if (isset($_REQUEST['userEditar'])) {
        $_SESSION['vista'] = VIEW . 'editarUser.php';
    } elseif (isset($_REQUEST['cambiapass'])) {
        $_SESSION['vista'] = VIEW . 'cambiapass.php';
    } elseif (isset($_REQUEST['guardar'])) {
        $usuario = $_SESSION['usuario'];
        if (!textVacio('des')) {

            $usuario->descUsuario = $_REQUEST['des'];
            if (UserDAO::update($usuario)) {
                $sms = 'Usuario actualizado';
                $_SESSION['usuario'] = $usuario;
                $_SESSION['vista'] = VIEW . 'verUsuario.php';
            }
        } else {
            $errores['update'] = 'No se ha podido actualizar';
        }
    }elseif (isset($_REQUEST['guardarPass'])) {
        $usuario = $_SESSION['usuario'];
        if (!textVacio('pass') && !textVacio('pass2')&& passIguales($_REQUEST['pass'], $_REQUEST['pass2'])) {

            $usuario->password = $_REQUEST['pass'];
            if (UserDAO::cambiarPassword($usuario->codUsuario, $usuario->password)) {
                $sms = 'Contraseña actualizada';
                $_SESSION['usuario'] = $usuario;
                $_SESSION['vista'] = VIEW . 'verUsuario.php';
            }
        } else {
            $errores['update'] = 'No se ha podido actualizar';
        }
}
}
?>