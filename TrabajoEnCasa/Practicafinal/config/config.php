<?php

//Constantes para utilizar en toda la aplicación

define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');
define('VIEW','./views/');
define('CON','./controllers/');

//Core
require ('./core/funciones.php');

//Base de datos
require ("./config/confBD.php");

//DAO
require('./dao/FactoryBD.php');
require('./dao/UserDAO.php');

//models
require('./models/user.php');
?>