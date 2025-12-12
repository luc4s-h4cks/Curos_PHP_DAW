<?php
include_once '../controlador/ConexionBanco2.php';
include_once '../modelo/TrasnferenciaBanco.php';
class ControladorTransferenciasBanco {

    public static function getHistorialCuenta($iban) {
        try {
            $conex = new ConexionBanco2(); 
            $resul = $conex->execute_query("select * from transferencias where iban_origen='$iban' or iban_destino='$iban'");
            $trs = array();
            while($tr = $resul->fetch_object()){
                array_push($trs, new TransfereciaBanco($tr->iban_origen, $tr->iban_destino, $tr->fecha, $tr->cantidad));
            }
            return $trs;
        } catch (Exception $ex) {
            
        }
    }
}
