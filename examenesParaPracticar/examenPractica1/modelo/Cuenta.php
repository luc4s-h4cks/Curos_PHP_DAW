<?php

class Cuenta {

   private $iban;
   private $saldo;
   private $dni;
   
   public function __construct($iban, $saldo, $dni) {
       $this->iban = $iban;
       $this->saldo = $saldo;
       $this->dni = $dni;
   }

   public function __get(string $name): mixed {
       return $this->$name;
   }
   
}

