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

    public static function hacerTranferencia($ibanOg, $ibanDes, $cantidad, $comision, $ibanBanco) {
        try {
            $conex = new ConexionBanco();
            $conex->autocommit(false);
            $total = $cantidad + $comision;
            $conex->execute_query("update cuentas set saldo= saldo-$total where iban='$ibanOg'");
            if ($conex->affected_rows) {
                $conex->execute_query("update cuentas set saldo= saldo+$cantidad where iban='$ibanDes'");
                if ($conex->affected_rows) {
                    $conex->execute_query("update cuentas set saldo= saldo+$comision where iban='$ibanBanco'");
                    if ($conex->affected_rows) {
                        $conex->commit();
                        return true;
                    } else {
                        $conex->rollback();
                        return false;
                    }
                } else {
                    $conex->rollback();
                    return false;
                }
            } else {
                $conex->rollback();
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
    
    public static function getIbanBanco() {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select iban from cuentas join usuarios where DNI=dni_cuenta and Direccion='Banco'");
            $bank = $resul->fetch_object();
            $ibanBanco = $bank->iban;
            return $ibanBanco;
        } catch (Exception $ex) {
            
        }
    }
}
