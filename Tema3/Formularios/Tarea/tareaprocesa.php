<?php

function enviado (){
    if(!empty ($_REQUEST ['Enviar'])) return true;
    return false;
}
function textoVacio ($campodetexto){
    if (empty ($_REQUEST [$campodetexto])) return true;
    return false;
}
function numeroValido($numero){
    if (($numero < 0 || $numero >100) && (!empty ($_REQUEST['numerico']))) return true;
    return false;
}
function printerror($errores, $valor){
    echo "<p class = error>".$errores[$valor]."</p>";

}

function recuerda($campo){
    if (!empty ($_REQUEST[$campo])) 
    echo "'$_REQUEST[$campo]'";
}

function recuerdaRadio ($nombrecomun, $opcion){
    if (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion)
    echo 'checked';
  }

  function recuerdaSelect ($nombrecomun, $opcion){
    if (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion)
    echo 'selected';
  }
  
  function recuerdaCheck ($arrayCheck, $value){
    if (enviado() && isset ($_REQUEST[$arrayCheck]) && in_array($value, $_REQUEST[$arrayCheck]))
    // if (isset ($_REQUEST[$arrayCheck[$value]]) && in_array($value, $arrayCheck))
    echo 'checked';
}

function generarChecks($cantidad){
  for ($i=1; $i < $cantidad+1; $i++) { 
    echo '<label for="ch'.$i.'"><input '.recuerdaCheck("check", "check'.$i.'").' type="checkbox" name="check[]" id="ch'.$i.'" value="check'.$i.'" >Check'.$i.'</label> <br>';  
    // echo recuerdaCheck('check', "check'.$i.'");

}

}
function checksCorrectos ($arrayCheck){
    if (count($arrayCheck) < 1 || count($arrayCheck) > 3) return false;
    return true;
  }

  function mayorEdad(){
    $nacimiento = strtotime($_REQUEST['fecha']);
    $hoy = strtotime('now');
    $edad= floor(($hoy - $nacimiento) / (60 * 60 * 24 * 365));
    if ($edad < 18) return false;
    return true;
  }





//RECORDAR CHECK FALTA

?>