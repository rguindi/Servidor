<?php
require_once "./modelo/ciudad.php";
require_once "./dao/FactoryBD.php";

class CiudadDAO{
    
    public static function findByAll(){
        $sql="SELECT * FROM ciudades";
        $stmt=FactoryBD::realizaConsulta($sql, array());
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql="SELECT * FROM ciudades WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiltros($filtros){
        $num = count($filtros);
        $parametros = array();
        $sql="SELECT * FROM ciudades WHERE ";
         foreach ($filtros as $key => $value) {
             if ($key == 'nombre') {
                 $sql .= $key." LIKE ?";
                 $valor = "%".$value."%";
                 array_push($parametros, $valor);

             }
                if ($num == 2) {  //si hay dos filtros añade el AND, si no, no
                    $num--;
                    $sql .= " AND ";
                }
            }
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        }

    public static function insert($datos){
        $sql="INSERT INTO ciudades values (null, ?, ?)";
        $parametros = array($datos->nombre, $datos->cantidad);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function findLastId(){
        $sql="SELECT * FROM ciudades ORDER BY id DESC LIMIT 1";
        $stmt=FactoryBD::realizaConsulta($sql, array());
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function update($ciudades){
        $sql="UPDATE ciudades SET nombre=?, cantidad=? WHERE id=?";
        $parametros = array($ciudades->nombre, $ciudades-> cantidad, $ciudades->id);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function delete($id){
        $sql="DELETE FROM ciudades WHERE id=?";
        $parametros = array($id);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }
}

?>