<?php
$msg = "";

if (isset($_POST['acceder'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "personas");
        $stmt = $conex->prepare("select * from persona where Email = ?");
        $stmt->execute([$_POST['email']]);
        $resul = $stmt->get_result();
        if ($resul->num_rows) {

            $persona = $resul->fetch_object();

            if (password_verify($_POST['pass'], $persona->pass)) {
                setcookie("nombre", $persona->Nombre, time() + 3600 * 24 * 365);
                setcookie("apellido", $persona->Apellido, time() + 3600 * 24 * 365);
                setcookie("email", $persona->email, time() + 3600 * 24 * 365);
                setcookie("pass", $_POST['pass'], time() + 3600 * 24 * 365);
                setcookie("logeado", 1, time() + 3600 * 24 * 365);
                

                if (isset($_POST['recordar'])) {
                    setcookie("recordar", 1);
                } else {
                    setcookie("recordar", 0);
                }

                header("Location: index.php");
                exit;
            } else {
                $msg = "Usuario y/o contraseña incorrectos";
            }
        } else {
            $msg = "Usuario y/o contraseña incorrectos";
        }
    } catch (Exception $ex) {
        
    }
}
?>

<form action="" method="post">
    Email: <input type="text" name="email" <?php if (isset($_COOKIE['recordar'])) echo "value='$_COOKIE[email]'" ?> ><br>
    Contraseña: <input type="text" name="pass" <?php if (isset($_COOKIE['recordar'])) echo "value='$_COOKIE[pass]'" ?>><br>
    Recordarme <input type="checkbox" name="recordar" <?php if (isset($_COOKIE['recordar'])) echo "checked" ?>><br>

    <input type="submit" name="acceder" value="Acceder">
    <input type="submit" name="regitrar" value="Registrase">
</form>

<?php
echo $msg;


?>