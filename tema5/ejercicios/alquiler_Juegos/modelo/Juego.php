<?php

class Juego {

    private $codigo;
    private $nombre_juego;
    private $nombre_consola;
    private $anio;
    private $precio;
    private $alquilado;
    private $imagen;
    
    public function __construct($codigo, $nombre_juego, $nombre_consola, $anio, $precio, $alquilado, $imagen) {
        $this->codigo=$codigo;
        $this->nombre_juego=$codigo;
        $this->nombre_consola=$codigo;
        $this->anio=$codigo;
        $this->precio=$codigo;
        $this->alquilado=$codigo;
        $this->$imagen=$codigo;
    }
    
    public function __get(string $name): mixed {
        return $this->$name;
    }
    
    public function __set(string $name, mixed $value): void {
        $this->$name=$value;
    }
    
}
