<?php

class TransfereciaBanco {

    private $ibanOrigen;
    private $ibanDestino;
    private $fecha;
    private $cantidad;
    
    public function __construct($ibanOrigen, $ibanDestino, $fecha, $cantidad) {
        $this->ibanOrigen = $ibanOrigen;
        $this->ibanDestino = $ibanDestino;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}
