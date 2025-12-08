<?php
include_once '../controlador/ControladorAlquiler.php';
include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Aquiler.php';
include_once '../modelo/Cliente.php';
include_once '../modelo/Juego.php';

session_start();

$dni = $_SESSION['cliente']->dni;

$alquileres = ControladorAlquiler::getAlquileresUsuario($dni);

if(isset($_POST['devolver'])){
    $alquiler_devuelto = ControladorAlquiler::getAquiler($_POST['id']);
    
    $fecha_devo = date("Y-m-d", time());
    
    if(ControladorAlquiler::juegoDevuelto($alquiler_devuelto->id, $fecha_devo)){
        
        echo "Juego devuelto";
        
    }else{
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
        echo "<td></td> <td>$juego->nombre_juego</td> <td>$juego->nombre_consola</td> <td>$juego->anio</td> <td>$alq->fecha_alquiler</td><td>$fechaPrevista</td>";
        if ($alq->fecha_devo == null) {
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='id' value='$alq->id'>";
            echo "<td><input type='submit' name='devolver' value='devolver'></td>";
            echo "</form>";
        } else {
            echo "<td>$alq->fecha_devo</td>";
        }
        echo "<td>$juego->precio</td> <td></td>";
        echo "</tr>";
    }
    ?>

</table>
