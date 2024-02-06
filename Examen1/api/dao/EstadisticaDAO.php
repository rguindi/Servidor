<?php
require_once "./modelo/estadisticas.php";
require_once "./dao/FactoryBD.php";

class EstadisticaDAO{
    
    public static function findByAll(){
        $sql="SELECT * FROM estadisticas";
        $stmt=FactoryBD::realizaConsulta($sql, array());
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByUser($id){
        $sql="SELECT * FROM estadisticas WHERE id_usuario=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function insert($datos){
        $sql="INSERT INTO estadisticas values (null, ?, ?, ?, ?, ?)";
        $parametros = array($datos->id_usuario, $datos->id_palabra, $datos->resultado,  $datos->intentos,  $datos->fecha);
        $stmt=FactoryBD::realizaConsulta($sql, $parametros);
        if ($stmt->rowCount()>0) {

            return true;
        }else{
            return false;
        }    
    }

    public static function findLastId(){
        $sql="SELECT * FROM estadisticas ORDER BY id_estadistica DESC LIMIT 1";
        $stmt=FactoryBD::realizaConsulta($sql, array());
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    }

?>