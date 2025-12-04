<?php
include_once '../modelo/Cliente.php';
include_once '../controlador/ControladorCliente.php';

if (isset($_POST['registrar'])) {
    $c = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['dir'], $_POST['loc'], md5($_POST['pass']));
    if (ControladorCliente::insertCliente($c)) {
        $cliente = ControladorCliente::getCliente($_POST['dni']);
        session_start();
        $_SESSION['cliente'] = $cliente;
        header("Location: index.php");
    } else {
        echo "A ocurrido un error al crear el cliente";
    }
}
?>

<form action="" method="post">
    DNI <input type="text" name="dni"><br>
    Nombre <input type="text" name="nombre"><br>
    Apellidos <input type="text" name="apellidos"><br>
    Direccion <input type="text" name="dir"><br>
    Localidad <input type="text" name="loc"><br>
    Clave <input type="text" name="pass"><br>

    <input type="submit" name="registrar" value="Registrar"> 
    <a href="index"><button>Inicio</button></a>
</form>

