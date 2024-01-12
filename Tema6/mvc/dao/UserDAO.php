<?php

class UserDAO{

    public static function  findAll(){
        $sql = "SELECT * FROM Usuario";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while($usuario =  $result->fetchObject()){
          $usuario = new User(
            $usuario->codUsuario,
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->perfil);
          array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }

    public static function findByID($codUsuario){
        $sql = "SELECT * FROM Usuario WHERE codUsuario = ?";
        $parametros = array($codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if($result->rowCount() == 1){
      
     $usuario = $result->fetchObject();
        $usuario = new User(
            $usuario->codUsuario,
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaUltimaConexion,
            $usuario->perfil);
        return $usuario;
        }else{
            return null;
        }
    }

    public static function insert($usuario){
        $sql = "INSERT INTO Usuario (codUsuario, password, descUsuario, fechaUltimaConexion) VALUES (?,?,?,?)";
        //insertar todos los atributos
        $parametros = (array)$usuario;
        unset($parametros['User perfil']); //Eliminamos el perfil porque no se inserta
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}



?>