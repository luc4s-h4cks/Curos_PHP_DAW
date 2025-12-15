<?php
include_once '../controlador/controladorUsuarios.php';

$dni;
if (isset($_POST['entrar'])) {

    if (preg_match("/^[0-9]{8}[A-Z]$/", $_POST['dni'])) {
        $dni = true;
    } else {
        $dni = false;
    }
}

if (isset($_POST['entrar']) && $dni) {

    $passCifrad = md5($_POST['pass']);
    $usu = ControladorUsuarios::loginUsuario($_POST['dni']);
    if ($usu != null) {
        if (ControladorUsuarios::estaBloqueado($usu->dni) == 1) {
            Echo "Usuario bloqueado";
        } else {
            if ($usu->clave == $passCifrad) {
                session_start();
                $_SESSION['usuario'] = $usu;
                ControladorUsuarios::restarIntentos($usu->dni);
                header("Location: cuentas.php");
            } else {

                ControladorUsuarios::restarIntentos($usu->dni);
                $int = ControladorUsuarios::getIntentos($usu->dni);
                if (ControladorUsuarios::estaBloqueado($usu->dni) == 1) {
                    Echo "Usuario bloqueado";
                } else {
                    Echo "usuario y/o contraseña incorectos<br>";
                    Echo "Te quedan $int intentos";
                }
            }
        }
    } else {
        Echo "usuario y/o contraseña incorectos";
    }
}
?>

<form action="" method="post">
    DNI <input type="text" name="dni"><?php if (isset($_POST['entrar']) && !$dni) echo "EL dni no tiene el formato correcto" ?><br>
    Contraseña <input type="text" name="pass"><br>
    <input type="submit" name="entrar" value="Entrar">
</form>
