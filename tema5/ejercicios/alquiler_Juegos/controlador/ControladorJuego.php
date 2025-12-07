<?php

include_once '../modelo/Juego.php';
include_once 'ConexionJuegos.php';

class ControladorJuego {

    public static function getAll() {
        try {
            $conex = new ConexionJuegos();
            $resul = $conex->execute_query("select * from juegos");
            $juegos = array();
            while ($j = $resul->fetch_object()) {
                $juego = new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion);
                array_push($juegos, $juego);
            }
            return $juegos;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function crearCodigo($juego, $consola) {
        $cod = "";
        $array = explode(" ", $juego);
        foreach ($array as $p) {
            if ($p != "") {
                $cod .= $p[0];
            }
        }

        $cod .= "-" . $consola;
        return $cod;
    }

    public static function insertJuego($juego) {
        try {
            $conex = new ConexionJuegos();
            $stmt = $conex->prepare("insert into juegos values(?,?,?,?,?,?,?,?)");
            $cod = $juego->codigo;
            $nomJ = $juego->nombre_juego;
            $nomC = $juego->nombre_consola;
            $anio = $juego->anio;
            $pre = $juego->precio;
            $alq = $juego->alquilado;
            $img = $juego->imagen;
            $des = $juego->desc;
            $stmt->bind_param("sssiisss", $cod, $nomJ, $nomC, $anio, $pre, $alq, $img, $des);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function getJuego($cod) {
        try {
            $conex = new ConexionJuegos();
            $resul = $conex->execute_query("select * from juegos where Codigo='" . $cod . "'");
            $j = $resul->fetch_object();
            $juego = new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion);

            return $juego;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function deleteJuego($cod) {
        try {
            $conex = new ConexionJuegos();
            $conex->execute_query("delete from juegos where Codigo='" . $cod . "'");
            if ($conex->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function updateJuego($juego) {
        try {
            $conex = new ConexionJuegos();
            $stmt = $conex->prepare("update juegos set Codigo = ?,Nombre_juego = ?,Nombre_consola = ?,Anno = ?,Precio = ?,Alguilado = ?,Imagen = ?,descripcion = ? where Codigo = ?");
            $codOld = $juego->codigo;
            $nomJ = $juego->nombre_juego;
            $nomC = $juego->nombre_consola;
            $anio = $juego->anio;
            $pre = $juego->precio;
            $alq = $juego->alquilado;
            $img = $juego->imagen;
            $des = $juego->desc;
            $codNew = self::crearCodigo($nomJ, $nomC);
            $stmt->bind_param("sssiissss",$codNew,$nomJ,$nomC,$anio,$pre,$alq,$img,$des,$codOld);
            $stmt->execute();
            if($stmt->affected_rows){
                return true;
            }else{
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
