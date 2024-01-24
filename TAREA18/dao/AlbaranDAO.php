<?php
class AlbaranDAO{

    public static function findByAll(){
        $sql="SELECT * FROM albaran WHERE activo=1";
        $stmt=FactoryBD::realizaConsulta($sql, array());
        $albaranes=array();
        while($fila=$stmt->fetch(PDO::FETCH_OBJ)){
            $albaranes[]=new Albaran($fila->id,$fila->cod_producto,$fila->cantidad,$fila->fecha,$fila->usuario,$fila->activo);
        }
        return $albaranes;
    }

    public static function findById($id){
        $sql="SELECT * FROM albaran WHERE id=? AND activo=1";
        $stmt=FactoryBD::realizaConsulta($sql, array($id));
        if($stmt->rowCount()==1){
            $fila=$stmt->fetch(PDO::FETCH_OBJ);
            $albaran=new Albaran($fila->id,$fila->cod_producto,$fila->cantidad,$fila->fecha,$fila->usuario,$fila->activo);
            return $albaran;
        }else{
            return null;
        }
    }

    public static function insert($albaran){
        $sql="INSERT INTO albaran (cod_producto,cantidad,fecha,usuario,activo) VALUES (?,?,?,?,?)";
        $stmt=FactoryBD::realizaConsulta($sql, array($albaran->cod_producto,$albaran->cantidad,$albaran->fecha,$albaran->usuario,$albaran->activo));
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public static function update($albaran){
        $sql="UPDATE albaran SET cod_producto=?,cantidad=?,fecha=?,usuario=?,activo=? WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($albaran->cod_producto,$albaran->cantidad,$albaran->fecha,$albaran->usuario,$albaran->activo,$albaran->id));
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public static function delete($albaran){
        $sql="UPDATE albaran SET activo=0 WHERE id=?";
        $stmt=FactoryBD::realizaConsulta($sql, array($albaran->id));
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    

}