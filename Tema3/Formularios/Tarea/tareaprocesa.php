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
  if (isset ($errores[$valor]))
    echo "<p class = error>".$errores[$valor]."</p>";

}

function recuerda($campo){
    if (!empty ($_REQUEST[$campo])) {
    echo "'$_REQUEST[$campo]'";
}else if (isset ($_REQUEST['Borrar']))
echo '';
}

function recuerdaRadio ($nombrecomun, $opcion){
    if (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion){
    echo 'checked';
    }else if (isset ($_REQUEST['Borrar'])){
    echo '';
    }
  }

  function recuerdaSelect ($nombrecomun, $opcion){
    if (isset ($_REQUEST[$nombrecomun]) && $_REQUEST [$nombrecomun]==$opcion){

      echo 'selected';
    }else if (isset ($_REQUEST['Borrar'])){
    echo '';
    }
  }
  
  function recuerdaCheck ($arrayCheck, $value){
    if (enviado() && isset($_REQUEST[$arrayCheck]) && in_array($value, $_REQUEST[$arrayCheck])){
    echo 'checked'; 
    }else if (isset ($_REQUEST['Borrar'])){
    echo '';
    }
    
 
  
}

function generarChecks($cantidad){

  
  for ($i=1; $i < $cantidad+1; $i++) { 

  echo '<label for="ch'.$i.'"><input type="checkbox"  name="checks[]" id="ch'.$i.'" value="valor'.$i.'" ';
  echo recuerdaCheck("checks", "valor".$i);
  echo ' >Check '.$i.'</label> <br>';  

    // echo ;
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

function validaFormulario (&$errores){
if (textoVacio ('alfabetico')) $errores ['alfabetico'] = 'El Alfabetico no puede estar vacío.';
if (textoVacio ('alfanumerico')) $errores ['alfanumerico'] = 'El Alfanumerico no puede estar vacío.';
if (textoVacio ('numerico')) $errores ['numerico'] = 'El Numérico no puede estar vacío.';
if (numeroValido ($_REQUEST ['numerico'])) $errores ['valornumero'] = "El número debe estar comprendido entre 0 y 100.";
if (textoVacio ('fecha')) $errores ['fecha'] = 'Debe de seleccionar una fecha.';
if (!mayorEdad()) $errores ['mayor'] = 'Debe ser mayor a 18 años.';
if (textoVacio ('opcion')) $errores ['opcion'] = 'Escoja una de las opciones.';
if (textoVacio ('select')) $errores ['select'] = 'Seleccione un Campo.';
if (textoVacio ('checks')) $errores ['check'] = 'Marque las opciones deseadas';
if (isset($_REQUEST['checks']) && !checksCorrectos($_REQUEST['checks'])) $errores ['checks'] = 'Debe elegir un mínimo de 1 y un máximo de 3.';

if (textoVacio ('telefono')) $errores ['telefono'] = 'Indique su número de teléfono.';
if (textoVacio ('email')) $errores ['email'] = 'Indique su email.';
if (textoVacio ('pass')) $errores ['pass'] = 'Contraseña requerida.';
//if (textoVacio ('archivo')) $errores ['archivo'] = 'Seleccione una imagen.';
if (count($errores)==0) return true;
return false;

}



//FALTA MOSTRAR PAGINA DE RESULTADOS SI ESTA BIEN, SI NO REPETIR FORMULARIO

?>