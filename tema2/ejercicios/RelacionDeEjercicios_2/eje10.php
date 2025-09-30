<?php

$text = "hola me llamo lucas";
$numV = 0;

echo gettype($text);

for($i = 0; $i < count($text); $i++){
    
    if($text == "a" || $text == "e"|| $text == "i"|| $text == "o"|| $text == "u"){
        $numV++;
    }
    
}


echo $numV;