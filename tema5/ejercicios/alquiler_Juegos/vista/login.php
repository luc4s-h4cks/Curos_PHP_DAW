<?php
    include_once '../controlador/ControladorCliente.php';
    include_once '../controlador/ConexionJuegos.php';
    
    if(isset($_POST['entrar'])){
        if(ControladorCliente::verificarUsuario($_POST['dni'], $_POST['pass'])){
            $cliente = ControladorCliente::getCliente($_POST['dni']);
            session_start();
            $_SESSION['cliente'] = $cliente;
            header("Location: index.php");
            echo "login";
        }else{
            echo "contraseña mal";
        }
    }

?>
<form action="" method="post">
DNI <input type="text" name="dni"><br>
Clave <input type="text" name="pass"><br>

<input type="submit" name="entrar" value="Entrar">
<a href="index.php"><button>Inicio</button></a>
</form>