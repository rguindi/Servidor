<?php


require('./conexionBD.php');



//---------------------//LEER TABLA
function leerTabla(){
$con = new mysqli();   //Creamos la conexion

try {

    $con->connect(IP,USER,PASSWORD);
    $con->select_db('jugadores');
    $sql = 'select * from jugadores';
    $result = mysqli_query($con, $sql);

    echo '<table><tr><th>Nombre</th><th>Posición</th><th>DNI</th><th>F_Nacimiemto</th><th>Sueldo</th><th>Dorsal</th><tr>';

    while ($array = mysqli_fetch_assoc($result)){
        echo '<tr>';
        $nombre = '';
        $posicion = '';
        $dni = '';
        $nacimiento = '';
        $sueldo = 0;
        $dorsal = 0;
        foreach ($array as $key => $value) {
            echo '<td>'.$value.'</td>';
            if ($key == 'nombre') $nombre = $value;
            if ($key == 'posicion') $posicion = $value;
            if ($key == 'dni') $dni = $value;
            if ($key == 'nacimiento') $fecha = $value;
            if ($key == 'sueldo') $sueldo = $value;
            if ($key == 'dorsal') $dorsal = $value;
        }
        echo '<td><form action="./modificar.php" method="get"><input name = "modificar" type="submit" value="Modificar"></td>';
        echo '<input type="hidden" name="nombre" value="' . $nombre . '">';
        echo '<input type="hidden" name="posicion" value="' . $posicion . '">';
        echo '<input type="hidden" name="DNI" value="' . $dni . '">';
        echo '<input type="hidden" name="fecha" value="' . $fecha . '">';
        echo '<input type="hidden" name="sueldo" value="' . $sueldo . '">';
        echo '<input type="hidden" name="dorsal" value="' . $dorsal . '"></form>';
        echo '<form action="#" method="get"><td><input name = "eliminar" type="submit" value="Eliminar"></td>';
        echo '<input type="hidden" name="DNI" value="' . $dni . '"></form>';
        echo '</tr>';
      }

   echo '</table>';


} catch (\Throwable $th) {
// Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
switch ($th->getCode()){
    case 0:
        echo "No encuentra todos los parámetros de la secuencia";
        break;
    case 2002:
        echo "La IP de acceso a la BD es incorrecta";
        break;
    case 1045:
        echo "Usuario o contraseña incorrectos";
        break;
    case 1049:
        echo "Error al conectarse a la base de datos indicada";
                //Crear boton para cargar Script
                echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear la Base de Datos">  </form>';

        break;
    case 1146:
        echo "Error al encontrar la tabla indicada";
        //Crear boton para cargar Script
        echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear la Base de Datos">  </form>';
        break;
    case 1064:
        echo "No se han indicado los valores a insertar en la BD";
        break;
    default:
        echo "Error no identificado: " . $th->getMessage();
}





}
finally{
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
        switch ($th->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado: " . $th->getMessage();
        }
        
    }
}
    //-------------------------------------------------------------------------------------------------------
    

    //--------------------------ELIMINAR REGISTRO------------------------------------------------------------


    function eliminarRegistro($dni){
        $con = new mysqli();   //Creamos la conexion
        try {
            $con->connect(IP,USER,PASSWORD,'jugadores');
            $sql = "delete from jugadores where dni = ?";
            $stmt = $con->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param('s', $dni);
            $stmt->execute();
            $con->close();
            echo "Registro eliminado";
        } catch (\Throwable $th) {
            // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
            switch ($th->getCode()){
                case 0:
                    echo "No encuentra todos los parámetros de la secuencia";
                    break;
                case 2002:
                    echo "La IP de acceso a la BD es incorrecta";
                    break;
                case 1045:
                    echo "Usuario o contraseña incorrectos";
                    break;
                case 1049:
                    echo "Error al conectarse a la base de datos indicada";
                    break;
                case 1146:
                    echo "Error al encontrar la tabla indicada";
                    break;
                case 1064:
                    echo "No se han indicado los valores a insertar en la BD";
                    break;
                default:
                    echo "Error no identificado: " . $th->getMessage();
            }
            $con->close();
        }
    }
    
    //-------------------------------------------------------------------------------------------------------


//--------------------------AÑADIR REGISTRO------------------------------------------------------------
function addRegistro(){


$con = new mysqli();   

try {

        $con->connect(IP,USER,PASSWORD,'jugadores');
        //Creamos sentencia insert
        $sql = "INSERT INTO jugadores (nombre, posicion, dni, nacimiento, sueldo, dorsal) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->stmt_init();
        $stmt->prepare($sql);
        $nombre = $_REQUEST['nombre'];
        $posicion = $_REQUEST['posicion'];
        $dni = $_REQUEST['DNI'];
        $nacimiento = $_REQUEST['fecha'];
        $sueldo = $_REQUEST['sueldo'];
        $dorsal = $_REQUEST['dorsal'];
        $stmt->bind_param('ssssdi',$nombre, $posicion, $dni, $nacimiento, $sueldo, $dorsal);
        $stmt->execute();
        $con->close();



} catch (\Throwable $th) {
    // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
    switch ($th->getCode()){
        case 0:
            echo "No encuentra todos los parámetros de la secuencia";
            break;
        case 2002:
            echo "La IP de acceso a la BD es incorrecta";
            break;
        case 1045:
            echo "Usuario o contraseña incorrectos";
            break;
        case 1049:
            echo "Error al conectarse a la base de datos indicada";
            break;
        case 1146:
            echo "Error al encontrar la tabla indicada";
            break;
        case 1064:
            echo "No se han indicado los valores a insertar en la BD";
            break;
        default:
            echo "Error no identificado: " . $th->getMessage();
    }
    // echo mysqli_connect_errno();
    // echo mysqli_connect_error();
    echo "Error de los datos de conexion";
    // mysqli_close($con) para cerrar la conexion
    $con->close();
}
}
    //-------------------------------------------------------------------------------------------------------


    //--------------------------MODIFICAR REGISTRO------------------------------------------------------------
function modificaRegistro(){


    $con = new mysqli();   
    
    try {
    
            $con->connect(IP,USER,PASSWORD,'jugadores');
            //Creamos sentencia insert
            $sql = "UPDATE jugadores set nombre = ?, posicion = ?, dni = ?, nacimiento = ?, sueldo = ?, dorsal= ? where dni = ?";
            $stmt = $con->stmt_init();
            $stmt->prepare($sql);
            $nombre = $_REQUEST['nombre'];
            $posicion = $_REQUEST['posicion'];
            $dni = $_REQUEST['DNI'];
            $nacimiento = $_REQUEST['fecha'];
            $sueldo = $_REQUEST['sueldo'];
            $dorsal = $_REQUEST['dorsal'];
            $stmt->bind_param('ssssdis',$nombre, $posicion, $dni, $nacimiento, $sueldo, $dorsal, $dni);
            $stmt->execute();
            $con->close();
    
    
    
    } catch (\Throwable $th) {
        // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
        switch ($th->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado: " . $th->getMessage();
        }
        // echo mysqli_connect_errno();
        // echo mysqli_connect_error();
        echo "Error de los datos de conexion";
        // mysqli_close($con) para cerrar la conexion
        $con->close();
    }
    }
        //-------------------------------------------------------------------------------------------------------

  //--------------------------BUSCAR POR DNI------------------------------------------------------------
        function buscarPorDNI($frase){
            $con = new mysqli();   //Creamos la conexion
            $con->connect(IP,USER,PASSWORD,'jugadores');
            $sql = 'select dni from jugadores';
            $result = mysqli_query($con, $sql);

            $arraydni = array();
            while ($array = mysqli_fetch_assoc($result)){
                foreach ($array as $key => $value) {
                    if (str_contains($value, $frase)) {
                    array_push($arraydni, $value);
                   
                    }
                }
            }
            if (count($arraydni) == 0){
                echo 'No se ha encontrado ningun jugador con ese DNI';
                $con->close();
                exit();
            }
           

            //AHORA HACEMOS LA BUSQUEDA POR DNI

            try {
                $dniList = "'" . implode("','", $arraydni) . "'";
                $sql = 'select * from jugadores where dni in (' . $dniList . ')';
                $result = mysqli_query($con, $sql);

            
                echo '<table><tr><th>Nombre</th><th>Posición</th><th>DNI</th><th>F_Nacimiemto</th><th>Sueldo</th><th>Dorsal</th><tr>';
            
                while ($array = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    $nombre = '';
                    $posicion = '';
                    $dni = '';
                    $nacimiento = '';
                    $sueldo = 0;
                    $dorsal = 0;
                    foreach ($array as $key => $value) {
                        echo '<td>'.$value.'</td>';
                        if ($key == 'nombre') $nombre = $value;
                        if ($key == 'posicion') $posicion = $value;
                        if ($key == 'dni') $dni = $value;
                        if ($key == 'nacimiento') $fecha = $value;
                        if ($key == 'sueldo') $sueldo = $value;
                        if ($key == 'dorsal') $dorsal = $value;
                    }
                    echo '<td><form action="./modificar.php" method="get"><input name = "modificar" type="submit" value="Modificar"></td>';
                    echo '<input type="hidden" name="nombre" value="' . $nombre . '">';
                    echo '<input type="hidden" name="posicion" value="' . $posicion . '">';
                    echo '<input type="hidden" name="DNI" value="' . $dni . '">';
                    echo '<input type="hidden" name="fecha" value="' . $fecha . '">';
                    echo '<input type="hidden" name="sueldo" value="' . $sueldo . '">';
                    echo '<input type="hidden" name="dorsal" value="' . $dorsal . '">';
                    echo '<td><input name = "eliminar" type="submit" value="Eliminar"></td></form>';
                    echo '</tr>';
                  }
            
               echo '</table>';
            
            
            } catch (\Throwable $th) {
            // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
            switch ($th->getCode()){
                case 0:
                    echo "No encuentra todos los parámetros de la secuencia";
                    break;
                case 2002:
                    echo "La IP de acceso a la BD es incorrecta";
                    break;
                case 1045:
                    echo "Usuario o contraseña incorrectos";
                    break;
                case 1049:
                    echo "Error al conectarse a la base de datos indicada";
                    break;
                case 1146:
                    echo "Error al encontrar la tabla indicada";
                    break;
                case 1064:
                    echo "No se han indicado los valores a insertar en la BD";
                    break;
                default:
                    echo "Error no identificado: " . $th->getMessage();
            }
            
            
            $con->close();
            }
            
            
            }

                //-------------------------------------------------------------------------------------------------------

?>
