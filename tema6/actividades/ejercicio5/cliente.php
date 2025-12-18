<?php

$datos = file_get_contents("http://localhost/Curos_PHP_DAW/tema6/actividades/ejercicio5/server.php?cantidad=10");

$cartas = json_decode($datos);

foreach ($cartas as $c){
    echo "Carta: ".$c[1]." de ".$c[0]."<br>";
}
