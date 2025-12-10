<?php

include_once '../controlador/ConexionBanco.php';
include_once '../modelo/Usuario.php';

class ControladorUsuarios {

    public static function loginUsuario($dni, $pass) {
        try {
            $conex = new ConexionBanco();
            $stmt = $conex->prepare("select * from usuarios where DNI=? and clave=?");
            $stmt->bind_param("ss", $dni, $pass);
            $stmt->execute();
            $resul = $stmt->get_result();
            if ($resul->num_rows) {
                $usu = $resul->fetch_object();
                return new Usuario($usu->Nombre, $usu->Direccion, $usu->Telefono, $usu->DNI, $usu->clave, $usu->intentos, $usu->bloqueado);
            } else {
                return null;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function getUsuario($dni) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from usuarios where DNI='$dni'");
            $usu = $resul->fetch_object();
            return new Usuario($usu->Nombre, $usu->Direccion, $usu->Telefono, $usu->DNI, $usu->clave, $usu->intentos, $usu->bloqueado);
        } catch (Exception $ex) {
            
        }
    }
}
