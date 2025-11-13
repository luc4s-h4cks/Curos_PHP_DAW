<?php
ob_start(); //Con esto cre un buffer de salida 

ob_end_flush(); //Con esto lo mando, 
//esto sirve por si se llena el buffer y no se puede poner arriba las cosas importantes de las cabezeras

setcookie("nombre", "pepe", time()+3600);


?>

<a href="datos.php">Datos</a>