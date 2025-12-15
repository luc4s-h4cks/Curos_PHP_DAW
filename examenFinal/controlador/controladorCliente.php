<?php

include_once '../controlador/ConexionTaller.php';
include_once '../modelo/ClienteTaller.php';

class ControladorCliente {

    public static function getCliente($dni) {
        try {
            $conex = new ConexionTaller();
            $resul = $conex->query("select * from cliente where dni='$dni'");
            $c = $resul->fetchObject();
            return new ClienteTaller($c->dni, $c->nombrecompleto, $c->direccion, $c->telf);
        } catch (Exception $ex) {
            
        }
    }

    public static function updateCliente($cliente, $oldDni) {
        try {
            $conex = new ConexionTaller();
            $stmt = $conex->prepare("update cliente set dni=?, nombrecompleto=?, direccion=?, telf=? where dni=?");
            $dni = $cliente->dni;
            $nombre = $cliente->nombre;
            $direccion = $cliente->direccion;
            $telf = $cliente->telefono;

            $stmt->bindParam(1, $dni);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $direccion);
            $stmt->bindParam(4, $telf);
            $stmt->bindParam(5, $oldDni);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
