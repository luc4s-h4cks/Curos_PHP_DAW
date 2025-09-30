<?php

    $numeros = array(4,33,12,99,45);
    
    $max =0;
    $min = 99999999;
    
    foreach ($numeros as $indi => $num){
        
        if($num > $max) {
            $max = $num;
        }
        
        if($num < $min){
            $min = $num;
        }
        
    }
    
    echo "Maximo: ".$max."<br> Minimo: ".$min;