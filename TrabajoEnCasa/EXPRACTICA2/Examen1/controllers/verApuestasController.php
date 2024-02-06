<?php
$apuestas = ApuestaDAO::findAll();
if (isset($_REQUEST['Generar'])) {
   $sorteo = getSorteo();
   $array = json_decode($sorteo, true);
    $array = implode(',', $array);

   if (SorteoDAO::insert($array, date("Y-m-d H:i:s"))) {
       echo "Sorteo guardado en la base de datos";
   } else {
       echo "Error al insertar sorteo";
   }
}
$sorteo = SorteoDAO::findLast();


?>