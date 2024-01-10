
<?php
class EmpresaM{

    private $cif;
    private $nombre;
    private $localidad;

    public static $contador=0; //Variable estatica

//Constructor
    function __construct($cif,$nombre,$localidad){
        self::$contador++; //Incrementa la variable estatica
        $this->cif=$cif;
        $this->nombre=$nombre;
        $this->localidad=$localidad;
    }       

    //Con este metodo magico podemos acceder a los atributos privados
public function __get($atributo){
    return $this->$atributo;
}

public function __set($atributo,$valor){
    if(property_exists(__CLASS__,$atributo)) //Comprueba si existe el atributo
    $this->$atributo=$valor;
     else echo "No existe el atributo $atributo";

}
    
public function __toString(){
    return "CIF: $this->cif, Nombre: $this->nombre, Localidad: $this->localidad";


    }

    //funcion estatica
   static function saluda(){
    self::saluda1(); //Llamada a un metodo estatico desde otro metodo estatico
        return "Hola";
    } 
    //funcion estatica
   static function saluda1(){
        echo "Hola otra vez";
    } 
    

}

?>