<?php

$array[5] = "Pepe";
$array["Nombre"] = "Jose";
$array[3] = "Maria";



$array = [2=>"Pepe", 5=>"Juan", "Maria", 1=>"Jose"];

foreach ($array as $ind=>$valor){
    echo $ind." = ".$valor."<br>";
}

$array = array(5=>"Pepe", 9=>"Juan", 3=>"Maria");

//Creacion de matrizes
$matriz[][]="Pepe";
$matriz[][]="Jose";
$matriz[][3]="Maria";
$matriz[][]="Juan";
$matriz[2][]="Rosa";

$matriz = array(
    0 =>array("nombre" => "Pepe", "apellido"=> "Carpio", "edad" => 35),
    1 =>array("nombre" => "Maria", "apellido"=> "Sanchez", "edad" => 28),
    2 =>array("nombre" => "Juan", "apellido"=> "Ramirez", "edad" => 33)
    );

    foreach ($matriz as $ind => $fila){
        foreach ($fila as $ind2 =>$valor){
            echo $ind2." = ".$valor." ";
        }
    }

echo "<br>"."<br>";
var_dump($matriz);

echo "<br>"."<br>";

echo count($matriz[1]);

echo "<br>"."<br>";

echo count($matriz );
