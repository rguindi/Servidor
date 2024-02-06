<?php
if(isset($_REQUEST['Login_iniciarSesion'])){
    if(isset($_REQUEST['recuerda'])){
        setcookie('nombre', $_REQUEST['nombre'], time()+3600);
        //No guardamos la contraseña por seguridad
    }else{
        setcookie('nombre', $_REQUEST['nombre'], time()-3600);
    }

    $errores = array();
   if(validaFormulario($errores)){
    $usuario = UserDAO::validarUser($_REQUEST['nombre'], $_REQUEST['pass']);
    if($usuario!=null){
        if (UserDAO::isUser($usuario->id_usuario)) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'perfilUsuario.php';
            $_SESSION['controller'] = CON.'perfilUsuarioController.php';
            header('Location: index.php');
        }
        if (UserDAO::isAdmin($usuario->id_usuario)) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'perfilAdmin.php';
            $_SESSION['controller'] = CON.'perfilAdminController.php';
            header('Location: index.php');
        }

    }else{
        $errores['validado'] = 'Usuario o contraseña incorrectos';
    }
}
}
