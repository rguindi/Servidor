<?php
class Cita{
    private $id;
    private $especialista;
    private $motivo;

    private $fecha;
    private $activo; 
    private $paciente; 

    public function __construct($id,$especialista,$motivo,$fecha,$activo, $paciente){
        $this->id =$id;
        $this->especialista=$especialista;
        $this->motivo=$motivo;
        $this->fecha=$fecha;
        $this->activo=$activo;
        $this->paciente=$paciente;
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