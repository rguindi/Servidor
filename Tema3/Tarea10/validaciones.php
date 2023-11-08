<?php

function modificar()
{
    if (isset($_REQUEST["modificar"]))
        return true;
    else
        return false;
}

function eliminar()
{
    if (isset($_REQUEST["eliminar"]))
        return true;
    else
        return false;
}

function añadir()
{
    if (isset($_REQUEST["añadir"]))
        return true;
    else
        return false;
}

function volver()
{
    if (isset($_REQUEST["volver"]))
        return true;
    else
        return false;
}

function guardar()
{
    if (isset($_REQUEST["guardar"]))
        return true;
    else
        return false;
}




?>