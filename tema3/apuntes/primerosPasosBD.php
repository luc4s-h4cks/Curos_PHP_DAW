<?php
/*
$driver = new mysqli_driver();
$driver-> report_mode=1;

$conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
echo $conex->server_info;

$conex -> query("Insert into datos(DNI, Nombre, Apellidos, salario) Values('12345678A', 'Pepe', 'Perez', 1500)");

echo "<br>ERROR ".$conex->errno."-".$conex->error;
*/

try {
   $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
   $conex -> set_charset("utf8mb4");
   $conex -> query("Insert into datos(DNI, Nombre, Apellidos, salario) Values('12345678A', 'Pepe', 'Perez', 1500)");
} catch (mysqli_sql_exception $ex) {
   echo "<br>ERROR ".$conex->errno."-".$conex->error;
}

$conex->close();