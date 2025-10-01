<?php

    $paises = array("España", "Francia", "Italia", "Alemania", "Portugal");
    
    unset($paises[array_search("Italia", $paises)]);
    
    print_r($paises);
    
    array_pop($paises);
    
    echo '<br>';
    print_r($paises);
