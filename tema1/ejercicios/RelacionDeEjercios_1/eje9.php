<?php

$num1 = 19;
$num2 = 11;
$num3 = 12;

$es_ordenado = false;

while ($es_ordenado == false){
    
    $es_ordenado = true;
    
    if($num1 < $num2){
        
        $aux = $num2;
        $num2 = $num1;
        $num1 = $aux;
        $es_ordenado = false;
        
    }
    
    if($num2 < $num3){
        
        $aux = $num3;
        $num3 = $num2;
        $num2 = $aux;
        $es_ordenado = false;
        
    }
    
}

echo $num1."<br>".$num2."<br>".$num3;



