<?php
require ('conexion.php');

function recomendados(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM PRODUCTO LIMIT 4;";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function novedades(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM PRODUCTO ORDER BY codigo DESC LIMIT 4";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}
function todosProductos(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM PRODUCTO";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function validaUsuario($user,$pass){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM USUARIO WHERE user = :user AND pass = :pass";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':pass',$pass);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}


?>