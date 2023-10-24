<?php

function enviado (){
if (isset ($_REQUEST["Enviar"])) return true;
return false;

}
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

function recuerda ($name){
    if (enviado() && !empty ($_REQUEST[$name])) 
    echo $_REQUEST[$name];
    if (isset($_REQUEST['Borrar']))
    echo '';
}

function radioVacio ($name){
  if (isset($_REQUEST[$name]))  return false;
    return true;
}

function recuerdaRadio ($name, $value){
  if (enviado() && isset ($_REQUEST[$name]) && $_REQUEST [$name]==$value)
  echo 'checked';
else if (isset ($_REQUEST['Borrar']))
echo '';
}

function recuerdaCheck ($name, $value){
  if (enviado() && isset ($_REQUEST[$name]) && in_array($value, $_REQUEST[$name]))
  echo 'checked';
else if (isset ($_REQUEST['Borrar']))
echo '';
}

function selectVacio ($name){
  if (isset ($_REQUEST[$name]) && $_REQUEST[$name]!=0) return false;
  return true;


}

function recuerdaSelect ($name, $value){
  if (enviado() && isset ($_REQUEST[$name]) && $_REQUEST [$name]==$value)
  echo 'selected';
else if (isset ($_REQUEST['Borrar']))
echo '';
}

function validaFormulario (&$errores){

 if (textVacio("nombre")) $errores ['nombre'] = "Nombre vacio.";
 if (textVacio("apellido")) $errores ['apellido'] = "Apellido vacio.";
 if (radioVacio('genero')) $errores ['genero'] = 'Debe seleccionar un Genero';
 if (radioVacio('aficcion')) $errores ['aficcion'] = 'Debe seleccionar al menos una aficccion';
 if (radioVacio('fecha_nac')) $errores ['fecha_nac'] = 'Debe seleccionar una fecha de nacimiento';
if (selectVacio('equipos')) $errores ['equipos'] = 'Debe seleccionar un aquipo';
if (textVacio("fichero")) $errores ['fichero'] = "Fichero vacio.";
if (count($errores)==0) return true;
return false;
}

?>