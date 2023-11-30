<?php


require("./confBD.php");

try {
    $con = mysqli_connect(IP,USER,PASSWORD,'prueba');
      
    $borrar =  'delete from alumnos where id>=5';
    mysqli_query($con, $borrar);
    echo mysqli_affected_rows($con);

    $sql = 'select * from alumnos';

    $result = mysqli_query($con, $sql);

    //ARRAY ASOCIATIVO devuelte en formato asociativo array

//   while ($array = mysqli_fetch_assoc($result)){
//     echo '<pre>';
//     print_r($array);
//   }

     //ARRAY Object  Devuelve en formato objeto
    //  while ($array = mysqli_fetch_object($result)){
    //     echo '<pre>';
    //     print_r($array);
    //   }

       //ARRAY All Devuelve array de 'arrays'
    //  while ($array = mysqli_fetch_all($result)){
    //     echo '<pre>';
    //     print_r($array);
    //   }

         //ARRAY row devuelve filas
     while ($array = mysqli_fetch_row($result)){
        echo '<pre>';
        print_r($array);
      }
    
    
    



    mysqli_close($con);
// }
} catch (\Throwable $th) {
    // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
    switch ($th->getCode()){
        case 1062:
                echo "Ha introducido una clave primaria repetida";
                break;
        default:
                echo $th->getMessage();
                break;
    }
    // echo mysqli_connect_errno();
    // echo mysqli_connect_error();
    echo "Error de los datos de conexion";
    // mysqli_close($con) para cerrar la conexion
    mysqli_close($con);
}

// Creacion de una tabla


?>
