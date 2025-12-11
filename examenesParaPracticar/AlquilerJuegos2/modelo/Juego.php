<?php

class Juego {
    private $codigo;
    private $nombreJ;
    private $nombreC;
    private $anio;
    private $precio;
    private $alquilado;
    private $imagen;
    private $descripcion;

    public function __construct($codigo, $nombreJ, $nombreC, $anio, $precio, $alquilado, $imagen, $descripcion) {
        $this->codigo = $codigo;
        $this->nombreJ = $nombreJ;
        $this->nombreC = $nombreC;
        $this->anio = $anio;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}

