<?php

class Empleado_Taller {

    private $codigo;
    private $clave;
    private $nombre;
    private $telf;
    private $rol;

    public function __construct($codigo, $clave, $nombre, $telf, $rol) {
        $this->codigo = $codigo;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->telf = $telf;
        $this->rol = $rol;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}
