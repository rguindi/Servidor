<?php
define('IP','192.168.1.136');
define('USER','raul');                  //Este es nuestro usuario de acceso a la base de datos
define('PASSWORD','raul');


define('USUARIONORMAL','user');                        //Creo un usuario registrado que podrá modificar datos
define('PASSWORDUSER',hash('sha256', 'user'));


define('USUARIOADMINISTRADOR','admin');                        //Creo un usuario administrador que podrá modificar y eliminar registros.
define('PASSWORDADMIN',hash('sha256', 'admin'));


?>