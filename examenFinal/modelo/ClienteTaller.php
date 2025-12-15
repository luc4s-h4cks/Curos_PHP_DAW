<?php

class ClienteTaller {

    private $dni;
    private $nombre;
    private $direccion;
    private $telefono;
    
    public function __construct($dni, $nombre, $direccion, $telefono) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}
