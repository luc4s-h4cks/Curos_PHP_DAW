<?php
if (!isset($_POST['enviar'])) {
    ?>

    <form action="" method="POST">

        Nombre:<input type="text" name="nombre"><br>
        Apellidos:<input type="text" name="apellidos"><br>
        <input type="submit" name="enviar" value="Enviar">
        Modulos: <br>
        <input type="checkbox" name="modulos[]" value="DWES">Desarrollo wen entorno servidor<br>
        <input type="checkbox" name="modulos[]" value="DWEC">Desarrollo wen entorno Cliente<br>
        <input type="checkbox" name="modulos[]" value="DIW">Diseño de interfaces web<br>

    </form>

    <?php
}
if (isset($_POST['enviar'])) {

    echo "datos resibidos<br>";

    echo "Nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'];

    $nom = $_POST['nombre'];
    $ape = $_POST['apellidos'];

    echo"<br>Modulos:";
    foreach ($_POST["modulos"] as $indi => $mod) {
        echo "<br>" . $mod;
    }
    echo "<br>";
}
?>
<a href="">Rellenar formulario</a>

