<?php
require_once("Empresa.php");
require_once("EmpresaM.php");

$empresa=new Empresa('A345678','Juan Ferrero','Valencia');

print_r($empresa);
echo '<br>';
echo '<br>';
$empresa->setCif("A12345678");
$empresa->setNombre("Raul Ferrero Vicente");
print_r($empresa);

echo '<br>';
echo '<br>';
$empresaM = new EmpresaM('ASDFSAD','Pedro Ferrero','Valencia');
print_r($empresaM);
echo '<br>';
echo '<br>';
echo $empresaM->cif;  //Si no hubieera puesto el metodo magico __get() daria error
echo '<br>';
$empresaM->cif ="A12345678"; //Si no hubieera puesto el metodo magico __set() daria error
$empresaM->dfghcif ="A12345678"; //No existe el atributo, pero lo hemos controlado en el metodo magico __set()
echo '<br>';
print_r($empresaM);
echo '<br>';
echo '<br>';
echo $empresaM; //Si no hubieera puesto el metodo magico __toString() daria error
echo '<br>';

echo EmpresaM::saluda(); //Llamada a un metodo estatico con ::, y flecha para acceder a un metodo normal

echo '<br>';
echo '<br>';

echo EmpresaM::$contador; //Llamada a una variable estatica con ::
?>