<?php

    $nombre = array("Ana", "Luis", "Carlos", "Maria");
    $inverso = array_reverse($nombre);
    
    print_r($inverso);
    
    echo "<br>";
    
    if(in_array("Carlos", $nombre)){
        echo "Carlos existe en el array";
    }else{
        echo "Carlos no existe en el array";
    }
    
     echo "<br>";
     
    array_push($nombre, "Juan");
    
    print_r($nombre);

