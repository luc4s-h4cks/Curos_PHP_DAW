
<head>
    <link rel="stylesheet" href="dwes.css">

</head>
<form action="" method="post" id="encabezado">
    <h1>Ejercicio</h1>
    Producto:
    <select name="producto">
        <?php
        try {
            $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", 'dwes', 'abc123.');
            $resul = $conex->query("Select cod, nombre from familia");
            while ($familia = $resul->fetchObject()) {
                echo"<option value='$familia->cod'>$familia->nombre</option>";
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
    try {
        $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", 'dwes', 'abc123.');
        $resul = $conex->query("select cod, nombre_corto, PVP, descripcion from producto where familia='$_POST[producto]'");
        while ($producto = $resul->fetchObject()) {
            echo "<form action='editar.php' method='post'>";

            echo "Prodcuto: " . $producto->nombre_corto . " precio: " . $producto->PVP . " <input type='submit' name='editar' value='Editar'><br><br>";
            echo "<input type='hidden' name='cod' value='$producto->cod'>";
            echo "<input type='hidden' name='nombre' value='$producto->nombre_corto'>";
            echo "<input type='hidden' name='desc' value='$producto->descripcion'>";
            echo "<input type='hidden' name='precio' value='$producto->PVP'>";
            echo "</form>";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

if(isset($_GET['estado']) == "ok"){
    echo "Producto modificado";
}

?>




