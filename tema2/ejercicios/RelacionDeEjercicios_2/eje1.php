<?php

$colores = array("rojo","verde","azul","amarillo");

echo $colores[0]."<br>".$colores[2];

array_push($colores, "naranja");

for($i = 0; $i < count($colores); $i++){
    
     echo "<br>".$colores[$i];
    
}
