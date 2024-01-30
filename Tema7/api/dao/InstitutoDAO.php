<?php
require_once "./modelo/instituto.php";
require_once "./dao/FactoryBD.php";

class InstitutoDAO{
    
    public static function findByAll(){
        $sql="SELECT * FROM instituto";
        $stmt=FactoryBD::realizaConsulta($sql, array());
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $sql="SELECT * FROM instituto WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}


?>