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
}