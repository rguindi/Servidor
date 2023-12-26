<?php
require ('conexion.php');


//FUNCION PARA ACTUALIZAR USUARIO
function updateUser($pass, $email, $fecha, $user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "UPDATE USUARIO set pass = :pass, email = :email, fecha_nac = :fecha_nac where user = :user";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':pass',$pass);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':fecha_nac',$fecha);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        
        echo 'Actualizado';

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

//COMPRUEBA SI EXISTE A BASE DE DATOS
function existeBD(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        return true;
    } catch (PDOException $e) {
        switch ($e->getCode()) {
            case 1045:
            echo 'Error acceso a la base datos <br>';
                break;
            case 1049:
                echo 'Conexión correcta. No existe la base de datos. <br>';
                break;
            default:
                echo $e->getMessage();
                echo $e->getCode();
                break;
        }
        return false;
    } finally{
        unset($con);
    }
}

//FUNCION CARGAR SCRIPT
function cargarScript(){
    $con = new mysqli(); 

try {

        $con->connect(IP, USER, PASSWORD);
        $script = file_get_contents('./script.sql');
        $con->multi_query($script);


        //Parte de codigo para comprobar si hay algun error en el Script
        do {
                $con->store_result();
                if (!$con->next_result()) {
                        break;
                }
        } while (true);
        
        $con->close();
        
        echo 'Script cargado correctamente.';
       echo  '<p><a  href="./">Volver</a></p>';
        
        
    } catch (\Throwable $th) {

        // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
        switch ($th->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado: " . $th->getMessage();
        }
        
    }
}


//FUNCION PARA SECCION RECOMENDADOS. DEVUELVE 4 PRIMEROS PRODUCTOS
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


//FUNCION PARA SECCION NOVEDADES. DEVUELVE 4 ULTIMOS PRODUCTOS
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
        switch ($e->getCode()) {
            case 1045:
            echo 'Error acceso a la base datos';
                break;
            
            default:
                echo $e->getMessage();
                echo $e->getCode();
                break;
        }
    } finally{
        unset($con);
    }
}

//FUNCION PARA PAGINA PRDUCTOS. DEVUELVE TODOS LOS PRODUCTOS
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


//COMPRUEBA SI EXISTE USUARIO Y CONTRASEÑA Y DEVUELVE EL USUARIO
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

//DEVUELVE UN PRODUCTO POR ID
function getProducto($id){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM PRODUCTO WHERE codigo = :codigo";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':codigo',$id);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

//COMPRA PRODUCTO procesacompra, y actualiza stock
function compraProducto($codigo,$cantidad, $fecha, $user, $total){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "INSERT INTO PEDIDO (cod_producto, cantidad, fecha, usuario, total) VALUES (:codigo, :cantidad, :fecha, :user, :total)";
        $sql2 = "UPDATE PRODUCTO SET stock = stock - :cantidad WHERE codigo = :codigo";
        $stmt = $con->prepare($sql);
        $stmt2 = $con->prepare($sql2);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->bindParam(':cantidad',$cantidad);
        $stmt->bindParam(':fecha',$fecha);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':total',$total);
        $stmt->execute();
        $stmt2->bindParam(':codigo',$codigo);
        $stmt2->bindParam(':cantidad',$cantidad);
        $stmt2->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//DEVUELVE TODOS LOS PEDIDOS DE UN USUARIO
function getPedidos($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM PEDIDO WHERE usuario = :user ORDER BY Id DESC";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pedidos;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

//COMPRUEBA STOCK
function comprobarStock($codigo, $cantidad){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT stock FROM PRODUCTO WHERE codigo = :codigo";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->execute();
        $stock = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stock['stock'] >= $cantidad){
            return true;
        }else{
            return false;
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function existeUser($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT * FROM USUARIO WHERE user = :user";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario){
            return true;
        }else{
            return false;
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function registrarCliente($user, $pass, $email, $fecha){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "INSERT INTO USUARIO (user, pass, email, fecha_nac, rol) VALUES (:user, :pass, :email, :fecha_nac, 'cliente')";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':pass',$pass);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':fecha_nac',$fecha);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

?>