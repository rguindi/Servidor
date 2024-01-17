<?php
if(isset($_REQUEST['Login_iniciarSesion'])){
    $errores = array();
   if(validaFormulario($errores)){
    $usuario = UserDAO::validarUser($_REQUEST['nombre'], $_REQUEST['pass']);
    if($usuario!=null){
        $usuario->fechaUltimaConexion = date('Y-m-d');
        $_SESSION['usuario'] = $usuario;
        $_SESSION['vista'] = VIEW.'home.php';
        unset($_SESSION['controller']);
    }else{
        $errores['validado'] = 'Usuario o contraseña incorrectos';
    }

    
}
}elseif(isset($_REQUEST['registrar'])){
    $_SESSION['vista'] = VIEW.'registro.php';
}elseif(isset($_REQUEST['registro'])){
    $errores = array();
    if(validaFormulario($errores)){
        $usuario = new User($_REQUEST['nombre'], $_REQUEST['pass'], $_REQUEST['desc'], date('Y-m-d'), $_REQUEST['perfil']);
        if(UserDAO::insert($usuario)){
            $sms = 'Usuario registrado';
            $_SESSION['vista'] = VIEW.'login.php';
        }else{
            $errores['validado'] = 'No se ha podido registrar';
        }

    }
}
