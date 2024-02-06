<?php

require('./dao/PalabraDAO.php');


class PalabrasController extends Base
{

    public static function palabras()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) == 2 && count($filtros) == 0) {   //con 3 no tiene nada detras

                    $datos = PalabraDAO::findByAll();
                } else if (count($recursos) == 2 && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();


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
        $permitimos = array('num_letras');
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response('HTTP/1.1 400 No se permite el filtro ' . $key);
            }
        }
        return PalabraDAO::findByFiltros($filtros);


    }

}

?>