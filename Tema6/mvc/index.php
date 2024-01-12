<?php
require_once './config/config.php';

print_r(UserDAO::findAll());
print_r(UserDAO::findById(2));
echo '<br>';    

USERDAO::insert(new User('2',sha1('pepe'),'pepe','2024-01-11','usuario'));

// ?>