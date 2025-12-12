<?php
include_once '../controlador/ControladorUsuariosBanco.php';
if (isset($_POST['login'])) {
    $usu = ControladorUsuariosBanco::verificarLogin($_POST['dni'], md5($_POST['pass']));
    if($usu != null){
        session_start();
        $_SESSION['usuario'] = $usu;
        header("Location: cuentas.php");
    }else{
        echo "Usuario y/o contraseña incorrectos";
    }
}
?>

<form action="" method="post">
    DNI: <input type="text" name="dni">
    Contraseña: <input type="text" name="pass">
    <input type="submit" name="login" value="Entrar">
</form>

