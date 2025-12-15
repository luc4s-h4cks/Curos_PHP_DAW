<?php

class Coche {

    private $matricula;
    private $marca;
    private $modelo;
    private $km;
    private $foto;
    private $cliente;

    public function __construct($matricula, $marca, $modelo, $km, $foto, $cliente) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->km = $km;
        $this->foto = $foto;
        $this->cliente = $cliente;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}
