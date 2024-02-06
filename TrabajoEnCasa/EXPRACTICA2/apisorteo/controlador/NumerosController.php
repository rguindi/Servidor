<?php

class NumerosController extends Base
{

    public static function numeros()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                 if (count($recursos) == 2 && count($filtros) > 0) {
                    $datos = self::buscaConFiltros();
                   
                } 
                $datos = json_encode($datos);
                self::response('HTTP/1.1 200 OK', $datos);

                break;
           
        }

    }
    static function buscaConFiltros()
    {
        //comprobar si el nombre del filtro esta permitido
        $permitimos = array('min', 'max');
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response('HTTP/1.1 400 No se permite el filtro ' . $key);
            }
        }

        return self::arrayAleatorios($filtros['min'], $filtros['max']);

    }

    static function arrayAleatorios($min, $max)
    {
        $numeros = array();
        for ($i = 0; $i < 5; $i++) {
            $numeros[$i] = rand($min, $max);
        }
        return $numeros;
    }


}

?>