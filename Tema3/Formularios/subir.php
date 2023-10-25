<?php
if (count($_FILES) != 0) {

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $rutaC = '/var/www/servidor/Tema3/';

    $numeroficheros = count($_FILES['fichero']['name']);


    for ($i = 0; $i < $numeroficheros; $i++) {

        $ruta = $rutaC . basename($_FILES['fichero']['name'][$i]);

        if (move_uploaded_file($_FILES['fichero']['tmp_name'][$i], $ruta)) {
            echo "Archivo subido con éxito";
        } else {
            echo "Error subiendo archivo";
        }
        
    }










    // $ruta .= basename ($_FILES ['fichero']['name']); 
    // if (move_uploaded_file($_FILES ['fichero']['tmp_name'], $ruta)){
    //     echo "Archivo subido con éxito";
    // }else{
    //     echo "Error subiendo archivo";
    // };

}
?>