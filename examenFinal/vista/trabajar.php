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
include_once '../controlador/controladorTrabajos.php';
include_once '../modelo/Trabajo.php';
session_start();

if (!isset($_SESSION['empleado'])) {
    header("Location: login.php");
}
$emp = $_SESSION['empleado'];
echo "Hola $emp->nombre <br>";
echo"$emp->rol <br>";

if (isset($_POST['actualizarTrabajo'])) {
    $newTrabajo = new Trabajo($_POST['matricula'], $_POST['mecanico'], $_POST['tarea'], $_POST['estado'], $_POST['horas'], $_POST['fecha']);
    var_dump($newTrabajo);
    ControladorTrabajos::updateTrabajo($newTrabajo);
}
?>
<a href = "menu.php"><button>Menu</button></a>
<a href = "cerrar.php"><button>Cerrar sesion</button></a>
<?php
if ($emp->rol == "mecanico") {
    $trabajos = ControladorTrabajos::getTrabajoMecanico($emp->codigo);
    if (count($trabajos) > 0) {
        echo "<table border='1px'>";
        echo "<tr><th>Matricula</th> <th>Tarea</th> <th>Estado</th> <th>Horas</th></tr>";
        foreach ($trabajos as $t) {
            $tarea = ControladorTarea::getTarea($t->tarea);
            $estado = $t->estado;
            ?>
            <form action="" method="post">
                <tr>
                    <td><?= $t->matricula ?></td>
                    <td><?= $tarea->descripcion ?></td>
                    <td>
                        <select name='estado'>
                            <option value="Pendiente" <?php if ($estado == "Pendiente") echo "selected" ?>>Pendiente</option>
                            <option value="En proceso" <?php if ($estado == "En proceso") echo "selected" ?>>En proceso</option>
                            <option value="Completado" <?php if ($estado == "Completado") echo "selected" ?>>Completado</option>
                            <option value="Facturado" <?php if ($estado == "Facturado") echo "selected" ?>>Facturado</option>
                        </select>

                    </td>
                <input type='hidden' name="matricula" value="<?= $t->matricula ?>">
                <input type='hidden' name='mecanico' value="<?= $t->mecanico ?>">
                <input type='hidden' name='tarea' value="<?= $t->tarea ?>">
                <input type='hidden' name='fecha' value="<?= $t->fecha ?>">
                <td><input type="number" name="horas" value="<?= $t->horas ?>"></td>
                <td><input type="submit" name="actualizarTrabajo" value="Actualizar"></td>
            </tr>
            </form>
            <?php
        }
        echo "</table>";
    } else {
        echo "no tienes tareas";
    }
}

if($emp->rol == "admin"){
    
}
