<?php

require("./config/configBD.php");
class FactoryBD{
    public static function realizaConsulta($sql,$arrayParametros){
        try {
            $con = new PDO('mysql:host='.IP.';dbname='.BD,USER,PASSWORD);
            $stmt = $con->prepare($sql);
            $stmt->execute($arrayParametros);

        } catch (PDOException $e) {
            // $stmt = null;
            Base::response('HTTP/1.0 500 Error interno del servidor',$e->getMessage());
            unset($con);
        }
        return $stmt;
    }
}

?>