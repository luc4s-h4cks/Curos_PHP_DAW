<?php

class Alquiler {

    private $id;
    private $cod_juego;
    private $dni_cliente;
    private $fecha_alquiler;
    private $fecha_devo;


    public function __construct($id, $cod_juego, $dni_cliente, $fecha_alquiler, $fecha_devo) {
        $this->id=$id;
        $this->cod_juego=$cod_juego;
        $this->dni_cliente=$dni_cliente;
        $this->fecha_alquiler=$fecha_alquiler;
        $this->fecha_devo=$fecha_devo;
    }
}

