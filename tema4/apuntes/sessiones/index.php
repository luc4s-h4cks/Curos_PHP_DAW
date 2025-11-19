<?php
session_name("admin");
session_start();
if (isset($_SESSION['nombre'])) {
    echo $_SESSION['nombre'];
} else {
    $_SESSION['nombre'] = "pepe";
}
?>

<a href="datos.php">Ir a datos</a>
