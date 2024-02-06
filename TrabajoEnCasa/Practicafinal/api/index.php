<?php
require('./controlador/Base.php');
require('./controlador/CiudadesController.php');

//print_r (Base::condiciones());

if (isset( $_SERVER['PATH_INFO'])){

   

    //comprobar el recurso
    $recurso= Base::divideURI();
    // echo $recurso[1];

    if($recurso [1]== 'ciudades'){
        CiudadesController::ciudades();

    }
    
}else{
    Base::response('HTTP/1.1 400 Direccion incorrecta, no se ha especificado el recurso');
}

?>
