<?php

// Pasos para la instalación de un servidor mysql

// 1. Instalación de mysql-server

// sudo apt-get install mysql-server
// Si sale mensaje del kernel, clic en 'ok' y reiniciamos todos los servicios, no siempre sale
//sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
// en bind-address y mysql-bind-addres ponmos 0.0.0.0 para poder acceder desde cualquier ip



// 2. Le cambiamos la contraseña a root con: sudo mysqladmin -u root password raul     (desde consola linux)
// Podemos entrar con sudo mysql -v

// 3. Después de entrar, creamos un usuario con:
    // create user 'raul'@'%' identified by 'raul';
// Con el % entramos desde todas las direcciones

//service mysql restart            y apache2 por si acaso

    //create database prueba;
    //use prueba
 
// 4. Podemos ver los usuarios creados con:
// select host, user from mysql.user;
// Le damos todos los permisos al usuario que acabamos de crear:
// grant all privileges on *.* to 'raul'@'%' with grant option;

// 5 Accedemos a un usuario con:
// FORMA DE ACCESO -> mysql -h 192.168.1.134 -u raul -p
// Nos pedirá la contraseña del usuario y entramos al usuario


// 7. Comprobamos que con show databases no solo vemos las tablas con metadatos
// sino también las tablas mysql y sys


// 8. Para realizar la conexion desde el programa, hay que instalar
// sudo apt-get install php-mysql
// Si sale mensaje del kernel, clic en 'ok' y reiniciamos todos los servicios, no siempre sale
// una vez instalado, hay que reiniciar apache

// Probar errores para conocer numeros a tratar posteriormente

// desde comandos;
// CREATE TABLE alumnos (
//     id SMALLINT PRIMARY KEY AUTO_INCREMENT,
//     nombre VARCHAR(50),
//     edad SMALLINT
// );




require("./confBD.php");

try {
    $con = mysqli_connect(IP,USER,PASSWORD,'prueba');
        echo "Conectado";
        // $rborra = 'miguel\',20);drop table alumnos';
        // CONSULTAS PREPARADAS: verifican que los datos que se insertan, son del tipo que deben ser
        $rnombre = 'Manuel';
        $redad = 30;
        // Con null también o el campo de la columna tamien autoincrementa
        $sql = "insert into alumnos(nombre,edad) values('".$rnombre."',".$redad.")";
        // En la consulta preparada, escribimos como ? cada uno de los atributos que tendrá la sentencia
        $sqlprepa = "insert into alumnos(nombre,edad) values(?,?)";
        // Creamos um statement, que incluye como primer parametro la conexion y como segundo la consulta preparada
        $stmt = mysqli_prepare($con,$sqlprepa);
        // Aquí esamos indicando que el primer parametro de la consulta que contiene el statement será un string 's'
        // y el segundo será un int 'i' , estos parametros los recogerá de la variable $rnombre el primero y $redad el segundo
        mysqli_stmt_bind_param($stmt,'si',$rnombre,$redad);
        // La consulta es ejecutada
        mysqli_stmt_execute($stmt);

        // Si la consulta no se lleva a cabo, nos muestra ese error
        // if(!mysqli_query($con,$sql))
        //     echo mysqli_errno($con);

    // siempre debemos de cerrar la conexión
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

echo "<br>";
$ruta = $_SERVER['SCRIPT_FILENAME'];
echo "<a href=http://".$_SERVER['SERVER_ADDR']."/vercontenido.php?contenido=".$ruta.">Ver Contenido</a>";



?>
