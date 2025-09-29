<?php

$matriz = array(
    "DAW"=>array(
        "DWES"=>"Diseño web entorno servidor",
        "DWEC"=>"Diseño web entorno servidor",
        "DIW"=>"Diseño de ointerdaces web",
        "OPT"=>"optativa"
        ),
    "DAM"=>array(
        "DI"=>"Diseño de interaces",
        "Android"=>"Desarrollo en entorno android",
        "Windows"=>"Desarrollo entorno windows",
        "OPT"=>"Optativa")
);

foreach ($matriz as $ind => $ciclo){
    foreach ($ciclo as $ind2 => $asig){
        echo $ind." --> ".$ind2." = ".$asig."<br>";
    }
}