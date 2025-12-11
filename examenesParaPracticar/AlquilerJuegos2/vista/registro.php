<?php
include_once '../modelo/Cliente.php';
include_once '../controlador/ControladorCliente.php';
if(isset($_POST['registro'])){
    
    $newUsu = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['localidad'], md5($_POST['pass']));
    if(ControladorCliente::insertCliente($newUsu)){
        session_start();
        $_SESSION['usuario'] = $newUsu;
        header("Location: index.php");
    }else{
        Echo "Paso algo al intentar registrarte";
    }
}
?>

<form action="" method="post">
    DNI: <input type="text" name="dni"><br>
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apellidos"><br>
    Direccion: <input type="text" name="direccion"><br>
    Localidad: <input type="text" name="localidad"><br>
    Contraseña: <input type="text" name="pass"><br>
    <input type="submit" name="registro" value="Resgistrarse">
</form>
<a href="index.php"><button>Inicio</button></a>