<?php
class Apuesta{
    private $id;
    private $id_usuario;
    private $numero;
    private $fecha;


    public function __construct($id,$id_usuario,$numero,$fecha){
        $this->id=$id;
        $this->id_usuario=$id_usuario;
        $this->fecha=$fecha;
        $this->numero=$numero;
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