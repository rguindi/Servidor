<?php

class SorteoDAO{

    public static function findLast(){
        $sql = "SELECT * FROM sorteo order by id desc limit 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            $row = $result->fetch();
            $sorteo = new Sorteo($row['id'], $row['numero_sorteo'], $row['fecha']);
            return $sorteo;
        } else {
            return false;
        }

    }

    public static function insert($numero_sorteo, $fecha){
        $sql = "INSERT INTO sorteo (numero_sorteo, fecha) VALUES (?, ?)";
        $parametros = array($numero_sorteo, $fecha);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
        
        


?>