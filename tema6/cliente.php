Elije el precio minimo de los productos a mostrar
<form action="" method="post">
    precio minimo: <input type="text" name="min"> <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST['buscar'])) {
    $datos = file_get_contents("http://localhost/Curos_PHP_DAW/tema6/server.php?precio=$_POST[min]");
    $productos = json_decode($datos);

    foreach ($productos as $p) {
        echo "Codigo: " . $p->codigo . "<br>";
        echo "Nombre: " . $p->nombre . "<br>";
        echo "Descripcion: " . $p->desc . "<br>";
        echo "Precio: " . $p->precio . "<br>";
        echo "==================<br>";
    }
}

