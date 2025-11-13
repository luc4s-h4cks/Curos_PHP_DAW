<?php
if (isset($_POST['entrar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "personas");
        $stmt = $conex->prepare("select email, pass from persona where email=?");
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        $resul = $stmt->get_result();

        if ($resul->num_rows) {
            $persona = $resul->fetch_object();

            if ($persona->pass == md5($_POST['pass'])) {
                setcookie("nombre", $persona->Nombre);
                setcookie("apellido", $persona->Apellido);
                header("Location: logeado.php");
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "emil incorrecto";
        }
    } catch (mysqli_sql_exception $ex) {
        echo $ex->getMessage();
    }
}
?>

<form action="" method="post">
    Email: <input type="text" name="email"><br>
    Contraseña: <input type="text" name="pass"><br>
    <br>
    <input type="submit" name="entrar" value="Entrar">
</form>

