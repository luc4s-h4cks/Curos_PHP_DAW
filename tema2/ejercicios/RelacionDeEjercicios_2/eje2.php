<?php

$persona = array ("nombre" => "", "edad" => "", "ciudad" => "");

$persona["nombre"] = "Juan";
$persona["edad"] = 25;
$persona["ciudad"] = "Madrid";

echo $persona["nombre"].", ".$persona["ciudad"];

$persona ["profesion"] = "Ingenireo";

echo "<br>";

print_r($persona);


