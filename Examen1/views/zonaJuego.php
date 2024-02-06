<form action="" method="post" class="m-4">
<label for="letra">Introduzca una letra</label>
<input type="text" name="letra">
<input type="submit" name="envia" value="Enviar">
<?php  if(isset($errores)) errores ($errores,'letra');?>
<?php  if(isset($errores)) errores ($errores,'letralarga');?>
</form>
<span class="m-4">Numero de intentos: <? echo $intentos; ?></span> 


<h1 class="m-4">
<?php

$todas = array();
if (isset($_SESSION['todas']))$todas = $_SESSION['todas'];
array_push($todas, $letra);
$_SESSION['todas']=$todas;



for ($i=0; $i < strlen($palabra) ; $i++) { 

    if(in_array($palabra[$i],$todas)) {
        echo $palabra[$i]. '&nbsp;';


    }
    else{
        echo "* &nbsp;";

    }
}



?>

</h1>