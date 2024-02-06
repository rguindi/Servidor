<?php

function textVacio($name){

    if (empty($_REQUEST[$name])){
      return true;
    }
 
    return false;
 }

 function errores ($errores, $name){
    if (isset ($errores[$name]))
        echo $errores [$name];


}

function validado(){
    if (isset($_SESSION['usuario'])){
        return true;
    }
    return false;

}
function validaFormulario (&$errores){

    if (textVacio("nombre")) $errores ['nombre'] = "Nombre vacio.";
    if (textVacio("pass")) $errores ['pass'] = "PASS vacio.";
   if (count($errores)==0) return true;
   return false;
   }
   

?>