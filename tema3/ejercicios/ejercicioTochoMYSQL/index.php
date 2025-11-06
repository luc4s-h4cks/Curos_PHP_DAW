<?php ?>

<a href="introducir.php">Introducir jugador</a><br>
<a href="listar.php">Mostrar jugador</a><br>
<a href="mostrar.php">Buscar jugador</a><br>
<a href="modificar.php">Modificar jugador</a><br>
<a href="borrar.php">Borrar jugador</a><br>

<?php
if (isset($_GET['from'])) {
    echo "<br>======================<br>";
    $origen = $_GET['from'];
    switch ($origen) {
        case "insertar":
            echo "Jugador añadido correctamente";

            break;

        case "modificar":
            echo "Jugador modificado correctamente";

            break;

        case "borrar":
            echo "Jugador borrado correctamente";

            break;

        default:
            break;
    }
}
?>


