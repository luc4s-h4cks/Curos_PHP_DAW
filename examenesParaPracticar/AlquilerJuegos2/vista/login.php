<?php
include_once '../controlador/ControladorCliente.php';
include_once '../modelo/Cliente.php';

if(isset($_POST['login'])){
    $usu = ControladorCliente::login($_POST['dni'], md5($_POST['pass']));
    if($usu != null){
        session_start();
        $_SESSION['usuario'] = $usu;
        header("Location: index.php");
    }else{
        Echo "Contraseña y/o usuario incorrectos";
    }
}

?>

<form action="" method="post">
    DNI: <input type="text" name="dni">
    Contraseña: <input type="text" name="pass">
    <input type="submit" name="login" value="Entrar"> 
</form>
<a href="index.php"><button>Inicio</button></a>