<?php

class ApuestaDAO{

    public static function findbyUser($user){
        $sql = "SELECT * FROM apuesta WHERE id_usuario = ? order by id desc limit 1";
        $parametros = array($user);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            $row = $result->fetch();
            $apuesta = new Apuesta($row['id'], $row['id_usuario'], $row['numero'], $row['fecha']);
            return $apuesta;
        } else {
            return false;
        }
    }

    public static function insert($user, $numeros, $fecha){
        $sql = "INSERT INTO apuesta (id_usuario, numero, fecha) VALUES (?, ?, ?)";
        $parametros = array($user, $numeros, $fecha);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($id, $user, $numeros, $fecha){
        $sql = "UPDATE apuesta SET id_usuario = ?, numero = ?, fecha = ? WHERE id = ?";
        $parametros = array($user, $numeros, $fecha, $id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function findAll(){
        $sql = "SELECT * FROM apuesta";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $apuestas = array();
        if ($result) {
            foreach ($result as $row) {
                $apuesta = new Apuesta($row['id'], $row['id_usuario'], $row['numero'], $row['fecha']);
                array_push($apuestas, $apuesta);
            }
            return $apuestas;
        } else {
            return false;
        }
    }
}
        
        


?>