<?php


require('./conexionBD.php');


//---------------------//LEER TABLA
function leerTabla(){
    $DSN = 'pgsql:host=' . IP . ';dbname=jugadores';
try {
    $con = new PDO($DSN, USER, PASSWORD);

    $sql = 'select * from jugadores';
    $result = $con->query($sql);

    echo '<table><tr><th>Nombre</th><th>Posición</th><th>DNI</th><th>F_Nacimiemto</th><th>Sueldo</th><th>Dorsal</th><tr>';

    while ($array = $result->fetch(PDO::FETCH_ASSOC)){
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


} catch (PDOException $th) {
// Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
switch ($th->getCode()){
    case 0:
        echo "No encuentra todos los parámetros de la secuencia. <br> Prueba a crear la base de datos.";
        echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear Tabla">  </form>';

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
                echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear Base de datos">  </form>';

        break;
        case '7':
            echo "La base de datos jugadores no existe. Crear.
            <br>";
            // Crear boton para cargar Script
            echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear la Base de Datos">  </form>';
            break;
       
    case 1146:
        echo "Error al encontrar la tabla indicada";
        //Crear boton para cargar Script
        echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear Tabla">  </form>';
        break;
    case 1064:
        echo "No se han indicado los valores a insertar en la BD";
        break;
        case '42P01':
            echo "Tabla no definida";
                    //Crear boton para cargar Script
        echo '<form action="" method="get"><input name = "crear" type="submit" value="Crear Tabla">  </form>';

            break;
    default:
        echo "Error no identificado: " . $th->getMessage();
        echo 'Codigo: ' .$th->getCode();
        
}





}
finally{
    unset($con);
}


}
//-------------------------------------------------------------------------------------------------------

                    //FUNCION PARA CARGAR EL SCRIPT
function cargarScript(){

    $DSN = 'pgsql:host=' . IP . ';dbname=postgres';  //conectamos una base de datos existente
    try {

        $con = new PDO($DSN, USER, PASSWORD);
        $sql = 'create database jugadores';
        $result = $con->exec($sql);
        //Ejecuta el script
        $DSN = 'pgsql:host=' . IP . ';dbname=jugadores';//conectamos a la base de datos creada
        $con = new PDO($DSN, USER, PASSWORD);
        $script = file_get_contents('./jugadores.sql');
        $result = $con-> exec($script);


      echo 'Script ejecutado. Pruebe su lectura.';
        
    } catch (PDOException $th) {

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
        
    }finally{
        unset($con);
    }
}
    //-------------------------------------------------------------------------------------------------------
    

    //--------------------------ELIMINAR REGISTRO------------------------------------------------------------


    function eliminarRegistro($dni){
        $DSN = 'pgsql:host=' . IP . ';dbname=jugadores';
        try {
            $con = new PDO($DSN, USER, PASSWORD);   //Creamos la conexion
            $sql = "delete from jugadores where dni = ?";
            $stmt= $con->prepare($sql);
            $stmt->execute(array($dni));
            echo "Registro eliminado";

        } catch (PDOExceptio $th) {
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
        }finally{
            unset($con);
        }
    }
    
    //-------------------------------------------------------------------------------------------------------


//--------------------------AÑADIR REGISTRO------------------------------------------------------------
function addRegistro(){
    $DSN = 'pgsql:host=' . IP . ';dbname=jugadores';

try {
         $con = new PDO($DSN, USER, PASSWORD);
        //Creamos sentencia insert
        $sql = "INSERT INTO jugadores (nombre, posicion, dni, nacimiento, sueldo, dorsal) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt= $con->prepare($sql);
        $nombre = $_REQUEST['nombre'];
        $posicion = $_REQUEST['posicion'];
        $dni = $_REQUEST['DNI'];
        $nacimiento = $_REQUEST['fecha'];
        $sueldo = $_REQUEST['sueldo'];
        $dorsal = $_REQUEST['dorsal'];
        $stmt->execute (array($nombre, $posicion, $dni, $nacimiento, $sueldo, $dorsal));



} catch (PDOException $th) {
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
  
}finally{
    unset($con);
}
}
    //-------------------------------------------------------------------------------------------------------


    //--------------------------MODIFICAR REGISTRO------------------------------------------------------------
function modificaRegistro(){
    $DSN = 'pgsql:host=' . IP . ';dbname=jugadores';

    
    try {
    
              $con = new PDO($DSN, USER, PASSWORD);
            //Creamos sentencia insert
            $sql = "UPDATE jugadores set nombre = ?, posicion = ?, dni = ?, nacimiento = ?, sueldo = ?, dorsal= ? where dni = ?";
            $stmt = $con->prepare($sql);
            $nombre = $_REQUEST['nombre'];
            $posicion = $_REQUEST['posicion'];
            $dni = $_REQUEST['DNI'];
            $nacimiento = $_REQUEST['fecha'];
            $sueldo = $_REQUEST['sueldo'];
            $dorsal = $_REQUEST['dorsal'];
            $stmt->execute(array($nombre, $posicion, $dni, $nacimiento, $sueldo, $dorsal, $dni));

    
    } catch (PDOException $th) {
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
   
    }finally{
        unset($con);
    }
    }
        //-------------------------------------------------------------------------------------------------------

  //--------------------------BUSCAR POR DNI------------------------------------------------------------
        function buscarPorDNI($frase){
            $DSN = 'pgsql:host=' . IP . ';dbname=jugadores';
            $con = new PDO($DSN, USER, PASSWORD);   //Creamos la conexion
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
            
                while ($array = $result->fetch(PDO::FETCH_ASSOC)){
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
            
            
            } catch (PDOException $th) {
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
            
   
            }finally{
                unset($con);
            }
            
            
            }

                //-------------------------------------------------------------------------------------------------------

?>
