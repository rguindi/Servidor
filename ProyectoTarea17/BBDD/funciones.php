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

        $con->connect(IP, USER, PASS);
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
        $sql = "SELECT * FROM PRODUCTO WHERE activo = true LIMIT 4;";
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
        $sql = "SELECT * FROM PRODUCTO WHERE activo = true ORDER BY codigo DESC LIMIT 4";
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
        $sql = "SELECT * FROM PRODUCTO WHERE activo = true";
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
        $sql = "SELECT * FROM USUARIO WHERE user = :user AND pass = :pass AND activo = true";
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
        $sql = "SELECT * FROM PRODUCTO WHERE codigo = :codigo AND activo = true";
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
        $sql = "SELECT * FROM PEDIDO WHERE activo = true AND usuario = :user ORDER BY Id DESC";
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
        $sql = "SELECT stock FROM PRODUCTO WHERE codigo = :codigo AND activo = true";
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

        $sql = "SELECT * FROM USUARIO WHERE user = :user AND activo = true";
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

function isAdmin($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT rol FROM USUARIO WHERE user = :user AND activo = true";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario['rol'] == 'admin'){
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

function isCliente($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT rol FROM USUARIO WHERE user = :user AND activo = true";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario['rol'] == 'cliente'){
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

function isModerador($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT rol FROM USUARIO WHERE user = :user AND activo = true";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario['rol'] == 'moderador'){
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

//DEVUELVE TODOS LOS PEDIDOS
function getAllPedidos(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT * FROM PEDIDO WHERE activo = true ORDER BY Id DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pedidos;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}
//DEVUELVE TODOS LOS ALBARANES
function getAlbaranes(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT * FROM ALBARAN WHERE activo = true ORDER BY Id DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $albaranes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $albaranes;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

//REGISTRA ALBARAN
function registrarAlbaran($codigo, $cantidad, $fecha, $user){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "INSERT INTO ALBARAN (cod_producto, cantidad, fecha, usuario) VALUES (:codigo, :cantidad, :fecha, :user)";
        $sql2 = "UPDATE PRODUCTO SET stock = stock + :cantidad WHERE codigo = :codigo";
        $stmt = $con->prepare($sql);
        $stmt2 = $con->prepare($sql2);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->bindParam(':cantidad',$cantidad);
        $stmt->bindParam(':fecha',$fecha);
        $stmt->bindParam(':user',$user);
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

//DEVUELVE UN ALBARAN POR ID
function getAlbaran($id){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT * FROM ALBARAN WHERE Id = :id AND activo = true";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $albaran = $stmt->fetch(PDO::FETCH_ASSOC);

        return $albaran;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

//MODIFICAR ALBARAN
function modificarAlbaran($id, $codigo, $cantidad, $fecha, $user){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "UPDATE ALBARAN SET cod_producto = :codigo, cantidad = :cantidad, fecha = :fecha, usuario = :user WHERE Id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->bindParam(':cantidad',$cantidad);
        $stmt->bindParam(':fecha',$fecha);
        $stmt->bindParam(':user',$user);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//ELIMINAR PRODUCTO
function eliminarProducto($codigo){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "UPDATE PRODUCTO SET activo = false WHERE codigo = :codigo";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//ELIMINAR ALBARAN
function eliminarAlbaran($id){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "UPDATE ALBARAN SET activo = false WHERE Id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//ELIMINAR PEDIDO
function eliminarPedido($id){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "UPDATE PEDIDO SET activo = false WHERE Id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//DEVUELVE UN PEDIDO POR ID
function getPedido($id){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT * FROM PEDIDO WHERE Id = :id AND activo = true";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        return $pedido;

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

//MODIFICAR PEDIDO
function modificarPedido($id, $codigo, $cantidad, $fecha, $user, $total){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "UPDATE PEDIDO SET cod_producto = :codigo, cantidad = :cantidad, fecha = :fecha, usuario = :user, total = :total WHERE Id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->bindParam(':cantidad',$cantidad);
        $stmt->bindParam(':fecha',$fecha);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':total',$total);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//MODIFICAR PRODUCTO
function modificarProducto($codigo, $titulo, $descripcion, $precio, $stock, $imagen_url){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "UPDATE PRODUCTO SET titulo = :titulo, descripcion = :descripcion, precio = :precio, stock = :stock, imagen_url = :imagen_url WHERE codigo = :codigo";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':codigo',$codigo);
        $stmt->bindParam(':titulo',$titulo);
        $stmt->bindParam(':descripcion',$descripcion);
        $stmt->bindParam(':precio',$precio);
        $stmt->bindParam(':stock',$stock);
        $stmt->bindParam(':imagen_url',$imagen_url);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//AÑADIR PRODUCTO
function addProducto($titulo, $descripcion, $precio, $stock, $imagen_url){     
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "INSERT INTO PRODUCTO (titulo, descripcion, precio, stock, imagen_url) VALUES (:titulo, :descripcion, :precio, :stock, :imagen_url)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':titulo',$titulo);
        $stmt->bindParam(':descripcion',$descripcion);
        $stmt->bindParam(':precio',$precio);
        $stmt->bindParam(':stock',$stock);
        $stmt->bindParam(':imagen_url',$imagen_url);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    } finally{
        unset($con);
    }
}

//DEVUELVE  USUARIO POR ID
function getUsuario($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);

        $sql = "SELECT * FROM USUARIO WHERE user = :user AND activo = true";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
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