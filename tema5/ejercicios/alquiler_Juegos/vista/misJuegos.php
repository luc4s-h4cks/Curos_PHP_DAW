<?php
include_once '../controlador/ControladorAlquiler.php';
include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Aquiler.php';
include_once '../modelo/Cliente.php';
include_once '../modelo/Juego.php';

session_start();

$dni = $_SESSION['cliente']->dni;

$alquileres = ControladorAlquiler::getAlquileresUsuario($dni);

if (isset($_POST['devolver'])) {
    $alquiler_devuelto = ControladorAlquiler::getAquiler($_POST['id']);

    $fecha_devo = date("Y-m-d", time());
    $fecha_ini = $alquiler_devuelto->fecha_alquiler;

    if (ControladorAlquiler::juegoDevuelto($alquiler_devuelto->id, $fecha_devo)) {

        $ini = new DateTime($fecha_ini);
        $plazo = clone $ini;
        $plazo->modify("+7 days");

        $entrega = new DateTime($fecha_devo);

        if ($entrega > $plazo) {
            $diff = $plazo->diff($entrega);
            $dias_retraso = $diff->days;
        } else {
            $dias_retraso = 0;
        }

        echo "Juego devuelto correctamente<br>";
        echo "Costo alquiler: 10<br>";
        echo "Retraso ($dias_retraso días)<br>";
        echo "Total: " . (10 + $dias_retraso) . "€";
    } else {
        echo "Paso algo durante la devolucion";
    }
}
?>

<table border='1px'>
    <tr>
        <th>Caratula</th>
        <th>Nombre</th>
        <th>Consola</th>
        <th>Año</th>
        <th>Fecha de alquiler</th>
        <th>Fecha prevista de debolucion</th>
        <th>Fecha debolucion</th>
        <th>Precio</th>
        <th>Abonado</th>
    </tr>

    <?php
    foreach ($alquileres as $alq) {
        $juego = ControladorJuego::getJuego($alq->cod_juego);

        $fechaIni = new DateTime($alq->fecha_alquiler);
        $fechaIni->modify('+7 days');
        $fechaPrevista = $fechaIni->format('Y-m-d');

        echo "<tr>";
        echo "<td><img src='$juego->imagen' alt='alt' width='75' height='75' /></td> <td>$juego->nombre_juego</td> <td>$juego->nombre_consola</td> <td>$juego->anio</td> <td>$alq->fecha_alquiler</td><td>$fechaPrevista</td>";
        if ($alq->fecha_devo == null) {
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='id' value='$alq->id'>";
            echo "<td><input type='submit' name='devolver' value='devolver'></td>";
            echo "</form>";
        } else {
            echo "<td>$alq->fecha_devo</td>";
        }
        echo "<td>$juego->precio</td>";
        if ($alq->fecha_devo != null) {
            $fecha_ini = $alq->fecha_alquiler;
            $devo = $alq->fecha_devo;
            
            $inicio = new DateTime($fecha_ini);
            $entrega = new DateTime($devo);
            $diferencia = $entrega->diff($inicio);
            $diasR = $diferencia->days;
            $extra = 0;
            if($diasR-7 > 0){
                $extra = 10 + ($diasR-7);
            }
            
            echo "<td>".(10+$extra)."</td>";
        } else {
            echo "<td></td>";
        }
        echo "</tr>";
    }
    ?>

</table>
