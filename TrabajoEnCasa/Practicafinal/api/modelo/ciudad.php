<?php
class Ciudad{

    private $id;
    private $nombre;
    private $cantidad;


    public function __construct($id, $nombre, $cantidad){
        $this->id = $id;
        $this->nombre= $nombre;
        $this->cantidad= $cantidad;

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