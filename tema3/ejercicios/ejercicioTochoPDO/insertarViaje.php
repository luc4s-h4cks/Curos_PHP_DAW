<?php
include 'funciones.php';

try {
    $conex = getConex();
} catch (Exception $ex) {
    
}
?>



<h1>Nuevo viaje</h1>
<form action="" method="post">
    Fecha: <input type="date" name="fecha"><br>

    <select name="matricula">

        <?php
        try {

            $resul = $conex->query("select Matricula from autos");
            while ($auto = $resul->fetchObject()) {
                echo "<option value='$auto->Matricula'>$auto->Matricula</option>";
            }
        } catch (Exception $ex) {
            
        }
        ?>
    </select><br>

    Origen: <input type="text" name="org"><br>
    Destino: <input type="text" name="des"><br>

    <button><a href="menu.php">Menu</a></button>
    <input type="submit" name="agregar" value="Añadir">


</form>

<?php
if (isset($_POST['agregar'])) {
    $plazas = 0;
    try {

        $resul = $conex->query("select Num_plazas from autos where Matricula= '$_POST[matricula]'");
        $num = $resul->fetchObject();
        $plazas = $num->Num_plazas;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    try {

        $resul = $conex->prepare("insert into viajes values(?,?,?,?,?)");
        $resul->bindParam(1, $_POST['fecha']);
        $resul->bindParam(2, $_POST['matricula']);
        $resul->bindParam(3, $_POST['org']);
        $resul->bindParam(4, $_POST['des']);
        $resul->bindParam(5, $plazas);
        $resul->execute();
        if ($resul->rowCount()) {
            echo "Viaje añadido correctamente";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
?>

