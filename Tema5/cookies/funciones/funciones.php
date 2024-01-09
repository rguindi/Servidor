<?php
function insertarCookie($id){

//Si no existe la cookie la creamos
if(!isset($_COOKIE[$id])){
    setcookie($id, $id,time()+3600*24,'/');
 
}

//Si existe la cookie la borramos y la creamos
if(isset($_COOKIE[$id])){

    setcookie($id, $id,time()-3600*24,'/');
    setcookie($id, $id,time()+3600*24,'/');
}
}

?>