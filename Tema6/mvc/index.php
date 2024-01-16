<?php
require_once './config/config.php';
session_start();

if (isset ($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'loginController.php';
}elseif (isset ($_REQUEST['home'])){
    $_SESSION['vista'] = VIEW.'home.php';
}
require_once './views/layout.php';








// echo '<pre>';   
// print_r(UserDAO::findAll());
// echo '<br>';   
// print_r(UserDAO::findById(2));
// echo '<br>';    

// print_r(USERDAO::insert(new User('6',sha1('raul'),'raul','2024-01-12')));
// echo '<br>';
// $usuario = UserDAO::findById(3);
// $usuario->descUsuario = 'luisito';

// USERDAO::update($usuario);
// print_r(UserDAO::findById(3));
// echo '<br>';
// print_r(UserDAO::buscarPorNombre('luisito'));
// echo '<br>';
// print_r(UserDAO::validarUser('luisito', 'raul'));
// ?>