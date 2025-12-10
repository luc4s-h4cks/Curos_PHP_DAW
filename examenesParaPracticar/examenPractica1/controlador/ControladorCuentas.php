<?php

include_once '../controlador/ConexionBanco.php';
include_once '../modelo/Cuenta.php';

class ControladorCuentas {

    public static function getCuentasUsuario($dni) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from cuentas where dni_cuenta='$dni'");
            $cuentas = array();
            while ($cuenta = $resul->fetch_object()) {
                array_push($cuentas, new Cuenta($cuenta->iban, $cuenta->saldo, $cuenta->dni_cuenta));
            }
            return $cuentas;
        } catch (Exception $ex) {
            
        }
    }

    public static function getCuentaIban($iban) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from cuentas where iban='$iban'");
            $cu = $resul->fetch_object();
            return new Cuenta($cu->iban, $cu->saldo, $cu->dni_cuenta);
        } catch (Exception $ex) {
            
        }
    }

    public static function getAll() {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from cuentas");
            $cuentas = array();
            while ($cuenta = $resul->fetch_object()) {
                array_push($cuentas, new Cuenta($cuenta->iban, $cuenta->saldo, $cuenta->dni_cuenta));
            }
            return $cuentas;
        } catch (Exception $ex) {
            
        }
    }

    public static function pagar($iban, $cantidad) {
        try {
            $conex = new ConexionBanco();
            $conex->autocommit(false);
            $conex->execute_query("update cuentas set saldo= saldo-$cantidad where iban='$iban'");
            if ($conex->affected_rows) {
                $conex->commit();
                return true;
            } else {
                $conex->rollback();
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function agregar($iban, $cantidad) {
        try {
            $conex = new ConexionBanco();
            $conex->autocommit(false);
            $conex->execute_query("update cuentas set saldo= saldo+$cantidad where iban='$iban'");
            if ($conex->affected_rows) {
                $conex->commit();
                return true;
            } else {
                $conex->rollback();
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
}
