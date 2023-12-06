<?php

function enviado (){
    if(!empty ($_REQUEST ['Enviar'])) return true;
    return false;
}
function textoVacio ($campodetexto){
    if (empty ($_REQUEST [$campodetexto])) return true;
    return false;
}

function printerror($errores, $valor){
  if (isset ($errores[$valor]))
    echo "<p class = error>".$errores[$valor]."</p>";

}

function recuerda($campo){
    if (enviado() && !empty ($_REQUEST[$campo])) {
    echo "'$_REQUEST[$campo]'";
}else if (isset ($_REQUEST['Borrar']))
echo '';
}

function validarNombre ($nombre) {
$exp = '/^[a-zA-Z]{3}/';
if (preg_match ($exp, $nombre)) return true;
return false;

}

function validarposicion ($posicion) {
   $exp = '/^[a-zA-Z]{3,}\s[a-zA-Z]{3,}$/';
    if (preg_match ($exp, $posicion)) return true;
    return false;
    
    }


function validaFecha ($fecha){
    $exp = '/^[\d]{2}\/[\d]{2}\/[\d]{4}$/';
    if (preg_match ($exp, $fecha)) return true;
    return false;

}

  function validaDNI ($dni){

    $exp = '/^[\d]{8}[a-zA-Z]{1}$/';
    if (preg_match ($exp, $dni)) {
        $numeros = substr($dni,0,8);
        $letra= strtoupper(substr($dni,8,1));
        $resto = $numeros%23;
        $posibles = "TRWAGMYFPDXBNJZSQVHLCKE";
        if ($letra ==  substr ($posibles,$resto,1))return true;
        else return false;

  }else return false;
}



function validaFormulario (&$errores){
if (textoVacio ('nombre')) $errores ['nombre'] = 'El nombre no puede estar vacío.';
if (!textoVacio ('nombre') && !validarNombre ($_REQUEST['nombre'])) $errores ['validarNombre'] = 'Mínimo 3 caracteres.';
if (textoVacio ('posicion')) $errores ['posicion'] = 'La posicion no puede estar vacía.';
if (!textoVacio ('posicion') && !validarposicion ($_REQUEST['posicion'])) $errores ['validarPosicion'] = 'Mínimo 3 caracteres para cada apellido.';
if (textoVacio ('DNI')) $errores ['DNI'] = 'El DNI no puede estar vacío.';
if (!textoVacio ('DNI') && !validaDNI ($_REQUEST['DNI']) ) $errores ['DNIMAL'] = 'Introduzca un DNI correcto';
if (textoVacio ('fecha')) $errores ['fecha'] = 'Debe seleccionar una fecha.';
if (!textoVacio ('fecha') && !validaFecha ($_REQUEST['fecha'])) $errores ['formatoFecha'] = 'Introduzca una fecha con el formato espcificado. Ejemplo 07/12/2021.';
if (!textoVacio ('fecha') && validaFecha ($_REQUEST['fecha']) && !mayorEdad ()) $errores ['mayorEdad'] = 'Es necesario tener más de 18 años.';
if (textoVacio ('sueldo')) $errores ['sueldo'] = 'El sueldo no puede estar vacío.';
if (textoVacio ('dorsal')) $errores ['dorsal'] = 'El dorsal no puede estar vacío.';



if (count($errores)==0) return true;
return false;

}

?>