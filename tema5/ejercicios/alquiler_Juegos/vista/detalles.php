<?php
include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Juego.php';
include_once '../controlador/ControladorAlquiler.php';
include_once '../modelo/Aquiler.php';
include_once '../modelo/Cliente.php';

session_start();

$juego = ControladorJuego::getJuego($_GET['cod']);

if ($juego->alquilado == "SI") {
    $alquilerJuego = ControladorAlquiler::getAquilerJuego($juego->codigo);
    $fi = new DateTime($alquilerJuego->fecha_alquiler);
    $fi->modify("+7 days");
    $ff = $fi->format("Y-m-d");
}

if (isset($_SESSION['cliente'])) {
    $alquiler = new Alquiler(0, $juego->codigo, $_SESSION['cliente']->dni, time(), null);
}

if (isset($_POST['alquilar'])) {
    if (ControladorAlquiler::crearAlquiler($alquiler)) {
        header("Location: index.php");
    } else {
        echo "Algo paso al intentar alquilar el juego";
    }
}



echo "<img src='$juego->imagen' alt='alt'/><br>";
echo "<h4>$juego->nombre_juego</h4>";
echo "<p>Consola: $juego->nombre_consola</p>";
echo "<p>Año: $juego->anio</p>";
echo "<p>Precio: $juego->precio</p>";
echo "<p>Descripcion: $juego->desc</p>";

if ($juego->alquilado == "NO") {
    echo "<p>Disponible para alquilar</p>";
} else if ($juego->alquilado == "SI") {
    echo "<p>Jueo alquilado fecha de devolucion prevista: $ff</p>";
}
if ($juego->alquilado == "NO" && isset($_SESSION['cliente'])) {
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='name' value='$juego->codigo'>";
    echo "<input type='submit' name='alquilar' value='Alquilar'>";
    echo "</form>";
}
?>

<a href="index.php"><button>Volver</button></a>
