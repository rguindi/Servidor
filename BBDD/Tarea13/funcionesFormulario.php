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
$exp = '/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+$/';     //3 palabras empezando por Mayuscula
if ((preg_match ($exp, $nombre)) && (strlen($nombre)<=70)) return true;
return false;

}

function validarposicion ($posicion) {
//    $exp = '/^(Portero|Defensa|Central|Lateral|Delantero)$/';   //Validado por expresion Regular
//     if (preg_match ($exp, $posicion)) return true;

    $posiciones = ["Portero", "Defensa", "Central", "Lateral", "Delantero"];        //Validado por codigo PHP
    if (in_array($posicion, $posiciones))  return true;

    return false;
    
    }


function validaFecha ($fecha){
    $exp = '/^[\d]{4}\-[\d]{2}\-[\d]{2}$/';
    if (preg_match ($exp, $fecha)) return true;
    return false;

}

function validaDorsal ($dorsal){
    
    if ($dorsal>0 && $dorsal<25) return true;
    return false;

}

function validaSueldo ($sueldo){
    $sueldoFloat = floatval($sueldo);
    if (($sueldoFloat >0)) return true;
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
if (!textoVacio ('nombre') && !validarNombre ($_REQUEST['nombre'])) $errores ['validarNombre'] = 'Escriba nombre y 2 apellidos, con primer caracter de cada palabra en mayúscula. El nombre completo debe ser inferior a 75 catacteres.';
if (textoVacio ('posicion')) $errores ['posicion'] = 'La posicion no puede estar vacía.';
if (!textoVacio ('posicion') && !validarposicion ($_REQUEST['posicion'])) $errores ['validarPosicion'] = 'Solo puede elegir una de estas posiciones: "Portero", "Defensa", "Central", "Lateral" o "Delantero".';
if (textoVacio ('DNI')) $errores ['DNI'] = 'El DNI no puede estar vacío.';
if (!textoVacio ('DNI') && !validaDNI ($_REQUEST['DNI']) ) $errores ['DNIMAL'] = 'Introduzca un DNI correcto';
if (textoVacio ('fecha')) $errores ['fecha'] = 'Debe seleccionar una fecha.';
if (!textoVacio ('fecha') && !validaFecha ($_REQUEST['fecha'])) $errores ['formatoFecha'] = 'Introduzca una fecha con el formato espcificado. Ejemplo 2007-12-07.';
if (textoVacio ('sueldo')) $errores ['sueldo'] = 'El sueldo no puede estar vacío.';
if (!textoVacio ('sueldo') && !validaSueldo ($_REQUEST['sueldo'])) $errores ['formatoSueldo'] = 'Introduzca un sueldo correcto.';
if (textoVacio ('dorsal')) $errores ['dorsal'] = 'El dorsal no puede estar vacío.';
if (!textoVacio ('dorsal') && !validaDorsal ($_REQUEST['dorsal'])) $errores ['formatoDorsal'] = 'Introduzca un número de dorsal entre 1 y 24.';



if (count($errores)==0) return true;
return false;

}

?>