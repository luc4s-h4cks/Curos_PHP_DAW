<?php
require_once './Persona.php';
class Empleado extends Persona{
    private $salario;
    
    public function __construct($n = "Jose", $a = "Pineda", $e = 20, $sal=1200) {
        parent::__construct($n, $a, $e);
        $this->salario=$sal;
        
    }
    
}
