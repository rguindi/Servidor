<?php
$errores = [];
$apuesta = ApuestaDAO::findbyUser($_SESSION['usuario']->id);
$numeros = explode(',', $apuesta->numero);
$sorteo = SorteoDAO::findLast();
$sorteo = explode(',', $sorteo->numero_sorteo);
$aciertos = 0;
foreach ($numeros as $numero) {
    if (in_array($numero, $sorteo)) {
        $aciertos++;
    }

}

if (isset($_REQUEST['guardar'])) {
    if (isset($_REQUEST['numeros']) && count($_REQUEST['numeros']) == 5) {

        $numeros= implode(',', $_REQUEST['numeros']);
        ApuestaDAO::insert($_SESSION['usuario']->id, $numeros, date('Y-m-d H:i:s'));
        header('Location: index.php');
    } else {
        $errores['numeros'] = "Debes seleccionar 5 numeros";
    }



}
if (isset($_REQUEST['Modificar'])) {
    if (isset($_REQUEST['numeros']) && count($_REQUEST['numeros']) == 5) {
        $numeros= implode(',', $_REQUEST['numeros']);
        ApuestaDAO::update($apuesta->id, $_SESSION['usuario']->id, $numeros, date('Y-m-d H:i:s'));
        header('Location: index.php');
    } else {
        $errores['numeros'] = "Debes seleccionar 5 numeros";
    }
}






?>