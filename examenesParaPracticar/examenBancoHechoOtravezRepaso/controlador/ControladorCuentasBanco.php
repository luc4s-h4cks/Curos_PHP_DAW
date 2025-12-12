<?php

include_once '../modelo/CuentaBanco.php';
include_once '../controlador/ConexionBanco2.php';
include_once '../controlador/ConexionBanco2_PDO.php';

class ControladorCuentasBanco {

    public static function getCuentasUsuario($dni) {
        try {
            $conex = new ConexionBanco2();
            $resul = $conex->execute_query("select * from cuentas where dni_cuenta='$dni'");
            $cuentas = array();
            while ($c = $resul->fetch_object()) {
                array_push($cuentas, new CuentaBanco($c->iban, $c->saldo, $c->dni_cuenta));
            }
            return $cuentas;
        } catch (Exception $ex) {
            
        }
    }

    public static function getCuentasUsuarioPDO($dni) {
        try {
            $conex = new ConexionBanco2PDO();
            $resul = $conex->query("select * from cuentas where dni_cuenta='$dni'");
            $cuentas = array();
            while ($c = $resul->fetchObject()) {
                array_push($cuentas, new CuentaBanco($c->iban, $c->saldo, $c->dni_cuenta));
            }
            return $cuentas;
        } catch (Exception $ex) {
            
        }
    }

    public static function getCuentaIban($iban) {
        try {
            $conex = new ConexionBanco2();
            $resul = $conex->execute_query("select * from cuentas where iban='$iban'");
            $c = $resul->fetch_object();
            return new CuentaBanco($c->iban, $c->saldo, $c->dni_cuenta);
        } catch (Exception $ex) {
            
        }
    }

    public static function getAll() {
        try {
            $conex = new ConexionBanco2();
            $resul = $conex->execute_query("select * from cuentas");
            $cuentas = array();
            while ($c = $resul->fetch_object()) {
                array_push($cuentas, new CuentaBanco($c->iban, $c->saldo, $c->dni_cuenta));
            }
            return $cuentas;
        } catch (Exception $ex) {
            
        }
    }
}
