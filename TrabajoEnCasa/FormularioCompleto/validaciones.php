<?php



function enviado(){
    if(isset ($_REQUEST['Enviar'])) return true;
    else return false;
}

function recuerda ($dato){
if (isset ($_REQUEST['Borrar'])) echo '';
elseif (!empty ($_REQUEST [$dato])) echo $_REQUEST [$dato];

}

function recuerdaRadio ($nombrecomun, $opcion){
    if (isset ($_REQUEST['Borrar'])) echo '';
    elseif (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion) echo 'checked';
  }
  function recuerdaCheck ($arrayCheck, $value){
    if (isset ($_REQUEST['Borrar']))echo '';
    elseif (isset($_REQUEST[$arrayCheck]) && in_array($value, $_REQUEST[$arrayCheck])) echo 'checked'; 
}

function recuerdaSelect ($nombrecomun, $opcion){
    if (isset ($_REQUEST['Borrar']))echo '';
    elseif (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion)echo 'selected';
  }

function Capitaliza ($frase){ //Comprobamos que las palabras empiezan en mayúsculas

    $capitaliza = '/^(?:[A-Z][a-z]*\b\s*)+$/';

    return preg_match($capitaliza, $frase);
// ^\S+@\S+\.\w+$    Esta sería para email
}


//   --------------EXPRESIONES REGULARES-----------------

function  listaErrores (&$errores){

    if (enviado()){

        if (empty ($_REQUEST ['alfabetico'])) $errores ['alfabetico'] = 'Rellene alfabetico';
        if (!Capitaliza($_REQUEST ['alfabetico']) && !empty ($_REQUEST ['alfabetico'])) $errores ['Capitaliza'] = 'Rellene en formato Capitalizado';
        if (empty ($_REQUEST ['numerico'])) $errores ['numerico'] = 'Rellene numerico';
        if (empty ($_REQUEST ['fecha'])) $errores ['fecha'] = 'Rellene fecha';
        if (empty ($_REQUEST ['opcion'])) $errores ['opcion'] = 'Rellene Opcion';
        if (empty ($_REQUEST ['aficcion'])) $errores ['aficcion'] = 'Rellene Aficcion o instrumentos';
        if (empty ($_REQUEST ['select'])) $errores ['select'] = 'Seleccione algo';
        if (empty ($_REQUEST ['email'])) $errores ['email'] = 'Escriba email';
        if (empty ($_REQUEST ['pass'])) $errores ['pass'] = 'Escriba pass';
        // if (empty ($_REQUEST ['archivo'])) $errores ['archivo'] = 'Suba archivo';



    }

    if (count($errores)== 0) return true;
    else return false;

}

?>