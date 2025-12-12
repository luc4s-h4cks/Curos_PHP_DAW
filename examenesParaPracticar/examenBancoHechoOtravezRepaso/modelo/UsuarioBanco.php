<?php

class UsuarioBanco {

    private $nombre;
    private $direccion;
    private $telefono;
    private $dni;
    private $clave;
    private $intentos;
    private $bloqueado;
    
    public function __construct($nombre, $direccion, $telefono, $dni, $clave, $intentos, $bloqueado) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}

