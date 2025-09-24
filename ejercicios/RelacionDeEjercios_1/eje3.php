<?php

$a = 5;
$b = 7;
$c = 9;

if($a > $b && $a > $c){
    echo $a." es el numero mayor";
}else if($b > $a && $b > $c){
    echo $b." es el numero mayor";
}else{
    echo $c." es el numero mayor";
}