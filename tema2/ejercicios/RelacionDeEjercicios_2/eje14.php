<?php

$datos = array("nombre", "salario", 4, 5, 5, 5, 4, "salario");

$repetidos = array();

foreach ($datos as $indi => $dato) {
    
    
    if (array_key_exists($dato, $repetidos) !== false) {
        
        $repetidos[$dato]++;
        
    } else {
        
        $repetidos[$dato] = 1;
        
    }
}

foreach ($repetidos as $repe => $cant) {
    echo $repe . ": " . $cant . "<br>";
}