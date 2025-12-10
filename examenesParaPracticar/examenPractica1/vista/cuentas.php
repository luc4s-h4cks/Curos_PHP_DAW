<?php
include_once '../modelo/Usuario.php';
include_once '../modelo/Cuenta.php';
include_once '../modelo/Trasferencia.php';
include_once '../controlador/ControladorCuentas.php';
include_once '../controlador/ControladorTrasferencias.php';
session_start();
$usu = $_SESSION['usuario'];

echo "<h3>Hola $usu->nombre</h3>";
?>

<a href="cerrar.php"><button>Cerrar sesion</button></a>

<h2>Mis cuentas</h2>
<table border='1px'>
    <tr>
        <th>Cuentas</th>
        <th>Saldo</th>
        <th>Historial</th>
        <th>Traferencias</th>
    </tr>

    <?php
    $cuentas = ControladorCuentas::getCuentasUsuario($usu->dni);
    foreach ($cuentas as $cuenta) {
        echo "<tr>";
        echo "<td>$cuenta->iban</td>";
        echo "<td>$cuenta->saldo</td>";
        
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='iban' value='$cuenta->iban'>";
        echo "<td><input type='submit' name='historial' value='Historial'></td>";
        echo "</form>";
        
        echo "<form action='trasferencia.php' method='post'>";
        echo "<input type='hidden' name='iban' value='$cuenta->iban'>";
        echo "<td><input type='submit' name='trans' value='Transferencias'></td>";
        echo "</form>";
        
        echo "</tr>";
    }
    ?>
</table>

<?php
if (isset($_POST['historial'])) {
    ?>

    <h2>Historial</h2>
    <table border="1px">
        <tr>
            <th>Origen</th>
            <th>Destino</th>
            <th>Fecha</th>
            <th>Cantida</th>
        </tr>
        <?php
        $transferecnias = ControladorTrasferencias::getTrasferenciasUsuario($_POST['iban']);
        
        
        
        foreach ($transferecnias as $tr) {
            
            $fecha = date("Y-m-d", $tr->fecha);
            
            echo "<tr>";
            echo "<td>$tr->iban_origen</td>";
            echo "<td>$tr->iban_destino</td>";
            echo "<td>$fecha</td>";
            echo "<td>$tr->cantidad</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
}




