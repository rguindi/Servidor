<?php
require_once "./modelo/palabras.php";
require_once "./dao/FactoryBD.php";

class PalabraDAO{
    
    public static function findByAll(){
        $sql="SELECT * FROM palabras";
        $stmt=FactoryBD::realizaConsulta($sql, array());
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function findByFiltros($filtros){
        $num = count($filtros);
        $parametros = array();
        $sql="SELECT * FROM palabras WHERE ";
         foreach ($filtros as $key => $value) {
             if ($key == 'num_letras') {
                 $sql .= $key." > ?";
                 $valor = $value;
                 array_push($parametros, $valor);
             }
                if ($num == 2) {  //si hay dos filtros añade el AND, si no, no
                    $num--;
                    $sql .= " AND ";
                }
            }
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            return $result->fetchAll(PDO::FETCH_ASSOC);

        }
    }

?>