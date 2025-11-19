<?php
session_name("admin");
session_start();
setcookie("admin", $_COOKIE['admin'], time()+3600);
echo $_SESSION['nombre'];
$_SESSION['nombre'] = "Antonio";

/*
session_unset();
session_destroy();
setcookie("admin", $_COOKIE['admin'],time()-1, "/");
 
 */
?>
<a href="index.php">Ir atras</a>
