<?php
if (count ($_FILES) !=0){
  
    print_r($_FILES);

    $ruta = '/var/www/servidor/Tema3/';
    $ruta .= basename ($_FILES ['fichero']['name']); 

    //MOVIENDO FICHERO AL SERVIDOR SEGUIR AQUI

}
?>