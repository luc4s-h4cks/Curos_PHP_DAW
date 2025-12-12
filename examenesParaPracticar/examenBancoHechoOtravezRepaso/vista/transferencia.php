<?php
include_once '../modelo/UsuarioBanco.php';
include_once '../controlador/ControladorCuentasBanco.php';
include_once '../modelo/CuentaBanco.php';
include_once '../controlador/ControladorTransferenciasBanco.php';
include_once '../modelo/TrasnferenciaBanco.php';
include_once '../controlador/ControladorUsuariosBanco.php';

session_start();
$cuenta = ControladorCuentasBanco::getCuentaIban($_COOKIE['iban']);
$cuentas = ControladorCuentasBanco::getAll();
var_dump($cuentas)
?>

<h2>Tramitar Transferencia</h2>
<h4>Origen: <?= $cuenta->iban ?></h4>
<h3>Saldo: <?= $cuenta->saldo ?></h3>

<form action="" method="post">
    

cuentas:
<select name="destino">
    <?php
    foreach ($cuentas as $c) {
        $usu = ControladorUsuariosBanco::getUsuario($c->dni_cuenta);
        if($usu->direccion != "Banco" && $usu->nombre != $_SESSION['usuario']->nombre){
            echo "<option value='$c->iban'>" . $c->iban . " --- " . $usu->nombre . "</option>";
        }
    }
    ?>

</select><br>

Cantidad<br>
<input type="number" name="cantidad">
</form>