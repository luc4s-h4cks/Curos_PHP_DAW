<?php
include 'funsiones.php';

$msg = "";

if (isset($_POST['menu'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['insertar'])) {
    $nombre = validarNombre($_POST['nombre']);
    $dni = validarDni($_POST['dni']);
    $equipo = validarEquipo($_POST['equipo']);
    $goles = validarGoles($_POST['goles']);
    $posicion = (isset($_POST['pos'])) ? true : false;
}

if (isset($_POST['insertar']) && $nombre && $dni && $equipo && $goles && $posicion) {
    try {
        $conex = getConex();
        try {
            $stmt = $conex->prepare("insert into jugador values(?,?,?,?,?,?)");
            $pos = implode(",", $_POST['pos']);
            $stmt->bind_param("ssissi", $_POST['nombre'], $_POST['dni'], $_POST['dorsal'], $pos, $_POST['equipo'], $_POST['goles']);
            $stmt->execute();
            
            $_POST['msg'] = "Jugador introducido";
            header("Location: index.php?from=insertar");
            exit;
        } catch (mysqli_sql_exception $ex) {
            $msg = "Ese DNI ya existe en la base de datos";
        }
    } catch (mysqli_sql_exception $ex) {
        $msg = "error al conectar con el servidor";
    }
}
?>

<form action="" method="post">
    Nombre: <input type="text" name="nombre" <?php if (isset($_POST['insertar']) && $nombre) echo "value='$_POST[nombre]'" ?>> 
    <?php if (isset($_POST['insertar']) && !$nombre) echo "<span style='color: red;'>EL nombre esta </span>" ?><br>

    DNI: <input type="text" name="dni" <?php if (isset($_POST['insertar']) && $dni) echo "value='$_POST[dni]'" ?>> 
    <?php if (isset($_POST['insertar']) && !$dni) echo "<span style='color: red;'>El DNI no cumple con el formato</span>" ?><br>

    <select name="dorsal">
        <?php
        for ($i = 1; $i <= 11; $i++) {
            if (isset($_POST['insertar']) && $_POST['dorsal'] == $i) {
                echo "<option value=" . $i . " selected>" . $i . "</option>";
            } else {
                echo "<option value=" . $i . ">" . $i . "</option>";
            }
        }
        ?>
    </select><br>

    <select multiple="" name="pos[]">
        <option value="portero" <?php if (isset($_POST['insertar']) && $posicion && in_array("portero", $_POST['pos'])) echo "selected" ?>>Portero</option>
        <option value="defensa" <?php if (isset($_POST['insertar']) && $posicion && in_array("defensa", $_POST['pos'])) echo "selected" ?>>Defensa</option>
        <option value="centrocampista" <?php if (isset($_POST['insertar']) && $posicion && in_array("centrocampista", $_POST['pos'])) echo "selected" ?>>Centrocampista</option>
        <option value="delantero" <?php if (isset($_POST['insertar']) && $posicion && in_array("delantero", $_POST['pos'])) echo "selected" ?>>Delantero</option>
    </select><?php if (isset($_POST['insertar']) && !$posicion) echo "<span style='color: red;'>Selecione al menos un posicion</span>" ?> <br>

    Equipo: <input type="text" name="equipo" <?php if (isset($_POST['insertar']) && $equipo) echo "value='$_POST[equipo]'" ?>> 
    <?php if (isset($_POST['insertar']) && !$equipo) echo "<span style='color: red;'>No puede estar vacio</span>" ?><br>

    Goles: <input type="text" name="goles" <?php if (isset($_POST['insertar']) && $goles) echo "value='$_POST[goles]'" ?>> 
    <?php if (isset($_POST['insertar']) && !$goles) echo "<span style='color: red;'>Solo numeros</span>" ?><br>

    <input type="hidden" name="msg">

    <input type="submit" name="menu" value="Menu">
    <input type="submit" name="insertar" value="Insertar">

</form>

<?php
echo $msg;
?>
