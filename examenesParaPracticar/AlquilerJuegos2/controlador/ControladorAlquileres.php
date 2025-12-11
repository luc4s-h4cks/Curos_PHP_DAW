<?php

include_once '../controlador/ConexionAlquileres.php';
include_once '../modelo/Alquiler.php';

class ControladorAlquileres {

    public static function getAlquilerSinDevolver($juego) {
        try {
            $conex = new ConexionAlquileres();
            $resul = $conex->execute_query("select * from alquiler where COd_juego='$juego' and Fecha_devol is null");
            if ($resul->num_rows) {
                $alq = $resul->fetch_object();
                return new Alquiler($alq->id, $alq->Cod_juego, $alq->DNI_cliente, $alq->Fecha_alquiler, 0);
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function crearAlquiler($alquiler) {
        try {
            $conex = new ConexionAlquileres();
            $conex->execute_query("insert into alquiler (Cod_juego, DNI_cliente, Fecha_alquiler) values('$alquiler->codJuego', '$alquiler->dni', '$alquiler->fechaIni')");
            if ($conex->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function getAlquileresUsuario($dni) {
        try {
            $conex = new ConexionAlquileres();
            $resul = $conex->execute_query("select * from alquiler where DNI_cliente='$dni'");
            $alquileres = array();
            while ($al = $resul->fetch_object()) {
                array_push($alquileres, new Alquiler($al->id, $al->Cod_juego, $al->DNI_cliente, $al->Fecha_alquiler, $al->Fecha_devol));
            }
            return $alquileres;
        } catch (Exception $ex) {
            
        }
    }

    public static function getAlquilerId($id) {
        try {
            $conex = new ConexionAlquileres();
            $resul = $conex->execute_query("select * from alquiler where id=$id");
            if ($resul->num_rows) {
                $alq = $resul->fetch_object();
                return new Alquiler($alq->id, $alq->Cod_juego, $alq->DNI_cliente, $alq->Fecha_alquiler, $alq->Fecha_devol);
            }
        } catch (Exception $ex) {
            
        }
    }
    
    public static function devolverJuego($id, $fechaDevo) {
        try {
            $conex = new ConexionAlquileres();
            $conex->execute_query("update alquiler set Fecha_devol='$fechaDevo' where id=$id");
            if($conex->affected_rows){
                return true;
            }else{
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
}
