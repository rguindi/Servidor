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




?>