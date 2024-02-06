<?php
class User{
    private $id_usuario;
    private $username;
    private $password;
    private $tipo;


    public function __construct($id_usuario,$username,$password,$tipo){
        $this->id_usuario=$id_usuario;
        $this->username=$username;
        $this->password=$password;
        $this->tipo=$tipo;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function __set($atributo,$valor){
        if(property_exists(__CLASS__,$atributo)) //Comprueba si existe el atributo
        $this->$atributo=$valor;
         else echo "No existe el atributo $atributo";
    
    }
}



?>