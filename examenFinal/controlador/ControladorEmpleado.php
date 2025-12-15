<?php

include_once '../controlador/ConexionTaller.php';
include_once '../modelo/EmpleadoTaller.php';

class ControladorEmpleado {

    public static function login($cod) {
        try {
            $conex = new ConexionTaller();
            $resul = $conex->query("select * from empleado where codigo=$cod ");
            
            
            if($em = $resul->fetchObject()){
                return new Empleado_Taller($em->codigo, $em->clave, $em->nombrecompleto, $em->telf, $em->rol);
            }else{
                return null;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public static function getMecanicos() {
        try {
            $conex = new ConexionTaller();
            $resul = $conex->query("select * from empleado where rol='mecanico'");
            $mecas = array();
            while ($e = $resul->fetchObject()){
                array_push($mecas, new Empleado_Taller($e->codigo, $e->clave, $e->nombrecompleto, $e->telf, $e->rol));
            }
            return $mecas;
        } catch (Exception $ex) {
            
        }
    }
}
