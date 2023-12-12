<?php

require("./confBD.php");

$DSN = 'pgsql:host=' . IP . ';dbname=prueba';



try {
    $con = new PDO($DSN, USER, PASSWORD);

    //Leer Base de datos

    $sql = 'select * from tiempo';
    $result = $con->query($sql);
    while($row = $result->fetch(PDO::FETCH_BOTH)){
        echo '<br> El tiempo es '.$row[1]. ' y hace '.$row[2].' grados.';
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}finally{
    unset($con);
}

//CONSULTA PREPARADA
try {
    $con = new PDO($DSN, USER, PASSWORD);

    //Leer Base de datos

    $sql = 'insert into tiempo (descripcion, grados) values (?,?)';
    $stmt = $con->prepare($sql);
    // $stmt->execute (array('Hace niebla ', 5));      //Descomentar para ejecutar



} catch (PDOException $e) {
    echo $e->getMessage();
}finally{
    unset($con);
}


//OTRA MENERA CONSULTA PREPARADA
try {
    $con = new PDO($DSN, USER, PASSWORD);

    //Leer Base de datos

    $sql = 'insert into tiempo (descripcion, grados) values (:desc, :grad)';
    $stmt = $con->prepare($sql);
    $desc = 'Esta nevando';
    $grad = 0;
    $stmt->bindParam(':desc',$desc);
    $stmt->bindParam(':grad',$grad);
    // $stmt->execute ();      //Descomentar para ejecutar



} catch (PDOException $e) {
    echo $e->getMessage();
}finally{
    unset($con);
}

//OTRA MANERA CONSULTA PREPARADA
try {
    $con = new PDO($DSN, USER, PASSWORD);

    //Leer Base de datos

    $sql = 'select  * from tiempo where grados <5';
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $stmt->bindColumn(2, $desc);
    $stmt->bindColumn(3, $grados);


    while($row = $stmt->fetch(PDO::FETCH_BOUND)){
        echo '<br> El tiempo es '.$desc. ' y hace '.$grados.' grados.';
    }
 
} catch (PDOException $e) {
    echo $e->getMessage();
}finally{
    unset($con);
}