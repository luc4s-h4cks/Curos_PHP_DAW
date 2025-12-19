<?php

$datos = file_get_contents("https://randomuser.me/api/?results=10");



$usu = json_decode($datos);
$conex = new mysqli("localhost", "dwes", "abc123.", "personas");
for ($i = 0; $i < count($usu->results); $i++) {

    $nombre = $usu->results[$i]->name->first;
    $apellidos = $usu->results[$i]->name->last;
    $dir = $usu->results[$i]->location->street->name . " " . $usu->results[$i]->location->street->number;
    $ciudad = $usu->results[$i]->location->city;
    $pais = $usu->results[$i]->location->country;
    $telf = $usu->results[$i]->phone;
    $email = $usu->results[$i]->email;
    $user = $usu->results[$i]->login->username;
    $pass = $usu->results[$i]->login->password;
    
    $stmt = $conex->prepare("insert into persona (nombre,apellidos,direccion,ciudad,pais,telefono,email,username,password) values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $nombre, $apellidos, $dir, $ciudad, $pais, $telf, $email, $user, $pass);
    $stmt->execute();
}
?>