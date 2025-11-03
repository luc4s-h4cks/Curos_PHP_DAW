<?php
include 'funsiones.php';
?>
<form action="" method="post">

    Buscar por
    <select name="filtro">
        <option value="Equipo">Equipo</option>
        <option value="Posicion">Posicion</option>
        <option value="DNI">DNI</option>
    </select>
    <br>

    Valor a buscar<input type="text" name="valor"><br>

    <input type="submit" name="menu" value="Menu">
    <input type="submit" name="buscar" value="Buscar">

</form>

<?php
if (isset($_POST['menu'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['buscar'])) {
    try {
        $conex = getConex();
        try {
            $stmt = $conex->prepare("select Nombre from jugador where $_POST[filtro] = ?");
            $stmt->bind_param("s", $_POST['valor']);
            $stmt->execute();
            $resul = $stmt->get_result();
            if ($resul->num_rows) {
                echo "Jugadores encontrados<br>";
                while ($jugador = $resul->fetch_object()) {
                    echo $jugador->Nombre;
                    echo "<br>=================<br>";
                }
            } else {
                Echo "No hay jugadores";
            }
        } catch (Exception $ex) {
            
        }
    } catch (mysqli_sql_exception $ex) {
        echo "Error con la conexion del servidor";
    }
}
?>

