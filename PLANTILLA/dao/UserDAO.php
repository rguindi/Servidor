<?php

class UserDAO{

    public static function findAll(){
        $sql = "SELECT * FROM Usuario";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuario = $result->fetchObject()) {
            $usuario = new User(
                $usuario->codUsuario,
                $usuario->password,
                $usuario->descUsuario,
                $usuario->fechaUltimaConexion,
                $usuario->perfil,
                $usuario->activo
            );
            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }

    public static function findByID($codUsuario) {
        $sql = "SELECT * FROM Usuario WHERE codUsuario = ?";
        $parametros = array($codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $usuario = $result->fetchObject();
            $usuario = new User(
                $usuario->codUsuario,
                $usuario->password,
                $usuario->descUsuario,
                $usuario->fechaUltimaConexion,
                $usuario->perfil,
                $usuario->activo
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function insert($usuario) {
        $sql = "INSERT INTO Usuario (codUsuario, password, descUsuario, fechaUltimaConexion, perfil, activo) VALUES (?,?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array(
            $usuario->codUsuario,
            sha1($usuario->password),
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->perfil,
            $usuario->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($usuario) {
        $sql = "UPDATE Usuario SET password = ?, descUsuario = ?, fechaUltimaConexion = ?, perfil =? WHERE codUsuario = ?";
        $parametros = array(
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->perfil,
            $usuario->codUsuario,
            
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public static function delete($usuario) {
        $sql = "update Usuario set activo = false where codUsuario = ?";
        $parametros = array($usuario->codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }


    }

    public static function buscarPorNombre($nombre) {
        $sql = "SELECT * FROM Usuario WHERE descUsuario LIKE ? AND activo = true";

        $parametros = array("%$nombre%");
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuario = $result->fetchObject()) {
            $usuario = new User(
                $usuario->codUsuario,
                $usuario->password,
                $usuario->descUsuario,
                $usuario->fechaUltimaConexion,
                $usuario->perfil,
                $usuario->activo
            );
            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }

    public static function validarUser($codUsuario, $password) {
        $sql = "SELECT * FROM Usuario WHERE codUsuario = ? AND password = ? AND activo = true";
        $password = sha1($password);
        $parametros = array($codUsuario, $password);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            $usuario = new User(
                $usuario->codUsuario,
                $usuario->password,
                $usuario->descUsuario,
                $usuario->fechaUltimaConexion,
                $usuario->perfil,
                $usuario->activo
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function cambiarPassword($codUsuario, $password) {
        $sql = "UPDATE Usuario SET password = ? WHERE codUsuario = ?";
        $password = sha1($password);
        $parametros = array($password, $codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>