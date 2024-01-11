<?php
class User{
    private $codUsuario;
    private $password;
    private $descUsuario;

    private $fechaUltimaConexion;
    private $perfil; //Puede ser usuario, administrador o invitado

    public function __construct($codUsuario,$password,$descUsuario,$fechaUltimaconexion,$perfil){
        $this->codUsuario=$codUsuario;
        $this->password=$password;
        $this->descUsuario=$descUsuario;
        $this->fechaUltimaConexion=$fechaUltimaconexion;
        $this->perfil=$perfil;
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