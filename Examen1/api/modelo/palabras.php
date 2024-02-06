<?php
class Palabras{

    private $id_palabra;
    private $palabra;
    private $num_letras;


    public function __construct($id_palabra, $palabra, $num_letras){
        $this->id_palabra = $id_palabra;
        $this->palabra= $palabra;
        $this->num_letras= $num_letras;

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