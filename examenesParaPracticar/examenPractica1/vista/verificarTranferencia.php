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

if (isset($_POST['conf'])) {
    $pago = $_POST['cantidad'] + $_POST['comision'];
    if (ControladorCuentas::pagar($_POST['origen'], $pago)) {
        if (ControladorCuentas::agregar($_POST['destino'], $_POST['cantidad'])) {
            if (ControladorCuentas::agregar("ES2099999999999999999999", $_POST['comision'])) {
                $t = new Trasferencia($_POST['origen'], $_POST['destino'], $_POST['fecha'], $_POST['cantidad']);
                var_dump($t);
                if (ControladorTrasferencias::crearTransferencia($t)) {
                    header("Location: cuentas.php");
                } else {
                    echo "Algo salio mal";
                }
            } else {
                echo "3";
            }
        }
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


