<?php

class UserDAO{

    public static function findAll(){
        $sql = "SELECT * FROM usuarios";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuario = $result->fetchObject()) {
            $usuario = new User(
                $usuario->id_usuario,
                $usuario->username,
                $usuario->password,
                $usuario->tipo
            );
            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }

    public static function findByID($id_usuario) {
        $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $parametros = array($id_usuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        $usuario = new User(
            $usuario->id_usuario,
            $usuario->username,
            $usuario->password,
            $usuario->tipo
        );
        if ($usuario) {
            return $usuario;
        } else {
            return null;
        }
    }

 

    public static function validarUser($username, $password){
        $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
        $password = sha1($password);
        $parametros = array($username, $password);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        if ($usuario) {
            $usuario = new User(
                $usuario->id_usuario,
                $usuario->username,
                $usuario->password,
                $usuario->tipo
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function isUser($id_usuario){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = ? AND tipo = 'user'";
        $parametros = array($id_usuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        if ($usuario) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin($id_usuario){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = ? AND tipo = 'admin'";
        $parametros = array($id_usuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        if ($usuario) {
            return true;
        } else {
            return false;
        }
    }


}
?>