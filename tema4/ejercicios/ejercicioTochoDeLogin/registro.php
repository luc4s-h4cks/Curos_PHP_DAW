<?php

$msg = "";

   if(isset($_POST['login'])){
       header("Location: login.php");
   }

if (isset($_POST['registrar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "personas");
        try {
            $stmt = $conex->prepare("insert into persona values(?,?,?,?,?)");

            $stmt->execute([$_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['pass']]);
            header("Location: login.php?reg=ok");
        } catch (Exception $ex) {
            $msg = "Ese dni ya existe";
        }
    } catch (mysqli_sql_exception $ex) {
        $msg ="error con la conexion del servidor";
    }
}
?>

<form action="" method="post">
    DNI: <input type="text" name="dni"><br>
    Nombre: <input type="text" name="nombre"><br>
    Apellido: <input type="text" name="apellido"><br>
    Email: <input type="text" name="email"><br>
    Contraseña: <input type="text" name="pass"><br>

    <input type="submit" name="login" value="Login">
    <input type="submit" name="registrar" value="Registrar">
</form>

<?= $msg ?>