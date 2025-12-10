<?php

include_once '../controlador/ConexionBanco.php';
include_once '../modelo/Trasferencia.php';

class ControladorTrasferencias {

    public static function getTrasferenciasUsuario($iban) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from transferencias where iban_origen='$iban' or iban_destino='$iban'");
            $transferencias = array();
            while ($trans = $resul->fetch_object()) {
                array_push($transferencias, new Trasferencia($trans->iban_origen, $trans->iban_destino, $trans->fecha, $trans->cantidad));
            }
            return $transferencias;
        } catch (Exception $ex) {
            
        }
    }

    public static function crearTransferencia($trans) {
        try {
            $conex = new ConexionBanco();
            $conex->autocommit(false);
            $conex->execute_query("insert into transferencias values('$trans->iban_origen', '$trans->iban_destino', $trans->fecha, $trans->cantidad)");
            if ($conex->affected_rows) {
                $conex->commit();
                return true;
            } else {
                $conex->rollback();
                return false;
            }
        } catch (Exception $ex) {
            echo "Excepción: " . $ex->getMessage();
        }
    }
}
