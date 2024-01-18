<?php
//Find all cita

class CitaDAO
{


    public static function findAll(){
        $sql = "SELECT * FROM cita";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_citas = array();
        while ($cita = $result->fetchObject()) {
            $cita = new Cita(
                $cita->id,
                $cita->especialista,
                $cita->motivo,
                $cita->fecha,
                $cita->activo,
                $cita->paciente

            );
            array_push($array_citas, $cita);

        }
        return $array_citas;
    }

    public static function findByID($id) {
        $sql = "SELECT * FROM cita WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $cita = $result->fetchObject();
            $cita = new Cita(
                $cita->id,
                $cita->especialista,
                $cita->motivo,
                $cita->fecha,
                $cita->activo,
                $cita->paciente
            );
            return $cita;
        } else {
            return null;
        }
    }

    public static function insert($cita) {
        $sql = "INSERT INTO cita (especialista, motivo, fecha, activo, paciente) VALUES (?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array(
          
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->activo,
            $cita->paciente
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($cita){
        $sql = "UPDATE cita SET especialista=?, motivo=?, fecha=?, paciente=? WHERE id=?";
        $parametros = array(
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->paciente,
            $cita->id
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($cita) {
        $sql = "UPDATE cita SET activo=0 WHERE id=?";
        $parametros = array(
            $cita->id
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function findByPaciente($paciente) {
        $sql = "SELECT * FROM cita WHERE paciente = ? ORDER BY fecha";
        $parametros = array($paciente->codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_citas = array();
        while ($cita = $result->fetchObject()) {
            $cita = new Cita(
                $cita->id,
                $cita->especialista,
                $cita->motivo,
                $cita->fecha,
                $cita->activo,
                $cita->paciente

            );
            array_push($array_citas, $cita);

        }
        return $array_citas;
    }


}