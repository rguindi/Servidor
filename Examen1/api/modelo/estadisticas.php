<?php
class Estadisticas{

    private $id_estadistica;
    private $id_usuario;
    private $id_palabra;
    private $resultado;
    private $intentos;
    private $fecha;


    public function __construct($id_estadistica, $id_usuario, $id_palabra, $resultado,  $intentos, $fecha){

        $this->id_estadistica = $id_estadistica;
        $this->id_usuario = $id_usuario;
        $this->id_palabra = $id_palabra;
        $this->resultado= $resultado;
        $this->intentos= $intentos;
        $this->fecha= $fecha;

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