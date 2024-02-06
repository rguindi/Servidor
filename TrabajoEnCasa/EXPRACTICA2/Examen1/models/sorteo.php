<?php
class Sorteo{
    private $id;
    private $numero_sorteo;
    private $fecha;

    public function __construct($id,$numero_sorteo,$fecha){
        $this->id=$id;
        $this->numero_sorteo=$numero_sorteo;
        $this->fecha=$fecha;
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