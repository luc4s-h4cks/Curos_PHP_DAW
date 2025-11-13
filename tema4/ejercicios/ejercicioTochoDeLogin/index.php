<?php


if (isset($_COOKIE['fecha'])){
    echo "Bienvenido $_COOKIE[nombre] $_COOKIE[apellido], tu ultimo acceso fue ". date("Y:m:d H:i:s");
    setcookie("fecha", time(), time()+3600*24*365);
}else{
    echo "Este es tu primer acceso, bienvenido $_COOKIE[nombre] $_COOKIE[apellido]";
    setcookie("fecha", time(), time()+3600*24*365);
}

?>

<a href="login.php"><input type="button" value="Salir"></a>