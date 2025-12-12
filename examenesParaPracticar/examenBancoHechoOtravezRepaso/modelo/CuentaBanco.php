<?php

class CuentaBanco {

    private $iban;
    private $saldo;
    private $dni_cuenta;
    
    public function __construct($iban, $saldo, $dni_cuenta) {
        $this->iban = $iban;
        $this->saldo = $saldo;
        $this->dni_cuenta = $dni_cuenta;
    }
    
    public function __get(string $name): mixed {
        return $this->$name;
    }
    
}

