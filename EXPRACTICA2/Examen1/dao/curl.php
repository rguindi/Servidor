<?php

function getSorteo(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/EXPRACTICA2/apisorteo/index.php/numeros?min=1&max=50');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code != 200) echo "Error al listar";
    curl_close($ch);
    return $response;
    
}

?>