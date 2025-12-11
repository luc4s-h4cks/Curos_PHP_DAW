<?php
include_once '../modelo/Cliente.php';
include_once '../controlador/ControladorJuegos.php';
session_start();

$usu;

if (!isset($_SESSION['usuario'])) {
    ?>
    <a href="login.php"><button>Login</button></a>
    <a href="registro.php"><button>Registrarse</button></a>

    <?php
} else {
    $usu = $_SESSION['usuario'];
    Echo "<h4>Hola $usu->nombre</h4>";
    ?>
    <form action="cerrar.php">
        <input type="submit" name="cerrar" value="Cerrar sesion">
    </form>
    <a href="index.php">Todos</a>
    <a href="index.php?filtro=alquilados">Alquilados</a>
    <a href="index.php?filtro=noAlquilados">No alquilados</a>
    <a href="misJuegos.php">Mis juegos</a>

    <?php
}

if (isset($_SESSION['usuario']) && $usu->tipo == "admin") {
    echo "<a href='nuevoJuego.php'>Nuevo Juegos</a>";
}

if (isset($_GET['status'])) {
    if ($_GET['status'] == "ok") {
        echo "<br>Accion ejecutada correctamente";
    } else {
        echo "Algo salio mal";
    }
}

if (isset($_GET['filtro'])) {
    if ($_GET['filtro'] == "alquilados") {
        $juegos = ControladorJuegos::getAllAlquilados();
    }

    if ($_GET['filtro'] == "noAlquilados") {
        $juegos = ControladorJuegos::getAllNoAlquilados();
    }
} else {
    $juegos = ControladorJuegos::getAll();
}

foreach ($juegos as $j) {
    ?>

    <form action="modificar_borrar.php" method="post">
        <h3><?= $j->nombreJ ?></h3>
        <a href="detalles.php?cod=<?= $j->codigo ?>"><img <?= "src='$j->imagen'" ?> width="200px" height="200px" alt="alt"/></a>
        <br>
        <input type="hidden" name="cod" <?= "value='$j->codigo'" ?>>
        <?php
        if (isset($_SESSION['usuario']) && $usu->tipo == "admin") {
            echo "<input type='submit' name='modificar' value='Modificar'>";
            echo "<input type='submit' name='borrar' value='Borrar'>";
        }
        ?>

    </form>

    <?php
}






