<?php
if (isset($_POST['enviar'])) {

    $errores = array();
    
    if (empty($_POST['nombre'])) {
        $errores[] = "nombre";
    }
    if (empty($_POST['apellidos'])) {
        $errores[] = "apellidos";
    }
    if (empty($_POST['modulos'])) {
        $errores[] = "modulos";
    }
}

if (isset($_POST['enviar']) && empty($errores)) {

    echo "Nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'];

    echo"<br>Modulos:";
    foreach ($_POST["modulos"] as $indi => $mod) {
        echo "<br>" . $mod;
    }
    echo "<br>";
    echo "<a href=''>Volver al formulario</a>";
} else {
    ?>

    <form action="" method="POST">

        Nombre:<input type="text" name="nombre" value="<?php if (!in_array('nombre', $errores)) echo $_POST['nombre'] ?>">
        <?php
        if (isset($_POST['enviar']) && in_array('nombre', $errores)) {
            echo "<span style= color:red> Nombre no puede estar vacio</span>";
        }
        ?>
        <br>
        Apellidos:<input type="text" name="apellidos" value="<?php if (!in_array('nombre', $errores)) echo $_POST['apellidos'] ?>">
        <?php
        if (isset($_POST['enviar']) && in_array('apellidos', $errores)) {
            echo "<span style= color:red> Apellido no puede estar vacio</span>";
        }
        ?>
        <br>

        Modulos:
        <?php
        if (isset($_POST['enviar']) && in_array('modulos', $errores)) {
            echo "<span style= color:red> Tienes que selccionar al menos una opcion</span>";
        }
        ?>
        <br>
        <input type="checkbox" name="modulos[]" value="DWES" <?php if (!isset($errores['modulos']) && in_array('DWES', $_POST['modulos'])) echo "checked" ?>>Desarrollo wen entorno servid<br>
        <input type="checkbox" name="modulos[]" value="DWEC" <?php if (!isset($errores['modulos']) && in_array('DWEC', $_POST['modulos'])) echo "checked" ?>>Desarrollo wen entorno Cliente<br>
        <input type="checkbox" name="modulos[]" value="DIW" <?php if (!isset($errores['modulos']) && in_array('DIW', $_POST['modulos'])) echo "checked" ?>>Diseño de interfaces web<br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
}





