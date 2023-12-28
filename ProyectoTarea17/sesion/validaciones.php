<?php
require_once '../BBDD/funciones.php';
function entrar()
{
    if (isset($_REQUEST['Entrar']))
        return true;
    else
        return false;
}

function textoVacio($name)
{
    if (empty($_REQUEST[$name]))
        return true;
    else
        return false;
}

function registrar()
{
    if (isset($_REQUEST['registro']))
        return true;
    return false;
}
function borrar()
{
    if (!isset($_REQUEST['Borrar']))
        return true;
    return false;
}

function recuerda($name)
{
    if (registrar() && !empty($_REQUEST[$name]))
        echo $_REQUEST[$name];
    if (isset($_REQUEST['Borrar']))
        echo '';
}

function validarPass($pass)
{
    $exp = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'; //mínimo 8 caracteres, al menos una mayúscula, al menos una minúscula y al menos un número.
    if (preg_match($exp, $pass))
        return true;
    return false;

}

function repetirPass($pass, $repitepass)
{
    if ($_REQUEST['pass'] === $_REQUEST['repitepass'])
        return true;
    return false;

}



function validaFormulario(&$errores)
{

    if (textoVacio("user")) $errores['user'] = "El usuario no puede estar vacío.";
    if (!textoVacio("user")&& existeUser($_REQUEST['user'])) $errores['existeuser'] = "Este usuario ya existe. Elija otro nombre de usuario";
    if (textoVacio("pass")) $errores['pass'] = "La contraseña no puede estar vacía.";
    if (!textoVacio("pass")&& !repetirPass($_REQUEST['pass'], $_REQUEST['repitepass'])) $errores['coincidepass'] = "Las contraseñas deben coincidir.";
    if (!textoVacio("pass")&& !validarPass($_REQUEST['pass']))$errores['validapass'] = "La contraseñas debe tener mínimo 8 caracteres, al menos una mayúscula, al menos una minúscula y al menos un número.";
    if (textoVacio("repitepass")) $errores['repitepass'] = "Debe repetir la contraseña.";
    if (textoVacio("email"))$errores['email'] = "El email no puede estar vacío.";
    if (textoVacio("fecha"))$errores['fecha'] = "La fecha no puede estar vacía.";

    if (count($errores) == 0)
        return true;
    return false;
}

function errores($errores, $name)
{
    if (isset($errores[$name]))
        echo $errores[$name];


}

function validaAlbaran(&$errores)
{
    if (textoVacio("producto")) $errores['producto'] = "Introduzda un numero de producto.";
    if (!textoVacio("producto") && !getProducto($_REQUEST['producto'])) $errores['productonoexiste'] = "No se ha encontrado ningún producto con ese identificador.";
    if (textoVacio("cantidad")) $errores['cantidad'] = "Introduzca una cantidad.";
    if (textoVacio("fecha")) $errores['fecha'] = "Introduzca una fecha.";
    if (count($errores) == 0)
        return true;
    return false;
}
function validaPedido(&$errores)
{
    if (textoVacio("producto")) $errores['producto'] = "Introduzda un numero de producto.";
    if (!textoVacio("producto") && !getProducto($_REQUEST['producto'])) $errores['productonoexiste'] = "No se ha encontrado ningún producto con ese identificador.";
    if (textoVacio("cantidad")) $errores['cantidad'] = "Introduzca una cantidad.";
    if (textoVacio("fecha")) $errores['fecha'] = "Introduzca una fecha.";
    if (textoVacio("total")) $errores['total'] = "Introduzca un total.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['total'])) $errores['totaltipo'] = "Introduzca un precio con dos decimales.";
    if (count($errores) == 0)
        return true;
    return false;
}
function validaProducto(&$errores)
{
    if (textoVacio("titulo")) $errores['titulo'] = "Introduzca un titulo.";
    if (textoVacio("descripcion")) $errores['descripcion'] = "Introduzca una descripcion.";
    if (textoVacio("precio")) $errores['precio'] = "Introduzca un precio.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['precio'])) $errores['preciotipo'] = "Introduzca un precio con dos decimales.";
    if (textoVacio("stock")) $errores['stock'] = "Introduzca un stock.";
    if (!filter_var($_REQUEST['stock'], FILTER_VALIDATE_INT)) $errores['errordetipostock'] = "Introduzca un número entero para el stock.";
    if (textoVacio("imagen")) $errores['imagen'] = "La imagen no puede estar vacia.";
    if (count($errores) == 0)
        return true;
    return false;
}
function validaSubirProducto(&$errores)
{
    if (textoVacio("titulo")) $errores['titulo'] = "Introduzca un titulo.";
    if (textoVacio("descripcion")) $errores['descripcion'] = "Introduzca una descripcion.";
    if (textoVacio("precio")) $errores['precio'] = "Introduzca un precio.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['precio'])) $errores['preciotipo'] = "Introduzca un precio con dos decimales.";
    if (textoVacio("stock")) $errores['stock'] = "Introduzca un stock.";
    if (!filter_var($_REQUEST['stock'], FILTER_VALIDATE_INT)) $errores['errordetipostock'] = "Introduzca un número entero para el stock.";
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] == UPLOAD_ERR_NO_FILE) $errores['imagen'] = "La imagen no puede estar vacia.";
    elseif (!preg_match('/\.jpg$/i', $_FILES['imagen']['name'])) {
        $errores['imagenjpg'] = "La imagen debe tener una extensión JPG.";}
    if (count($errores) == 0)
        return true;
    return false;
}
?>