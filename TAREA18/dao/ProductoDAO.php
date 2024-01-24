<?php

class ProductoDAO
{

    public static function findAll(){
        $sql = "SELECT * FROM Producto WHERE activo = 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_productos = array();
        while ($producto = $result->fetchObject()) {
            $producto = new Producto(
                $producto->codigo,
                $producto->titulo,
                $producto->descripcion,
                $producto->precio,
                $producto->stock,
                $producto->imagen_url,
                $producto->activo
            );

            array_push($array_productos, $producto);
        }
        return $array_productos;
    }

    public static function findByCodigo($codigo){
        $sql = "SELECT * FROM Producto WHERE codigo = ? AND activo = 1";
        $parametros = array($codigo);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $producto = $result->fetchObject();
            $producto = new Producto(
                $producto->codigo,
                $producto->titulo,
                $producto->descripcion,
                $producto->precio,
                $producto->stock,
                $producto->imagen_url,
                $producto->activo
            );
            return $producto;
        } else {
            return null;
        }
    }

    public static function insert($producto) {
        $sql = "INSERT INTO Producto (codigo, titulo, descripcion, precio, stock, imagen_url, activo) VALUES (?,?,?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array(
            $producto->codigo,
            $producto->titulo,
            $producto->descripcion,
            $producto->precio,
            $producto->stock,
            $producto->imagen_url,
            $producto->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($producto) {
        $sql = "UPDATE Producto SET titulo=?, descripcion=?, precio=?, stock=?, imagen_url=?, activo=? WHERE codigo=?";
        //insertar todos los atributos
        $parametros = array(
            $producto->titulo,
            $producto->descripcion,
            $producto->precio,
            $producto->stock,
            $producto->imagen_url,
            $producto->activo,
            $producto->codigo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($producto) {
        $sql = "UPDATE Producto SET activo=0 WHERE codigo=?";
        //insertar todos los atributos
        $parametros = array(
            $producto->codigo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //FUNCION PARA SECCION RECOMENDADOS. DEVUELVE 4 PRIMEROS PRODUCTOS
    public static function recomendados(){
        $sql = "SELECT * FROM Producto WHERE activo = 1 LIMIT 4";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_productos = array();
        while ($producto = $result->fetchObject()) {
            $producto = new Producto(
                $producto->codigo,
                $producto->titulo,
                $producto->descripcion,
                $producto->precio,
                $producto->stock,
                $producto->imagen_url,
                $producto->activo
            );

            array_push($array_productos, $producto);
        }
        return $array_productos;
    }

    //FUNCION PARA SECCION NOVEDADES. DEVUELVE 4 ULTIMOS PRODUCTOS
    public static function novedades(){
        $sql = "SELECT * FROM PRODUCTO WHERE activo = 1 ORDER BY codigo DESC LIMIT 4";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_productos = array();
        while ($producto = $result->fetchObject()) {
            $producto = new Producto(
                $producto->codigo,
                $producto->titulo,
                $producto->descripcion,
                $producto->precio,
                $producto->stock,
                $producto->imagen_url,
                $producto->activo
            );

            array_push($array_productos, $producto);
        }
        return $array_productos;
    }

    //FUNCION REDUCIR STOCK
    public static function reduceStock($codigo, $cantidad){
        $sql = "UPDATE Producto SET stock = stock - ? WHERE codigo = ?";
        $parametros = array($cantidad, $codigo);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function comprobarStock($codigo, $cantidad){
        $sql = "SELECT stock FROM Producto WHERE codigo = ?";
        $parametros = array($codigo);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $stock = $result->fetchObject();
        if ($stock->stock >= $cantidad) {
            return true;
        } else {
            return false;
        }
    }


}