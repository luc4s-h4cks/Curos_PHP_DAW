<?php

class Trabajo {

    private $matricula;
    private $mecanico;
    private $tarea;
    private $estado;
    private $horas;
    private $fecha;

    public function __construct($matricula, $mecanico, $tarea, $estado, $horas, $fecha) {
        $this->matricula = $matricula;
        $this->mecanico = $mecanico;
        $this->tarea = $tarea;
        $this->estado = $estado;
        $this->horas = $horas;
        $this->fecha = $fecha;
    }

        public function __get(string $name): mixed {
        return $this->$name;
    }
}
