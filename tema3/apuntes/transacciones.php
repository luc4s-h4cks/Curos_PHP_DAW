<?php

try {
    $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
    $conex->set_charset("utf8mb4");
    $conex->autocommit(false);
    $conex->query("Update datos set salario=2000 where DNI='12345678A'");
    $conex->query("Insert into datos(DNI, Nombre, Apellidos, salario) Values('12345678A', 'Pepe', 'Perez', 1500)");
    $conex->commit();
} catch (mysqli_sql_exception $ex) {
    echo "<br>ERROR " . $conex->errno . "-" . $conex->error;
    $conex->rollback();
}
