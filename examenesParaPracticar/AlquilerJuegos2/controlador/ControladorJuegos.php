<?php

include_once '../controlador/ConexionAlquileres.php';
include_once '../modelo/Juego.php';

class ControladorJuegos {

    public static function getAll() {
        try {
            $conn = new ConexionAlquileres();
            $resul = $conn->execute_query("select * from juegos");
            $juegos = array();
            while ($j = $resul->fetch_object()) {
                array_push($juegos, new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion));
            }
            return $juegos;
        } catch (Exception $ex) {
            
        }
    }

    public static function getAllAlquilados() {
        try {
            $conn = new ConexionAlquileres();
            $resul = $conn->execute_query("select * from juegos where Alguilado='SI'");
            $juegos = array();
            while ($j = $resul->fetch_object()) {
                array_push($juegos, new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion));
            }
            return $juegos;
        } catch (Exception $ex) {
            
        }
    }

    public static function getAllNoAlquilados() {
        try {
            $conn = new ConexionAlquileres();
            $resul = $conn->execute_query("select * from juegos where Alguilado='NO'");
            $juegos = array();
            while ($j = $resul->fetch_object()) {
                array_push($juegos, new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion));
            }
            return $juegos;
        } catch (Exception $ex) {
            
        }
    }

    public static function crearCodigo($nombre, $consola) {
        $array = explode(" ", $nombre);
        $cod = "";
        foreach ($array as $p) {
            $cod .= $p[0];
        }

        $cod .= "-" . $consola;
        return $cod;
    }

    public static function insertJuego($juego) {
        try {
            $conex = new ConexionAlquileres();
            $stmt = $conex->prepare("insert into juegos values(?,?,?,?,?,?,?,?)");
            $cod = $juego->codigo;
            $nomJ = $juego->nombreJ;
            $nomC = $juego->nombreC;
            $anio = $juego->anio;
            $precio = $juego->precio;
            $alq = $juego->alquilado;
            $img = $juego->imagen;
            $desc = $juego->descripcion;
            $stmt->bind_param("sssiisss", $cod, $nomJ, $nomC, $anio, $precio, $alq, $img, $desc);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getJuego($cod) {
        try {
            $conn = new ConexionAlquileres();
            $resul = $conn->execute_query("select * from juegos where Codigo='$cod'");

            $j = $resul->fetch_object();
            return new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion);
        } catch (Exception $ex) {
            
        }
    }

    public static function updatetJuego($juego, $oldCod) {
        try {
            $conex = new ConexionAlquileres();
            $stmt = $conex->prepare("update juegos set Codigo=?,Nombre_juego=?,Nombre_Consola=?,Anno=?,Precio=?,Alguilado=?,Imagen=?,descripcion=? where Codigo=?");
            $cod = $juego->codigo;
            $nomJ = $juego->nombreJ;
            $nomC = $juego->nombreC;
            $anio = $juego->anio;
            $precio = $juego->precio;
            $alq = $juego->alquilado;
            $img = $juego->imagen;
            $desc = $juego->descripcion;
            $stmt->bind_param("sssiissss", $cod, $nomJ, $nomC, $anio, $precio, $alq, $img, $desc, $oldCod);
            $stmt->execute();
            if ($stmt->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function deleteJuego($cod) {
        try {
            $conex = new ConexionAlquileres();
            $conex->execute_query("delete from juegos where Codigo='$cod'");
            if ($conex->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function alquilar($cod) {
        try {
            $conex = new ConexionAlquileres();
            $conex->execute_query("update juegos set alguilado='SI' where Codigo='$cod'");
            if ($conex->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }

    public static function devolver($cod) {
        try {
            $conex = new ConexionAlquileres();
            $conex->execute_query("update juegos set alguilado='NO' where Codigo='$cod'");
            if ($conex->affected_rows) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
}
