<?php

require('./dao/EstadisticaDAO.php');


class EstadisticasController extends Base
{

    public static function estadisticas()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) == 2 && count($filtros) == 0) { 

                    $datos = EstadisticaDAO::findByAll();
                }  else if (count($recursos) == 3) {
                    $datos = EstadisticaDAO::findByUser($recursos[2]);
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.1 200 OK', $datos);

                break;
                
            case 'POST':

                $datos = file_get_contents('php://input');
                $datos = json_decode($datos, true);   //true para que lo devuelva como array asociativo
                if (isset($datos['id_usuario']) && isset($datos['id_palabra'])&& isset($datos['resultado'])&& isset($datos['intentos'])&& isset($datos['fecha'])) {
                    $estadistica = new Estadisticas(null, $datos['id_usuario'], $datos['id_palabra'], $datos['resultado'], $datos['intentos'],$datos['fecha'] );
                    if (EstadisticaDAO::insert($estadistica)) {
                        $estadistica = EstadisticaDAO::findLastId();
                        $estadistica = json_encode($estadistica);
                        self::response('HTTP/1.1 201 OK, estadistica insertado correctamente', $estadistica);
                    }
                } else {
                    self::response('HTTP/1.1 400 No se han introducido todos los datos ');
                }


                break;
            
            default:
                self::response('HTTP/1.1 400 No permite el metodo utilizado');
                break;
        }

    }
   
}

?>