<?php

include_once '../modelo/Usuario.php';
include_once '../modelo/Cuenta.php';
include_once '../modelo/Trasferencia.php';
include_once '../controlador/ControladorCuentas.php';
include_once '../controlador/ControladorTrasferencias.php';
include_once '../controlador/controladorUsuarios.php';
session_start();
$usu = $_SESSION['usuario'];
$cuenta = ControladorCuentas::getCuentaIban($_POST['iban']);

$cuentas = ControladorCuentas::getAll();
echo "<h3>Hola $usu->nombre</h3>";
?>
<a href="cerrar.php"><button>Cerrar sesion</button></a>
<h3>Tramitar trasferencia</h3>

<?php
echo "Origen: $cuenta->iban<br>Saldo: $cuenta->saldo";
?>

<form action="verificarTranferencia.php" method="post">
    Cuentas:<br>
    <select name="destino">
        <?php
        foreach ($cuentas as $c){
            $usuarioCuenta = ControladorUsuarios::getUsuario($c->dni);
            if($c->dni != $usu->dni && $c->dni != "12121212A"){
                echo "<option value='$c->iban'>$c->iban --- $usuarioCuenta->nombre</option>";
            }
        }
        ?>
        
    </select><br>
    <input type="hidden" name="origen" <?php echo "value='$cuenta->iban'" ?>>
    <input type="hidden" name="saldo" <?php echo "value='$cuenta->saldo'" ?>>
    Cantidad:<br>
    <input type="number" name="cantidad"><br>
    <input type="submit" name="transferir" value="Transferir">

</form>

<a href="cuentas.php"><button>Volver</button></a>



