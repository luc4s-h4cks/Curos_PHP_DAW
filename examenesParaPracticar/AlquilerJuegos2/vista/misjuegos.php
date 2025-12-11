<?php
include_once '../controlador/ControladorAlquileres.php';
include_once '../controlador/ControladorJuegos.php';
include_once '../modelo/Alquiler.php';
include_once '../modelo/Juego.php';
include_once '../modelo/Cliente.php';
session_start();

if (isset($_POST['devolver'])) {
    $hoy = new DateTime();
    $alquiler = ControladorAlquileres::getAlquilerId($_POST['id']);
    $fecha_inicial = new DateTime($alquiler->fechaIni);
    $prevista = $fecha_inicial->modify("+7 days");
    if ($hoy > $prevista) {
        $dias_diferencia = $prevista->diff($hoy);
        $pago = 10 + $dias_diferencia;
    } else {
        $pago = 10;
    }

    if (ControladorAlquileres::devolverJuego($_POST['id'], $hoy->format("Y-m-d")) && ControladorJuegos::devolver($alquiler->codJuego)) {
        echo "Juego devuelto correctamente";
        echo "pago: 10";
        echo "mas retraso: $dias_diferencia ";
        echo "Total: $pago €";
    }
}
$misJuegos = ControladorAlquileres::getAlquileresUsuario($_SESSION['usuario']->dni);
?>

<table border='1px'>
    <tr>
        <th>Caratula</th>
        <th>Nombre</th>
        <th>Consola</th>
        <th>Año</th>
        <th>Fecha alquiler</th>
        <th>Fecha prevista de devolucion</th>
        <th>Fecha devolucion</th>
        <th>Precio</th>
        <th>Abonado</th>
    </tr>
<?php
foreach ($misJuegos as $alq) {
    $juego = ControladorJuegos::getJuego($alq->codJuego);
    $ini = $alq->fechaIni;
    $dt = new DateTime($ini);

    $dt->modify("+7 days");
    $fechaPrevista = $dt->format("Y-m-d");

    if ($alq->fechaDev != null) {
        $devo = new DateTime($alq->fechaDev);
        if ($devo > $dt) {
            $diff = $dt->diff($devo);
            $abonado = 10 + $diff->days;
        } else {
            $abonado = 10;
        }
    } else {
        $abonado = "";
    }
    ?>

        <tr>
            <td><img src="<?= "$juego->imagen" ?>" width="75px" height="75px" alt="alt"/></td>
            <td><?= "$juego->nombreJ" ?></td>
            <td><?= "$juego->nombreC" ?></td>
            <td><?= "$juego->anio" ?></td>
            <td><?= "$alq->fechaIni" ?></td>
            <td><?= $fechaPrevista ?></td>
    <?php
    if ($alq->fechaDev != null) {
        echo "<td>$alq->fechaDev</td>";
    } else {
        ?>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= "$alq->id" ?>">
                        <input type="submit" name="devolver" value="Devolver">
                    </form>
                </td>
        <?php
    }
    ?>
            <td><?= "$juego->precio" ?></td>
            <td><?= "$abonado" ?></td>
        </tr>

    <?php
}
?>
</table>