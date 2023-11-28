<?php
function vacio ($campo){
if (empty ($_REQUEST[$campo])) return true;
else return false;
}

function enviado (){
    if (isset ($_REQUEST["en"])) return true;
else return false;
}

function echoerror($fallos, $error){

    echo $fallos[$error];
}

function recordar ($campo){
    if (enviado() && !empty ($_REQUEST[$campo])) 
    echo $_REQUEST[$campo];
    if (isset($_REQUEST['res']))
    echo "''";
}

?>