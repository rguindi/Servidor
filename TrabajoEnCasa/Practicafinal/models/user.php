<?php
class User{
    private $id;
    private $user;
    private $rol;

    private $pass;


    public function __construct($id,$user,$rol,$pass){
        $this->id=$id;
        $this->user=$user;
        $this->rol=$rol;
        $this->pass=$pass;

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