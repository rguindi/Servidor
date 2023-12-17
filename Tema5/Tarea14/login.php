<?php
require ('./funcionesBD.php');
//Si existe usuario logeado si
if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
    //redirigie User o admin
    if(isUser() || isAdmin())
    {
        header ('Location: ./index.php');
        exit;
    }
    //no es nada, le pide otra vez login  
    else{
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
    }
}else{
    //le pide login
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}