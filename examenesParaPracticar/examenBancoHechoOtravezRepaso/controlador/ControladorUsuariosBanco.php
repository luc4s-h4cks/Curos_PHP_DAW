<?php

include_once '../controlador/ConexionBanco2.php';
include_once '../modelo/UsuarioBanco.php';

class ControladorUsuariosBanco {

    public static function verificarLogin($dni, $pass) {
        try {
            $conex = new ConexionBanco2();
            $stmt = $conex->prepare("select * from usuarios where DNI=? and clave=?");
            $stmt->bind_param("ss", $dni, $pass);
            $stmt->execute();
            $resul = $stmt->get_result();
            if ($resul->num_rows) {
                $usu = $resul->fetch_object();
                return new UsuarioBanco($usu->Nombre, $usu->Direccion, $usu->Telefono, $usu->DNI, $usu->clave, $usu->intentos, $usu->bloqueado);
            } else {
                return null;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function getUsuario($dni) {
        try {
            $conex = new ConexionBanco2();
            $stmt = $conex->prepare("select * from usuarios where DNI=?");
            $stmt->bind_param("s", $dni);
            $stmt->execute();
            $resul = $stmt->get_result();
            if ($resul->num_rows) {
                $usu = $resul->fetch_object();
                return new UsuarioBanco($usu->Nombre, $usu->Direccion, $usu->Telefono, $usu->DNI, $usu->clave, $usu->intentos, $usu->bloqueado);
            } else {
                return null;
            }
        } catch (Exception $ex) {
            
        }
    }
}
