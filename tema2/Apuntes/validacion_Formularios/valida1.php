<?php
if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['modulos'])) {

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

            Nombre:<input type="text" name="nombre" value="<?php if(!empty($_POST['nombre'])) echo $_POST['nombre']?>">
            <?php
            if (empty($_POST['nombre']))
                echo "<span style= color:red> Nombre no puede estar vacio</span>";
            ?><br>
            Apellidos:<input type="text" name="apellidos" value="<?php if(!empty($_POST['apellidos'])) echo $_POST['apellidos']?>">
            <?php
            if (empty($_POST['apellidos']))
                echo "<span style= color:red> Apellidos no puede estar vacio</span>";
            ?><br>

            Modulos:         <?php
            if (empty($_POST['modulos']))
                echo "<span style= color:red> Tienes que selecionar al menos una opcion</span>";
            ?> <br>
            <input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST['modulos']) && in_array("DWES", $_POST['modulos'])) echo "checked";?>>Desarrollo wen entorno servidor<br>
            <input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos'])) echo "checked";?>>Desarrollo wen entorno Cliente<br>
            <input type="checkbox" name="modulos[]" value="DIW" <?php if(isset($_POST['modulos']) && in_array("DIW", $_POST['modulos'])) echo "checked";?>>Diseño de interfaces web<br>
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <?php
    }
} else {
    ?>
    <form action="" method="POST">

        Nombre:<input type="text" name="nombre">
        <br>
        Apellidos:<input type="text" name="apellidos">
        <br>

        Modulos:<br>
        <input type="checkbox" name="modulos[]" value="DWES">Desarrollo wen entorno servidor<br>
        <input type="checkbox" name="modulos[]" value="DWEC">Desarrollo wen entorno Cliente<br>
        <input type="checkbox" name="modulos[]" value="DIW">Diseño de interfaces web<br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

<?php } ?>
