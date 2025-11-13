<?php
include 'funciones.php';
$msg = "";

if (isset($_POST['menu'])) {
    backToMenu();
}

if (isset($_POST['actualizar'])) {
    try {
        $conex = getConex();
        $resul = $conex->prepare("update viajes set Fecha=?, Matricula=?, Origen=?, Destino=?, Plazas_Libres=? where Fecha=? and Matricula=? and Origen=? and Destino=? ");
        $resul->bindParam(1, $_POST['fecha']);
        $resul->bindParam(2, $_POST['matricula']);
        $resul->bindParam(3, $_POST['org']);
        $resul->bindParam(4, $_POST['des']);
        $resul->bindParam(5, $_POST['plazasL']);
        $resul->bindParam(6, $_POST['oldfecha']);
        $resul->bindParam(7, $_POST['oldmatricula']);
        $resul->bindParam(8, $_POST['oldorg']);
        $resul->bindParam(9, $_POST['olddes']);
        $resul->execute();
        if ($resul->rowCount()) {
            $msg =  "Acutlaizacion ralizada";
        }
        closeConex($conex);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

if (isset($_POST['borrar'])) {
    try {
        $conex = getConex();
        $resul = $conex->exec("delete from viajes where Fecha='$_POST[fecha]' and Matricula='$_POST[matricula]' and Origen='$_POST[org]' and Destino='$_POST[des]'");
        if ($resul) {
            $msg = "Viaje eliminado correctamente";
        }
        closeConex($conex);
    } catch (PDOException$ex) {
        
    }
}

try {
    $conex = getConex();
    $resul = $conex->query("select * from viajes join autos where viajes.Matricula = autos.Matricula");

    echo "<table border='1'>";
    echo"<tr><th>Fecha</th> <th>Matricula</th> <th>Plazas</th> <th>Origen</th> <th>Destino</th> <th>Plazas libres</th> <th>Operaciones</th> </tr>";
    while ($viaje = $resul->fetchObject()) {
        echo "<form action='' method='post'>";
        echo "<tr>";
        echo "<td>" . $viaje->Fecha . "</td>";
        echo "<input type='hidden' name='fecha' value='$viaje->Fecha'>";

        echo "<td>" . $viaje->Matricula . "</td>";
        echo "<input type='hidden' name='matricula' value='$viaje->Matricula'>";

        echo "<td>" . $viaje->Num_plazas . "</td>";
        echo "<input type='hidden' name='nplazas' value='$viaje->Num_plazas'>";

        echo "<td>" . $viaje->Origen . "</td>";
        echo "<input type='hidden' name='org' value='$viaje->Origen'>";

        echo "<td>" . $viaje->Destino . "</td>";
        echo "<input type='hidden' name='des' value='$viaje->Destino'>";

        echo "<td>" . $viaje->Plazas_libres . "</td>";
        echo "<input type='hidden' name='plazasL' value='$viaje->Plazas_libres'>";

        echo "<td><input type='submit' name='modificar' value='Modificar'><input type='submit' name='borrar' value='Borrar'></td>";
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>";
    echo "<form action='' method='post'>";
    echo "<button><a href='menu.php'>Menu</a></button>";
    echo "</form>";
    closeConex($conex);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

if (isset($_POST['modificar'])) {
    ?>

    <form action="" method="post">
        Fecha: <input type="date" name="fecha" <?= "value='" . $_POST['fecha'] . "'" ?>><br>

        <select name="matricula">

            <?php
            try {
                $conex = getConex();
                $resul = $conex->query("select Matricula from autos");
                while ($auto = $resul->fetchObject()) {
                    if ($auto->Matricula == $_POST['matricula']) {
                        echo "<option value='$auto->Matricula' selected>$auto->Matricula</option>";
                    } else {
                        echo "<option value='$auto->Matricula'>$auto->Matricula</option>";
                    }
                }
                closeConex($conex);
            } catch (Exception $ex) {
                
            }
            ?>
        </select><br>

        Origen: <input type="text" name="org" <?= "value='" . $_POST['org'] . "'" ?>><br>
        Destino: <input type="text" name="des" <?= "value='" . $_POST['des'] . "'" ?>><br>
        Plazas: <?= $_POST['nplazas'] ?>
        <input type="hidden" name="nplazas"><br>
        Plazas Libres: <input type="text" name="plazasL" <?= "value='" . $_POST['plazasL'] . "'" ?>><br>

        <input type="hidden" name="oldfecha" <?= "value='" . $_POST['fecha'] . "'" ?>>
        <input type="hidden" name="oldmatricula" <?= "value='" . $_POST['matricula'] . "'" ?>>
        <input type="hidden" name="oldorg" <?= "value='" . $_POST['org'] . "'" ?>>
        <input type="hidden" name="olddes" <?= "value='" . $_POST['des'] . "'" ?>>

        <input type="submit" name="actualizar" value="Actualizar">


    </form>

    <?php
}

echo $msg;
?>
