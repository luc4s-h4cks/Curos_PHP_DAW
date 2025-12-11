<?php
include_once '../controlador/ControladorJuegos.php';
include_once '../modelo/Juego.php';
include_once '../modelo/Alquiler.php';
include_once '../controlador/ControladorAlquileres.php';
include_once '../modelo/Cliente.php';
$juego = ControladorJuegos::getJuego($_GET['cod']);
session_start();

if (isset($_POST['alquilar'])) {
    $hoy = date("Y-m-d");
    $dni = $_SESSION['usuario']->dni;
    $newAlquiler = new Alquiler(0, $_POST['cod'], $dni, $hoy, 0);
    if (ControladorAlquileres::crearAlquiler($newAlquiler) && ControladorJuegos::alquilar($_POST['cod'])) {
       header("Location: index.php?status=ok");
    } else {
        header("Location: index.php?status=err");
    }
}
?>

<img src="<?= $juego->imagen ?>" width="400px" height="400px" alt="alt"/>
<h3><?= $juego->nombreJ ?></h3>
<p>Consola: <?= $juego->nombreC ?></p>
<p>Consola: <?= $juego->anio ?></p>
<p>Consola: <?= $juego->precio ?></p>
<p>Consola: <?= $juego->descripcion ?></p>

<?php
if ($juego->alquilado == "NO") {
    echo "Disponible para alquilar";
} else {
    $alquiler = ControladorAlquileres::getAlquilerSinDevolver($juego->codigo);
    $fecha = $alquiler->fechaIni;
    $dt = new DateTime($fecha);
    $dt->modify('+7 days');
    $fechaPrevista = $dt->format("Y-m-d");
    echo "Alquilado: fecha previta para su devolucion: $fechaPrevista";
}
?>

<form action="" method="post">
    <input type="hidden" name="cod" value="<?= $juego->codigo ?>">
    <input type="submit" name="alquilar" value="Alquilar" <?php echo $juego->alquilado == "SI" ? "disabled" : "" ?>>
</form>
<a href="index.php"><button>Volver</button></a>
