<?php
include_once '../modelo/EmpleadoTaller.php';
include_once '../controlador/ControladorCoches.php';
include_once '../modelo/Coche.php';
include_once '../modelo/ClienteTaller.php';
include_once '../controlador/controladorCliente.php';
include_once '../controlador/ControladorTarea.php';
include_once '../modelo/Tarea.php';
include_once '../controlador/ControladorEmpleado.php';
include_once '../modelo/EmpleadoTaller.php';
session_start();

if (!isset($_SESSION['empleado'])) {
    header("Location: login.php");
}
$emp = $_SESSION['empleado'];
echo "Hola $emp->nombre <br>";
echo"$emp->rol <br>";

$dniValido = false;
$matriculaValida = false;
$telfValido = false;
$imgValida = false;
$tareasValidas = false;
if (isset($_POST['registrar'])) {

    var_dump($_POST['registrar']);
    if (preg_match("/^[0-9]{4}[A-Za-z]{3}$/", $_POST['matricula'])) {
        $matriculaValida = true;
    }

    if (preg_match("/^[0-9]{4}[A-Za-z]{3}$/", $_POST['dni'])) {
        $dniValido = true;
    }

    if (preg_match("/^[0-9]{9}$/", $_POST['telf'])) {
        $telfValido = true;
    }
}

if (isset($_POST['registrar'])) {

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fichero = time() . "-" . $_POST['matricula'];
        $ruta = "../coches/" . $fichero;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
    }
    


    $newCoche = new Coche($_POST['matricula'], $_POST['marca'], $_POST['modelo'], $_POST['km'], $ruta, $_POST['dni']);
    $newCliente = new ClienteTaller($_POST['dni'], $_POST['nombre'], $_POST['direc'], $_POST['telf']);
    if (ControladorCoches::getCoche($newCoche->matricula) != null) {
        if (ControladorCoches::updateCoche($newCoche)) {
            var_dump($newCliente);
            if (ControladorCliente::updateCliente($newCliente, $_POST['oldDni'])) {
                header("Location: index.php");
            }
        }
    } else {
        if (ControladorCoches::insertCoche($newCoche)) {
            if (ControladorCliente::updateCliente($newCliente, $_POST['oldDni'])) {
                header("Location: index.php");
            }
        }
    }
}
/**
  if (isset($_POST['registrar']) && $dniValido && $telfValido && $matriculaValida && $tareasValidas) {
  echo Correcto;
  }else{
  echo "Algo falla";
  echo "1".$dniValido;
  echo "2".$telfValido;
  echo "3".$matriculaValida;
  echo "4".$tareasValidas;
  }
 * 
 */
?>
<a href=""><button>Cerrar sesion</button></a><br>

<form action="" method="post">
    DNI: <input type="text" name="dni"> <input type="submit" name="buscar" value="Buscar">

</form>


<?php
if (isset($_POST['buscar'])) {
    $coches = ControladorCoches::getCochesCliente($_POST['dni']);
    if (count($coches) == 0) {
        echo "No tiene coches";
    } else {
        ?>
        <table border="1px">
            <tr>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
            </tr>
        <?php
        foreach ($coches as $c) {
            echo "<tr>";
            ?>
                <form action="" method="post">
                    <td><?= $c->matricula ?></td>
                    <td><?= $c->marca ?></td>
                    <td><?= $c->modelo ?></td>
                    <input type="hidden" name="mat" value="<?= $c->matricula ?>">
                    <td><input type="submit" name="selec" value="Seleccionar"></td>
                </form>
            <?php
            echo "</tr>";
        }
    }
    ?>
    </table>

    <form action="" method="post">
        <input type="submit" name="nuevo" value="Nuevo">
    </form>

    <?php
}

if (isset($_POST['selec'])) {
    $hayCoche = false;
    $codSelect = ControladorCoches::getCoche($_POST['mat']);
    $propoetario = ControladorCliente::getCliente($codSelect->cliente);
    if ($codSelect != null) {
        $hayCoche = true;
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">

        Matricula: <input type="text" name="matricula" <?php if ($hayCoche) echo "value='$codSelect->matricula'" ?>>
        Marca: <input type="text" name="marca"<?php if ($hayCoche) echo "value='$codSelect->marca'" ?> required>
        Modelo: <input type="text" name="modelo"<?php if ($hayCoche) echo "value='$codSelect->modelo'" ?> required>
        Km: <input type="number" name="km"<?php if ($hayCoche) echo "value=$codSelect->km" ?> required>
        Foto: <input type="file" name="foto"><br>
        DNI: <input type="text" name="dni" value="<?= $propoetario->dni ?>" required>
        Nombre: <input type="text" name="nombre" value="<?= $propoetario->nombre ?>" required>
        Direccion: <input type="text" name="direc" value="<?= $propoetario->direccion ?>" required>
        Telefono: <input type="number" name="telf" value="<?= $propoetario->telefono ?>" required><br>
        <input type="hidden" name="oldDni" <?= $propoetario->dni ?>>


        <h3>Tareas</h3>
        Mantenimiento<br>
        <select name="mante[]" multiple>
    <?php
    $tareasM = ControladorTarea::getTareas("Mantenimiento");
    foreach ($tareasM as $t) {
        echo "<option value='$t->id'>$t->descripcion</option>";
    }
    ?>
        </select><br>

        Mantenimiento<br>
        <select name="rep[]" multiple>
    <?php
    $tareasR = ControladorTarea::getTareas("Reparación");
    foreach ($tareasR as $t) {
        echo "<option value='$t->id'>$t->descripcion</option>";
    }
    ?>
        </select><br>

        Mantenimiento<br>
        <select name="diag[]" multiple>
    <?php
    $tareasD = ControladorTarea::getTareas("Electrónica");
    foreach ($tareasD as $t) {
        echo "<option value='$t->id'>$t->descripcion</option>";
    }
    ?>
        </select><br>

        Mecanico <select name="mecanico">
    <?php
    $mecas = ControladorEmpleado::getMecanicos();

    foreach ($mecas as $m) {
        echo "<option value='$m->codigo'>$m->nombre</option>";
    }
    ?>
        </select>

        <input type="submit" name="registrar" value="Registrar">

    </form>
    <?php
}
?>
