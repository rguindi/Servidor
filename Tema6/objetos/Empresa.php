
<?php
class Empresa{

    private $cif;
    private $nombre;
    private $localidad;

//Constructor
    function __construct($cif,$nombre,$localidad){
        $this->cif=$cif;
        $this->nombre=$nombre;
        $this->localidad=$localidad;
    }       

//Getter setter
   function getCif(){
        return  $this->cif;
    }
    function setCif($cif){
        $this->cif=$cif;
    }
    function getNombre(){
        return  $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    function getLocalidad(){
        return  $this->localidad;
    }
    function setLocalidad($localidad){
        $this->localidad=$localidad;
    }


}
?>