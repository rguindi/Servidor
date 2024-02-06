<?php
class User{
    private $id;
    private $nombre_usuario;
    private $rol;
    private $contrasena;


    public function __construct($id,$nombre_usuario,$rol,$contrasena){
        $this->id=$id;
        $this->nombre_usuario=$nombre_usuario;
        $this->rol=$rol;
        $this->contrasena=$contrasena;
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