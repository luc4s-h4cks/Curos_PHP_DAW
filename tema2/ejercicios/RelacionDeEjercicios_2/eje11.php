<?php

$numeros = array(15,70,88,32,4);

$suma = 0;

foreach ($numeros as $indi => $num){
    $suma += $num;
}

echo $suma/count($numeros);