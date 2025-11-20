<?php

class Persona {

    protected $nombre;
    protected $apellidos;
    protected $edad;
    protected static $numPersonas = 0;

    public function __construct($n = "Jose", $a = "Pineda", $e = 20) {
        $this->nombre = $n;
        $this->apellidos = $a;
        $this->edad = $e;
        self::$numPersonas++;
    }

    public function __destruct() {
        self::$numPersonas--;
    }

    public static function getNumeroPersonas() {
        return self::$numPersonas;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "<br> Mi nombre es: " . $this->nombre . " " . $this->apellidos . " y tengo " . $this->edad . " años";
    }

    public function __clone(): void {
        $this->edad = 0;
        self::$numPersonas++;
    }

    public function __call(string $name, array $arguments): void {
        if ($name == "modificar") {
            if (count($arguments) == 1) {
                $this->nombre = $arguments[0];
            }
            if (count($arguments) == 2) {
                $this->nombre = $arguments[0];
                $this->apellidos = $arguments[1];
            }
            if (count($arguments) == 3) {
                $this->nombre = $arguments[0];
                $this->apellidos = $arguments[1];
                $this->edad = $arguments[2];
            }
        }
    }
}
