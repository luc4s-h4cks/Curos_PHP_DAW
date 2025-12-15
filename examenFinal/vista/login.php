<?php
include_once '../controlador/ControladorEmpleado.php';
include_once '../modelo/EmpleadoTaller.php';
if (isset($_POST['login'])) {
$msg=" ";
    if (isset($_POST['login'])) {
        echo $_POST['cod'];
        $emp = ControladorEmpleado::login($_POST['cod']);
        var_dump($emp);
        if ($emp != null) {
            
            if (password_verify($_POST['pass'], $emp->clave)) {
                session_start();
                $_SESSION['empleado'] = $emp;
                header("Location: menu.php");
            } else {
                $msg = "Valores incorrecots";
            }
        }
        $msg = "Valores incorrecots";
    }
}
?>

<form action="" method="post">
    Codigo: <input type="number" name="cod">
    Contraseña: <input type="text" name="pass">
    <input type="submit" name="login" value="Entrar">
</form>


