<?php

require_once 'Persona.php';
require_once './Empleado.php';

$p = new Persona("Pepe", "Sanchez", 25);

echo $p->nombre;

echo "<br>".Persona::getNumeroPersonas();

$p2 = new Persona();

echo "<br>".$p2->nombre;

echo "<br>".Persona::getNumeroPersonas();

unset($p);

echo "<br>".Persona::getNumeroPersonas();

$p2->nombre = "Xexu";

echo $p2;

$p3 = clone($p2);
$p2->nombre="Jesus";

echo $p2;
echo $p3;
echo "<br>".Persona::getNumeroPersonas();

$p2->modificar("Luis", "Lucena", 19);

echo $p2;

$json = json_encode($p2);
echo "<br>";
var_dump($json);

echo "<br>==========HERENCIA============<br>";
$e = new Empleado("Antonio", "Campos", 30, 2500);

echo $e->nombre;

echo $e;
