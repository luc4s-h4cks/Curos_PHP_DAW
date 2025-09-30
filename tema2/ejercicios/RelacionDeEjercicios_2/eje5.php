<?php

$productos = array(
    array("nombre" => "Zumo", "precio" => 4, "cantidad" => 200),
    array("nombre" => "Fanta", "precio" => 2, "cantidad" => 500),
    array("nombre" => "Pan", "precio" => 1, "cantidad" => 1000)
);

echo $productos[1]["nombre"].": ".$productos[1]["precio"]."€"."<br>";

foreach ($productos as $indi => $pro){
    echo $pro["nombre"]."<br>";
}