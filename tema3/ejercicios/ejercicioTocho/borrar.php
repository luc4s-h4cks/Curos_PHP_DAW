<?php
include 'funsiones.php';

$dni = false;
if (isset($_POST['buscar'])) {
    $dni = validarDni($_POST['dni']);
}

if (isset($_POST['menu'])) {
    header("Location: index.php");
    exit;
}

if(isset($_POST['borrar'])){
    $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
    $conex->query("Delete from jugador where DNI = '$_POST[clave]'");
    if($conex->affected_rows){
        header("Location: index.php?from=borrar");
    }
}

?>

<h2>Borrar jugador</h2>
<form action="" method="post">
    Buscar Jugador(DNI)<input type="text" name="dni">
    <?php if (isset($_POST['buscar']) && !$dni) echo "<span style='color: red;'>El DNI no cumple con el formato correcto </span>" ?><br>
    <input type="submit" name="menu" value="Menu">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST['buscar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
        $stmt = $conex->prepare("select * from jugador where DNI = ?");
        $stmt->bind_param("s", $_POST['dni']);
        $stmt->execute();
        $resul = $stmt->get_result();
        if ($resul->num_rows) {
            $jugador = $resul->fetch_object();
            ?>
            <form action="" method="post">
                <p>Nombre: <?= $jugador->Nombre ?></p>
                <p>Posiciones: <?= $jugador->Posicion ?></p>
                <p>Equipo: <?= $jugador->Equipo ?></p>
                <p>Goles: <?= $jugador->Goles ?></p>

                <input type='hidden' name='clave' <?= "value='$jugador->DNI'" ?>>
                <input type="submit" name="borrar" value="Borrar">
                <input type="submit" name="cancelar" value="Cancelar">
            </form>
            <?php
        } else {
            echo "No se a encontrado nungun jugador con el DNI: " . $_POST['dni'];
        }
    } catch (Exception $ex) {
        
    }
}
?>

