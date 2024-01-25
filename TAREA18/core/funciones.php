<?php
//FUNCION CARGAR SCRIPT
function cargarScript(){
    $con = new mysqli(); 

try {

        $con->connect(IP, USER, PASS);
        $script = file_get_contents('./config/script.sql');
        $con->multi_query($script);


        //Parte de codigo para comprobar si hay algun error en el Script
        do {
                $con->store_result();
                if (!$con->next_result()) {
                        break;
                }
        } while (true);
        
        $con->close();
        
        echo 'Script cargado correctamente.';
       echo  '<p><a  href="./">Volver</a></p>';
        
        
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

//COMPRUEBA SI EXISTE A BASE DE DATOS
function existeBD(){
    $DSN = 'mysql:host='.IP.';dbname='.BBDD;
    try {
        $con = new PDO($DSN,USER,PASS);
        return true;
    } catch (PDOException $e) {
        switch ($e->getCode()) {
            case 1045:
            echo 'Error acceso a la base datos <br>';
                break;
            case 1049:
                echo 'Conexión correcta. No existe la base de datos. <br>';
                break;
            default:
                echo $e->getMessage();
                echo $e->getCode();
                break;
        }
        return false;
    } finally{
        unset($con);
    }
}


function textoVacio($name)
{
    if (empty($_REQUEST[$name]))
        return true;
    else
        return false;
}

//INSERTAR COOKIE
function insertarCookie($id)
{

    //Si no existe la cookie la creamos
    if (!isset($_COOKIE['usuario'])) {
        setcookie('usuario', $id, time() + 3600 * 24);

    }

    //Si existe la cookie la borramos y la creamos
    if (isset($_COOKIE['usuario'])) {

        setcookie('usuario', $id, time() - 3600 * 24);
        setcookie('usuario', $id, time() + 3600 * 24);
    }
}




?>