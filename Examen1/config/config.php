<?php

//Constantes para utilizar en toda la aplicación

define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');
define('VIEW','./views/');
define('CON','./controllers/');
define('URI', 'http://192.168.7.204/Examen1/api/index/');

//Core
require ('./core/funciones.php');

//Base de datos
require ("./config/confBD.php");

//DAO
require('./dao/FactoryBD.php');
require('./dao/UserDAO.php');
require('./dao/Curl.php');


//models
require('./models/user.php');

?>