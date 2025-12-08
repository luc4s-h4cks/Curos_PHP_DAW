<?php

include_once '../controlador/ConexionJuegos.php';
include_once '../modelo/Aquiler.php';

class ControladorAlquiler {

    public static function crearAlquiler($alquiler) {

        try {
            $conex = new ConexionJuegos();
            $conex->autocommit(false);
            $stmt = $conex->prepare("insert into alquiler (Cod_juego, DNI_cliente, Fecha_alquiler) values(?,?,?)");
            $cod = $alquiler->cod_juego;
            $dni = $alquiler->dni_cliente;
            $fecha_ini = date("Y-m-d", $alquiler->fecha_alquiler);
            $stmt->bind_param("sss", $cod, $dni, $fecha_ini);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $conex->execute_query("update juegos set Alguilado='SI' where Codigo='$cod'");
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
        } catch (Exception $ex) {
            
        }
    }

    public static function getAquilerJuego($cod) {
        try {
            $conex = new ConexionJuegos();
            $resul = $conex->execute_query("select * from alquiler where Cod_juego='$cod' and Fecha_devol is null");
            $al = $resul->fetch_object();
            $alquiler = new Alquiler($al->id, $al->Cod_juego, $al->DNI_cliente, $al->Fecha_alquiler, $al->Fecha_devol);
            return $alquiler;
        } catch (Exception $ex) {
            
        }
    }

    public static function getAquiler($cod) {
        try {
            $conex = new ConexionJuegos();
            $resul = $conex->execute_query("select * from alquiler where id='$cod'");
            $al = $resul->fetch_object();
            $alquiler = new Alquiler($al->id, $al->Cod_juego, $al->DNI_cliente, $al->Fecha_alquiler, $al->Fecha_devol);
            return $alquiler;
        } catch (Exception $ex) {
            
        }
    }

    public static function getAlquileresUsuario($dni) {
        try {
            $conex = new ConexionJuegos();
            $result = $conex->execute_query("select * from alquiler where DNI_cliente='$dni'");
            if ($result->num_rows) {
                $alquileres = array();
                while ($alq = $result->fetch_object()) {
                    array_push($alquileres, new Alquiler($alq->id, $alq->Cod_juego, $alq->DNI_cliente, $alq->Fecha_alquiler, $alq->Fecha_devol));
                }
                return $alquileres;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function juegoDevuelto($id, $fecha) {

        try {
            $conex = new ConexionJuegos();
            $stmt = $conex->prepare("update alquiler set Fecha_devol=? where id=?");
            $stmt->bind_param("si", $fecha, $id);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
}
