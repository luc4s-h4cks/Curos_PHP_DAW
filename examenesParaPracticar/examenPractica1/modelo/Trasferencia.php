<?php

class Trasferencia {

    private $iban_origen;
    private $iban_destino;
    private $fecha;
    private $cantidad;
    
    public function __construct($iban_origen, $iban_destino, $fecha, $cantidad) {
        $this->iban_origen = $iban_origen;
        $this->iban_destino = $iban_destino;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }
    
    public function __get(string $name): mixed {
        return $this->$name;
    }

}
