<?php

class UserDAO{

    public static function findAll(){
        $sql = "SELECT * FROM usuario";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuario = $result->fetchObject()) {
            $usuario = new User(
                $usuario->id,
                $usuario->nombre_usuario,
                $usuario->rol,
                $usuario->contrasena
            );
            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }

    public static function findByID($id) {
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        $usuario = new User(
            $usuario->id,
            $usuario->nombre_usuario,
            $usuario->rol,
            $usuario->contrasena
        );
        if ($usuario) {
            return $usuario;
        } else {
            return null;
        }
    }

 

    public static function validarUser($nombre_usuario, $pass){
        $sql = "SELECT * FROM usuario WHERE nombre_usuario = ? AND contrasena = ?";
        $parametros = array($nombre_usuario, $pass);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        if ($usuario) {
            $usuario = new User(
                $usuario->id,
                $usuario->nombre_usuario,
                $usuario->rol,
                $usuario->contrasena
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function isUser($id){
        $sql = "SELECT * FROM usuario WHERE id = ? AND rol = 'user'";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $usuario = $result->fetchObject();
        if ($usuario) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin($id){
        $sql = "SELECT * FROM usuario WHERE id = ? AND rol = 'admin'";
        $parametros = array($id);
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