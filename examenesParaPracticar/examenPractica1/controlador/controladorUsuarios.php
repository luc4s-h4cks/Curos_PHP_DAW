<?php

include_once '../controlador/ConexionBanco.php';
include_once '../modelo/Usuario.php';

class ControladorUsuarios {

    public static function getUsuario($dni) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from usuarios where DNI='$dni'");
            $usu = $resul->fetch_object();
            return new Usuario($usu->Nombre, $usu->Direccion, $usu->Telefono, $usu->DNI, $usu->clave, $usu->intentos, $usu->bloqueado);
        } catch (Exception $ex) {
            
        }
    }

    public static function estaBloqueado($dni) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from usuarios where DNI='$dni'");
            $usu = $resul->fetch_object();
            return $usu->bloqueado;
        } catch (Exception $ex) {
            
        }
    }

    public static function getIntentos($dni) {
        try {
            $conex = new ConexionBanco();
            $resul = $conex->execute_query("select * from usuarios where DNI='$dni'");
            $usu = $resul->fetch_object();

            return $usu->intentos;
        } catch (Exception $ex) {
            
        }
    }

    public static function loginUsuario($dni) {
        try {
            $conex = new ConexionBanco();
            $stmt = $conex->prepare("select * from usuarios where DNI=?");
            $stmt->bind_param("s", $dni);
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

    public static function restarIntentos($dni) {
        try {
            $conex = new ConexionBanco();
            if (self::getIntentos($dni) > 0) {
                $conex->execute_query("update usuarios set intentos = intentos-1 where DNI='$dni'");
            } else {
                $conex->execute_query("update usuarios set bloqueado = 1 where DNI='$dni'");
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function restablecerIntentos($dni) {
        try {
            $conex = new ConexionBanco();
            if (self::getIntentos($dni) > 0) {
                $conex->execute_query("update usuarios set intentos = 3 where DNI='$dni'");
            }
        } catch (Exception $ex) {
            
        }
    }
}
