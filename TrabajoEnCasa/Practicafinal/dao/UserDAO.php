<?php

class UserDAO{

    public static function findAll(){
        $sql = "SELECT * FROM user";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuario = $result->fetchObject()) {
            $usuario = new User(
                $usuario->id,
                $usuario->user,
                $usuario->rol,
                $usuario->pass
            );
            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }

    public static function findByID($id) {
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $usuario = $result->fetchObject();
            $usuario = new User(
                $usuario->id,
                $usuario->user,
                $usuario->rol,
                $usuario->pass
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function insert($usuario) {
        $sql = "INSERT INTO usuario (id, user, rol, pass) VALUES VALUES (?,?,?,?)";
        //insertar todos los atributos
        $parametros = array(
                $usuario->id,
                $usuario->user,
                $usuario->rol,
                $usuario->pass
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($usuario) {
        $sql = "UPDATE usuario SET user = ?, rol = ?, pass = ? WHERE id = ?";
        $parametros = array(
            $usuario->user,
            $usuario->rol,
            $usuario->pass,
            $usuario->id,
            
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public static function delete($usuario) {
        $sql = "DELETE FROM usuario WHERE id = ?";
        $parametros = array($usuario->id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }


    }

    public static function validarUser($nombre, $pass) {
        $sql = "SELECT * FROM usuario WHERE user = ? AND pass = ?";
        $parametros = array($nombre, $pass);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            $usuario = new User(
                $usuario->id,
                $usuario->user,
                $usuario->rol,
                $usuario->pass
            );
            return $usuario;
        } else {
            return null;
        }
    }


    public static function isAdmin($id){
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            if ($usuario->rol == 'admin') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function isUser($id){
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            if ($usuario->rol == 'user') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



}
?>