<?php
include_once '../modelo/Usuario.php';
include_once '../modelo/Cuenta.php';
include_once '../modelo/Trasferencia.php';
include_once '../controlador/ControladorCuentas.php';
include_once '../controlador/ControladorTrasferencias.php';
include_once '../controlador/controladorUsuarios.php';
session_start();
$usu = $_SESSION['usuario'];

echo "<h3>Hola $usu->nombre</h3>";
$ibanBanco = ControladorCuentas::getIbanBanco();
echo $ibanBanco;
if (isset($_POST['conf'])) {

    if (ControladorCuentas::hacerTranferencia($_POST['origen'], $_POST['destino'], $_POST['cantidad'], $_POST['comision'], $ibanBanco)) {
        header("Location: cuentas.php");
    } else {
        echo "Algo ocurrio durante la transferencia";
    }
}

$comision = $_POST['cantidad'] * 0.01;
$total = $comision + $_POST['cantidad'];
$saldoPos = $_POST['saldo'] - ($_POST['cantidad'] + $comision);
$hoy = time();
?>

<form action="" method="post">
    Origen: <input type="text" name="origen" <?= "value='$_POST[origen]'" ?> readonly><br>
    Destino: <input type="text" name="destino" <?= "value='$_POST[destino]'" ?> readonly><br>
    Cantidad: <input type="text" name="cantidad" <?= "value='$_POST[cantidad]'" ?> readonly><br>
    Comision: <input type="text" name="comision" <?= "value='$comision'" ?> readonly><br>
    Saldo anterior: <input type="text" name="saldoAnt" <?= "value='$_POST[saldo]'" ?> readonly><br>
    <input type="hidden" name="fecha" <?= "value='$hoy'" ?>>
    Saldo posterior: <input type="text" name="sladoPos" <?= ($saldoPos < 0 ? "value='$saldoPos' style='color: red;'" : "value='$saldoPos'") ?> readonly><br>

    <input type="submit" name="conf" value="Confirmar" <?= ($saldoPos < 0 ? "disabled " : "") ?>>


</form>

<a href="cerrar.php"><button>Cerrar sesion</button></a>
<a href="cuentas.php"><button>Volver</button></a>


