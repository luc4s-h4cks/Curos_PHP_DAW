<?php

$year = 2020;

if ($year % 4 == 0){
    
    if($year % 100 == 0){
        
        if($year % 400 == 0){
            
            echo "El año es bisiesto";
            
        }else{
            
            echo "El año no es bisiesto";
            
        }
        
    }else{
        echo "El año es bisiesto";
    }
    
}else{
    
    echo "El año no es bisiesto";
    
}
