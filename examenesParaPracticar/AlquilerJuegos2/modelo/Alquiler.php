<?php

class Alquiler {

    private $id;
    private $codJuego;
    private $dni;
    private $fechaIni;
    private $fechaDev;
    
    public function __construct($id, $codJuego, $dni, $fechaIni, $fechaDev) {
        $this->id = $id;
        $this->codJuego = $codJuego;
        $this->dni = $dni;
        $this->fechaIni = $fechaIni;
        $this->fechaDev = $fechaDev;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }
}
