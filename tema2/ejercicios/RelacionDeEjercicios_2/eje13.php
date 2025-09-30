<?php

    $datos = array("Lucas",3,"gato","Lucas",3);
    
    $sinDuplicado = array();
    
    foreach ($datos as $indi => $valor){
        
        if(array_search($valor, $sinDuplicado) === false){
            array_push($sinDuplicado, $valor);
            
        }
        
    }
    
    print_r($sinDuplicado);