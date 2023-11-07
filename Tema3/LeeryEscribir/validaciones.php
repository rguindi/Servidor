<?php


function enviadoselecciona()   //Comprueba si se ha enviado el formulario con alguno de los 2 botones
{
    if (isset($_REQUEST["leer"]) || isset($_REQUEST["escribir"]))
        return true;
    return false;

}

function volver()
{
    if (isset($_REQUEST["volver"]))
        return true;
    return false;

}
function escribir()
{
    if (isset($_REQUEST["escribir"]))
        return true;
    return false;

}

function guardar()
{
    if (isset($_REQUEST["guardar"]))
        return true;
    return false;

}

function existe()  //Comprueba si existe el fichero
{
  
        if (file_exists($_REQUEST['texto'])) {
            return true;

        } else {
                     return false;
        }

    
}

$errores  = array();
if (enviadoselecciona() && !existe()) $errores ['existe'] = "<p  style='color: red;'>El fichero no existe</p>";



?>