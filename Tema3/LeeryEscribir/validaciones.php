<?php


function enviadoselecciona()
{
    if (!empty($_REQUEST["leer"]) || !empty($_REQUEST["escribir"]))
        return true;
    return false;

}

function volver()
{
    if (!empty($_REQUEST["volver"]))
        return true;
    return false;

}
function escribir()
{
    if (!empty($_REQUEST["escribir"]))
        return true;
    return false;

}

function existe()
{
  
        if (file_exists($_REQUEST['texto'])) {
            return true;

        } else {
         echo '<p  style="color: red;">El fichero no existe</p>';
                     return false;
        }

    
}





?>