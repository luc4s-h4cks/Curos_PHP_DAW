<?php

$numeros = array(3,1,4,1,5,9);

$es_ordenado = false;

while ($es_ordenado == false){
    
    $es_ordenado = true;
    
    for($i=0;$i<count($numeros)-1;$i++){
        
        if($numeros[$i] > $numeros[$i+1]){
            
            $aux = $numeros[$i+1];
            $numeros[$i+1] = $numeros[$i];
            $numeros[$i] = $aux;
            
            $es_ordenado = false;
            
        }
        
    }
    
}
print_r($numeros);

echo "<br>";

$es_ordenado = false;
while ($es_ordenado == false){
    
    $es_ordenado = true;
    
    for($i=0;$i<count($numeros)-1;$i++){
        
        if($numeros[$i] < $numeros[$i+1]){
            
            $aux = $numeros[$i+1];
            $numeros[$i+1] = $numeros[$i];
            $numeros[$i] = $aux;
            
            $es_ordenado = false;
            
        }
        
    }
    
}
print_r($numeros);

