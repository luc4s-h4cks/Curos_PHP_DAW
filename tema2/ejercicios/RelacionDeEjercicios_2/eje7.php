<?php

    $paises = array("España", "Francia", "Italia", "Alemania", "Portugal");
    
    unset($paises[2]);
    
    print_r($paises);
    
    array_pop($paises);
    
    echo '<br>';
    print_r($paises);
