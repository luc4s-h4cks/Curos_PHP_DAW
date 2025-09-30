<?php

    $edades = array(20, 30, 40, 25, 35);
    
    $valor = 21;
    
    if(array_search($valor, $edades)) {
        echo "esta en la posicion: ". array_search($valor, $edades);
    }else{
        echo "Ese valor no esta en el array";
    }