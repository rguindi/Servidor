<?
require_once './config/config.php';

print_r(UserDAO::findAll());
print_r(UserDAO::findById(2));

USERDAO::insert(new User('2','pepe',sha1('pepe'),'usuario','2024-01-11'));
