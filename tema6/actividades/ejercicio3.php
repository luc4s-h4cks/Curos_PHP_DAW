<?php

$datos = file_get_contents("https://randomuser.me/api/?results=10");


$usu = json_decode($datos);

for ($i = 0; $i < count($usu->results); $i++) {
    echo "Nombre: " . $usu->results[$i]->name->first . "<br>";
    echo "Apellidos: " . $usu->results[$i]->name->last . "<br>";
    echo "Dirección: " . $usu->results[$i]->location->street->name . " " . $usu->results[$i]->location->street->number . "<br>";
    echo "Ciudad: " . $usu->results[$i]->location->city . "<br>";
    echo "País: " . $usu->results[$i]->location->country . "<br>";
    echo "Teléfono: " . $usu->results[$i]->phone . "<br>";
    echo "Email: " . $usu->results[$i]->email . "<br>";
    echo "Username: " . $usu->results[$i]->login->username . "<br>";
    echo "Password: " . $usu->results[$i]->login->password . "<br>";
    echo "===========================================<br>";
}
?>