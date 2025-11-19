<?php

if(isset($_POST['salir'])){
    setcookie("logeado", 0);
}

if (isset($_COOKIE['fecha'])) {
    echo "Bienvenido $_COOKIE[nombre] $_COOKIE[apellido], tu ultimo acceso fue " . date("Y:m:d H:i:s");
    setcookie("fecha", time(), time() + 3600 * 24 * 365);
} else {
    echo "Este es tu primer acceso, bienvenido $_COOKIE[nombre] $_COOKIE[apellido]";
    setcookie("fecha", time(), time() + 3600 * 24 * 365);
}

if ($_COOKIE['recordar'] == 0) {
    setcookie("recordar", "", 0);
    setcookie("nombre", "", 0);
    setcookie("apellido", "", 0);
    setcookie("email", "", 0);
    setcookie("pass", "", 0);
}
?>
<br>
<form action="" method="post"><input type="submit" name="salir" value="Salir"></form>
