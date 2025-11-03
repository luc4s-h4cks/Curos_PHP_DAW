<?php
include 'funsiones.php';

$dni = false;
if (isset($_POST['buscar'])) {
    $dni = validarDni($_POST['dni']);
}

if(isset($_POST['menu'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['modificar'])){
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
        $stmt = $conex->prepare("update jugador set Nombre = ?, DNI = ?, Dorsal = ?, Posicion = ?, Equipo = ?, Goles = ? where DNI = ?");
        $pos = implode(",", $_POST['pos']);
        $stmt ->bind_param("ssissis", $_POST['nombre'], $_POST['dni'], $_POST['dorsal'], $pos, $_POST['equipo'], $_POST['goles'], $_POST['clave']);
        $stmt ->execute();
        if($stmt -> affected_rows){
            header("Location: index.php?from=modificar");
            exit;
        }
        
    } catch (Exception $ex) {
        
    }
}

?>

<h2>Modificar jugador</h2>
<form action="" method="post">
    Buscar Jugador(DNI)<input type="text" name="dni">
    <?php if (isset($_POST['buscar']) && !$dni) echo "<span style='color: red;'>El DNI no cumple con el formato correcto </span>" ?><br>
    <input type="submit" name="menu" value="Menu">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST['buscar']) && $dni) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
        $stmt = $conex->prepare("select * from jugador where DNI = ?");
        $stmt->bind_param("s", $_POST['dni']);
        $stmt->execute();
        $resul = $stmt->get_result();
        if ($resul->num_rows) {
            $jugador = $resul->fetch_object();
            $posiciones = explode(",", $jugador->Posicion);
            ?>

            <form action='' method='post'>
                Nombre <input type='text' name='nombre' value='<?= $jugador->Nombre ?>'><br>
                DNI <input type='text' name='dni' value='<?= $jugador->DNI ?>'><br>
                <input type="hidden" name="clave" <?php echo "value='$_POST[dni]'" ?>>

                <select name='dorsal'>
                    <?php for ($i = 1; $i <= 11; $i++) { ?>
                        <option value='<?= $i ?>' <?= $jugador->Dorsal == $i ? 'selected' : '' ?>><?= $i ?></option>
                    <?php } ?>
                </select><br>

                <select name='pos[]' multiple>
                    <option value='portero' <?php if(in_array("portero", $posiciones)) echo "selected" ?>>Portero</option>
                    <option value='defensa' <?php if(in_array("defensa", $posiciones)) echo "selected" ?>>Defensa</option>
                    <option value='centrocampista' <?php if(in_array("centrocampista", $posiciones)) echo "selected" ?>>Centrocampista</option>
                    <option value='delantero' <?php if(in_array("delantero", $posiciones)) echo "selected" ?>>Delantero</option>
                </select><br>

                Equipo <input type='text' name='equipo' value='<?= $jugador->Equipo ?>'><br>
                Equipo <input type='text' name='goles' value='<?= $jugador->Goles ?>'><br>
                <input type="submit" name="modificar" value="Modificar">
                <input type="submit" name="cancelar" value="Cancelar">
            </form>

            <?php
        }else{
            echo "No se a encontrado un jugador con ese DNI";
        }
    } catch (Exception $ex) {
        
    }
}


