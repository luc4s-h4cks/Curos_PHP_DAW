<?php

include_once '../modelo/Juego.php';
include_once 'ConexionJuegos.php';

class ControladorJuego {

    public static function getAll() {
        try {
            $conex = new ConexionJuegos();
            $resul = $conex->execute_query("select * from juegos");
            $juegos = array();
            while ($j = $resul->fetch_object()){
                $juego = new Juego($j->Codigo, $j->Nombre_juego, $j->Nombre_consola, $j->Anno, $j->Precio, $j->Alguilado, $j->Imagen, $j->descripcion);
                array_push($juegos, $juego);
            }
            return $juegos;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
}
