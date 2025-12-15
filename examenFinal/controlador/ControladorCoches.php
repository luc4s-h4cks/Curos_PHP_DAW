<?php

include_once '../controlador/ConexionTaller.php';
include_once '../modelo/Coche.php';

class ControladorCoches {

    public static function getCochesCliente($dni) {
        try {
            $cones = new ConexionTaller();
            $resul = $cones->query("select * from coche where dni_cliente='$dni'");
            $coches = array();
            while ($c = $resul->fetchObject()) {
                array_push($coches, new Coche($c->matricula, $c->marca, $c->modelo, $c->km, $c->foto, $c->dni_cliente));
            }
            return $coches;
        } catch (Exception $ex) {
            
        }
    }

    public static function getCoche($mat) {
        try {
            $cones = new ConexionTaller();
            $resul = $cones->query("select * from coche where matricula='$mat'");

            $c = $resul->fetchObject();
            return new Coche($c->matricula, $c->marca, $c->modelo, $c->km, $c->foto, $c->dni_cliente);
        } catch (Exception $ex) {
            
        }
    }

    public static function updateCoche($coche) {
        try {
            $conex = new ConexionTaller();
            $stmt = $conex->prepare("update coche set marca=?, modelo=?, km=?, foto=?, dni_cliente=? where matricula=?");
            $matricula = $coche->matricula;
            $marca = $coche->marca;
            $modelo = $coche->modelo;
            $km = $coche->km;
            $foto = $coche->foto;
            $cliente = $coche->cliente;
            $stmt->bindParam(1, $marca);
            $stmt->bindParam(2, $modelo);
            $stmt->bindParam(3, $km);
            $stmt->bindParam(4, $foto);
            $stmt->bindParam(5, $cliente);
            $stmt->bindParam(6, $matricula);
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

    public static function insertCoche($coche) {
        try {
            $conex = new ConexionTaller();
            $stmt = $conex->prepare("insert into coche values(?,?,?,?,?,?)");
            $matricula = $coche->matricula;
            $marca = $coche->marca;
            $modelo = $coche->modelo;
            $km = $coche->km;
            $foto = $coche->foto;
            $cliente = $coche->cliente;
            $stmt->bindParam(1, $matricula);
            $stmt->bindParam(2, $marca);
            $stmt->bindParam(3, $modelo);
            $stmt->bindParam(4, $km);
            $stmt->bindParam(5, $foto);
            $stmt->bindParam(6, $cliente);
            
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
