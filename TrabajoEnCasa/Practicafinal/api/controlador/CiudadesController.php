<?php

require('./dao/CiudadDAO.php');


class CiudadesController extends Base
{

    public static function ciudades()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) == 2 && count($filtros) == 0) {   //con 3 no tiene nada detras

                    $datos = CiudadDAO::findByAll();
                } else if (count($recursos) == 2 && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();


                } else if (count($recursos) == 3) {
                    $datos = CiudadDAO::findById($recursos[2]);
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.1 200 OK', $datos);

                break;
           
            default:
                self::response('HTTP/1.1 400 No permite el metodo utilizado');
                break;
        }

    }
    static function buscaConFiltros()
    {
        //comprobar si el nombre del filtro esta permitido
        $permitimos = array('nombre');
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response('HTTP/1.1 400 No se permite el filtro ' . $key);
            }
        }
        return CiudadDAO::findByFiltros($filtros);


    }

   
}

?>