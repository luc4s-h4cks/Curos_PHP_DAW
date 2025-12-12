<?php
include_once '../modelo/UsuarioBanco.php';
include_once '../controlador/ControladorCuentasBanco.php';
include_once '../modelo/CuentaBanco.php';
include_once '../controlador/ControladorTransferenciasBanco.php';
include_once '../modelo/TrasnferenciaBanco.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}

if(isset($_POST['trans'])){
    setcookie("iban", $_POST['iban']);
    header("Location: transferencia.php");
}

$usu = $_SESSION['usuario'];
echo "Hola $usu->nombre";
?>

<h1>Mis Cuentas</h1>

<table border="1px">
    <tr>
        <th>Cuentas</th>
        <th>Saldo</th>
        <th>Historial</th>
        <th>Transferencia</th>
    </tr>
    <?php
    $cuentas = ControladorCuentasBanco::getCuentasUsuarioPDO($usu->dni);
    foreach ($cuentas as $c) {
        ?>
        <tr>
        <form action="" method="post">
            <td><?= $c->iban ?></td>
            <td><?= $c->saldo ?></td>
            <input type="hidden" name="iban" value="<?= $c->iban ?>">
            <td><input type="submit" name="historial" value="Historial"></td>
            <td><input type="submit" name="trans" value="Transferencia"></td>
        </form>
    </tr>
    <?php
}
?>
</table>

<?php
if (isset($_POST['historial'])) {
    $trs = ControladorTransferenciasBanco::getHistorialCuenta($_POST['iban']);
    ?>
    <h4>Historial</h4>
    <table border="1px">
        <tr>
            <th>Origen</th>
            <th>Destino</th>
            <th>saldo</th>
            <th>cantidad</th>
        </tr>
        <?php
        foreach ($trs as $tr) {
            $fecha = date("Y-m-d", $tr->fecha);
            echo "<tr>";
            echo "<td>$tr->ibanOrigen</td>";
            echo "<td>$tr->ibanDestino</td>";
            echo "<td>$fecha</td>";
            echo "<td>$tr->cantidad</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
}
?>

