<?php
$msg = "";
?>
<head>
    <link rel="stylesheet" href="dwes.css">

</head>
<form action="" method="post" id="encabezado">
    <h1>Ejercicio</h1>
    Producto:
    <select name="producto">
        <?php
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $resul = $conex->query("Select cod, nombre_corto from producto");
            while ($producto = $resul->fetch_object()) {
                if ($producto->cod == $_POST['producto']) {
                    echo"<option value='$producto->cod' selected>$producto->nombre_corto</option>";
                } else {
                    echo"<option value='$producto->cod'>$producto->nombre_corto</option>";
                }
            }
        } catch (Exception $ex) {
            $msg = "Error al intentar conectar con el servidor";
        }
        ?>
    </select>
    <input type="submit" name="mostrar" value="Mostrar">
</form>

<?php
if (isset($_POST['mostrar'])) {
    echo"<div id='contenido'>";
    echo "<form action='' method='post'>";
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $resul = $conex->query("select unidades, cod, nombre from stock join tienda where stock.tienda = tienda.cod and producto = '$_POST[producto]'");
        while ($datos = $resul->fetch_object()) {
            echo "Tienda: " . $datos->nombre . " stock: <input type='number' name=" . $datos->cod . " value=" . $datos->unidades . "><br>";
        }
        echo"<input type='hidden' name='pro' value=" . $_POST['producto'] . ">";
    } catch (Exception $ex) {
        $msg = "Error al intentar Buscar el producto en la base de datos";
    }

    echo "<input type='submit' name='actualizar' value='Actualizar'>";
    echo"</form>";
    echo"</div>";
}

if (isset($_POST['actualizar']) && $msg =="") {
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $tiendas = $conex->query("select cod from tienda");
        $stmt = $conex->prepare("update stock set unidades=? where tienda=? and producto=?");

        while ($cod = $tiendas->fetch_object()) {
            if (isset($_POST[$cod->cod])) {
                $stmt->bind_param("iis", $_POST[$cod->cod], $cod->cod, $_POST['pro']);
                $stmt->execute();
            }
        }
    } catch (Exception $ex) {

        $msg = "Error al intentar actulaizar la base de datos";
    }
}

if ($msg != "") {
    echo "<div id='pie'>";
    echo $msg;
    echo "</div>";
}
?>




