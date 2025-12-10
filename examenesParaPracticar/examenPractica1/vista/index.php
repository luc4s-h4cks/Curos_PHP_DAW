<?php
include_once '../controlador/controladorUsuarios.php';

if (!isset($_COOKIE['intentos'])) {
    setcookie("intentos", 3);
}
$dni;
if(isset($_POST['entrar'])){
    
    if(preg_match("/^[0-9]{8}[A-Z]$/", $_POST['dni'])){
        $dni = true;
    }else{
        $dni = false;
    }
    
}

if (isset($_POST['entrar']) && $dni ) {
    if($_COOKIE['intentos'] > 0) {
        $passCifrad = md5($_POST['pass']);
        $usu = ControladorUsuarios::loginUsuario($_POST['dni'], $passCifrad);
        if ($usu != null) {
            setcookie("intentos", 3);
            session_start();
            $_SESSION['usuario'] = $usu;
            header("Location: cuentas.php");
        } else {
            setcookie("intentos", $_COOKIE['intentos'] - 1);
            Echo "Le quedan " . $_COOKIE['intentos'] . " intentos<br>";
            echo "Nombre y/o contraseña incorrectos";
        }
    }else{
        echo "Usuario bloqueado";
    }
}
?>

<form action="" method="post">
    DNI <input type="text" name="dni"><?php if(isset($_POST['entrar']) && !$dni) echo "EL dni no tiene el formato correcto"?><br>
    Contraseña <input type="text" name="pass"><br>
    <input type="submit" name="entrar" value="Entrar">
</form>
