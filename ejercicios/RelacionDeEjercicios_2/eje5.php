<?php

$productos = array(
    array("Zumo", 4, 200),
    array("Fanta", 2, 500),
    array("Pan", 1, 1000)
);

echo $productos[1][0].": ".$productos[1][1]."€"."<br>";

foreach ($productos as $i => $pro){
    echo $pro[0]."<br>";
}