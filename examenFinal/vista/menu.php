<?php
include_once '../modelo/EmpleadoTaller.php';
session_start();

if (!isset($_SESSION['empleado'])) {
    header("Location: login.php");
}
$emp = $_SESSION['empleado'];
echo "Hola $emp->nombre <br>";
echo"$emp->rol <br>";
?>
<a href=""><button>Cerrar sesion</button></a><br>
<?php
if ($emp->rol == "admin") {
    ?>
    <a href = "registrar.php"><button>Registrar Trabajo</button></a>
    <?php
}
?>
<a href="trabajar.php"><button>Ver trabajos</button></a>


