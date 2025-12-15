<?php

class Tarea {

    private $id;
    private $descripcion;
    private $precio;
    private $tipo;

    public function __construct($id, $descripcion, $precio, $tipo) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->tipo = $tipo;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}
