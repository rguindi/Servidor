<?php


require('./conexionBD.php');



function botonLeer(){
    if (isset($_REQUEST['leer'])) return true;
    return false;
}



                    //LEER TABLA
function leerTabla(){
$con = new mysqli();   //Creamos la conexion

try {

    $con->connect(IP,USER,PASSWORD,'jugadores');
    $sql = 'select * from jugadores';
    $result = mysqli_query($con, $sql);

    echo '<table><tr><th>Nombre</th><th>Posición</th><th>DNI</th><th>F_Nacimiemto</th><th>Sueldo</th><th>Dorsal</th><tr>';

    while ($array = mysqli_fetch_assoc($result)){
        echo '<tr>';
        $dni = '';
        foreach ($array as $key => $value) {
            echo '<td>'.$value.'</td>';
            if ($key == 'dni') $dni = $value;
        }
        echo '<td><form action="" method="get"><input name = "modificar" type="submit" value="Modificar"></td>';
        echo '<input type="hidden" name="dni" value="' . $dni . '">';
        echo '<td><input name = "eliminar" type="submit" value="Eliminar"></td></form>';
        echo '</tr>';
      }

   echo '</table>';


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

echo "Error de los datos de conexion";

$con->close();
}


}
//-------------------------------------------------------------------------------------------------------

                    //FUNCION PARA CARGAR EL SCRIPT
function cargarScript(){
    $con = new mysqli();   //otra forma de conectar

try {

        $con->connect(IP, USER, PASSWORD);
        $script = file_get_contents('./jugadores.sql');
        $con->multi_query($script);


        //Parte de codigo para comprobar si hay algun error en el Script
        do {
                $con->store_result();
                if (!$con->next_result()) {
                        break;
                }
        } while (true);
        
        $con->close();
        
        
        
    } catch (\Throwable $th) {
        // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
        switch ($th->getCode()) {
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
            $con->close();
        }
        
    }
    
    //-------------------------------------------------------------------------------------------------------
    
    



?>
