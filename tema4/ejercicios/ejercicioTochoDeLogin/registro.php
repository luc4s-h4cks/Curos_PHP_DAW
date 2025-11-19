<?php
$msg = "";

$dni = false;
$nombre = false;
$apellido = false;
$email = false;
$pass = false;

if (isset($_POST['registrar'])) {
    if (preg_match('/^\d{8}[a-zA-Z]{1}$/', $_POST['dni'])) {
        $dni = true;
    }

    if (preg_match('/[a-zA-Z]+/', $_POST['nombre'])) {
        $nombre = true;
    }

    if (preg_match('/[a-zA-Z]+/', $_POST['apellido'])) {
        $apellido = true;
    }

    if (preg_match('/^[a-zA-Z0-9]+@[a-z0-9]+\.[a-z]+$/', $_POST['email'])) {
        $email = true;
    }

    if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]{8,}$/', $_POST['pass'])) {
        $pass = true;
    }

    if (isset($_POST['login'])) {
        header("Location: login.php");
    }
}

if (isset($_POST['registrar']) && $dni && $nombre && $apellido && $email && $pass) {

    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "personas");
        try {
            $stmt = $conex->prepare("insert into persona values(?,?,?,?,?)");

            $stmt->execute([$_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], password_hash($_POST['pass'], PASSWORD_DEFAULT)]);
            header("Location: login.php?reg=ok");
        } catch (Exception $ex) {
            $msg = "Ese dni ya existe";
        }
    } catch (mysqli_sql_exception $ex) {
        $msg = "error con la conexion del servidor";
    }
}
?>

<form action="" method="post">
    DNI: <input type="text" name="dni">
    <?php if(isset($_POST['registrar']) && !$dni) echo "<span>El DNI tiene que tenr 8 numeros y una letra</span>" ?>
    <br>
    
    Nombre: <input type="text" name="nombre">
    <?php if(isset($_POST['registrar']) && !$nombre) echo "<span>No puede estar vacio o contener numeros</span>" ?>
    <br>
    
    Apellido: <input type="text" name="apellido">
    <?php if(isset($_POST['registrar']) && !$apellido) echo "<span>No puede estar vacio o contener numero</span>" ?>
    <br>
    
    Email: <input type="text" name="email">
    <?php if(isset($_POST['registrar']) && !$email) echo "<span>No tiene el formao de una correo electronico</span>" ?>
    <br>
    
    Contraseña: <input type="text" name="pass">
    <?php if(isset($_POST['registrar']) && !$pass) echo "<span>Debe contener al menos 8 caratceres entre ellos letras y numeros</span>" ?>
    <br>
    

    <input type="submit" name="login" value="Login">
    <input type="submit" name="registrar" value="Registrar">
</form>

<?= $msg ?>