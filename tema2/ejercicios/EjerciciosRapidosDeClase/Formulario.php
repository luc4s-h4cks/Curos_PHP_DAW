<?php
if (isset($_POST['enviar'])) {

    $errores = array();

    if (empty($_POST['nombre'])) {
        $errores[] = "nombre";
    }

    if (empty($_POST['apellidos'])) {
        $errores[] = "apellidos";
    }

    if (empty($_POST['sexo'])) {
        $errores[] = "sexo";
    }

    if (empty($_POST['aficiones'])) {
        $errores[] = "aficiones";
    }

    if (empty($_POST['estudios'])) {
        $errores[] = "estudios";
    }

    if (empty($_POST['provincia'])) {
        $errores[] = "provincia";
    }


    if (empty($_POST['estado'])) {
        $errores[] = "estado";
    }

    if ($_POST['edad'] < 18) {
        $errores[] = "edad";
    }
}

if (isset($_POST['enviar']) && empty($errores)) {

    echo "nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'] . "<br>Sexo: " . $_POST['sexo'] . "<br>Estado civil: " . $_POST['estado'];
    echo "Aficiones: <br>";
    foreach ($_POST['aficiones'] as $value) {
        echo $value . "<br>";
    }

    echo "Estudios: <br>";
    foreach ($_POST['estudios'] as $value) {
        echo $value . "<br>";
    }

    echo "Provincia: " . $_POST['provincia'] . "<br>Edad: " . $_POST['edad'];
} else {
    ?>

    <form action="" method="POST">

        Nombre:<input type="text" name="nombre" value="<?php if(isset($_POST['enviar']) && !in_array('nombre', $errores)) echo $_POST['nombre']?>">
        <?php
        if (isset($_POST['enviar']) && in_array('nombre', $errores)) {
            echo "<span style= color:red> Nombre no puede estar vacio</span>";
        }
        ?>
        <br><br>
        Apellidos:<input type="text" name="apellidos" value="<?php if(isset($_POST['enviar']) && !in_array('apellidos', $errores)) echo $_POST['apellidos']?>">
        <?php
        if (isset($_POST['enviar']) && in_array('apellidos', $errores)) {
            echo "<span style= color:red> Apellidos no puede estar vacio</span>";
        }
        ?>
        <br><br>

        Sexo:
        <input type="radio" name="sexo" value="hombre" <?php if(isset($_POST['enviar']) && !in_array('sexo', $errores) && $_POST['sexo'] == "hombre") echo "checked"?>> Hombre
        <input type="radio" name="sexo" value="mujer" <?php if(isset($_POST['enviar']) && !in_array('sexo', $errores) && $_POST['sexo'] == "mujer") echo "checked"?>> Mujer
        <?php
        if (isset($_POST['enviar']) && in_array('sexo', $errores)) {
            echo "<span style= color:red> Tienes que selecionar al menos 1</span>";
        }
        ?>
        <br>
        Estado civil:
        <input type="radio" name="estado" value="soltero" <?php if(isset($_POST['enviar']) && !in_array('estado', $errores) && $_POST['estado'] == "soltero") echo "checked"?>> Soltero
        <input type="radio" name="estado" value="casado" <?php if(isset($_POST['enviar']) && !in_array('estado', $errores) && $_POST['estado'] == "casado") echo "checked"?>> Casado
        <input type="radio" name="estado" value="otro" <?php if(isset($_POST['enviar']) && !in_array('estado', $errores) && $_POST['estado'] == "otro") echo "checked"?>> Otro
        <?php
        if (isset($_POST['enviar']) && in_array('estado', $errores)) {
            echo "<span style= color:red> Tienes que selecionar al menos 1</span>";
        }
        ?>
        <br><br>

        Aficiones:
        <?php
        if (isset($_POST['enviar']) && in_array('aficiones', $errores)) {
            echo "<span style= color:red> Tienes que selecionar al menos 1</span>";
        }
        ?>
        <br> 
        <input type="checkbox" name="aficiones[]" value="Cine" <?php if(isset($_POST['enviar']) && !in_array('aficiones', $errores) && in_array("Cine", $_POST['aficiones'])) echo "checked"?>>Cine<br>
        <input type="checkbox" name="aficiones[]" value="Lectura" <?php if(isset($_POST['enviar']) && !in_array('aficiones', $errores) && in_array("Lectura", $_POST['aficiones'])) echo "checked"?>>Lectura<br>
        <input type="checkbox" name="aficiones[]" value="TV" <?php if(isset($_POST['enviar']) && !in_array('aficiones', $errores) && in_array("TV", $_POST['aficiones'])) echo "checked"?>>TV<br>
        <input type="checkbox" name="aficiones[]" value="Deportes" <?php if(isset($_POST['enviar']) && !in_array('aficiones', $errores) && in_array("Deportes", $_POST['aficiones'])) echo "checked"?>>Deportes<br>
        <input type="checkbox" name="aficiones[]" value="Musica" <?php if(isset($_POST['enviar']) && !in_array('aficiones', $errores) && in_array("Musica", $_POST['aficiones'])) echo "checked"?>>Musica<br>
        <br>
        Estudios:
        <?php
        if (isset($_POST['enviar']) && in_array('estudios', $errores)) {
            echo "<span style= color:red> Tienes que selecionar al menos 1</span>";
        }
        ?>
        <br>
        <select name="estudios[]" multiple>
            <option value="eso" <?php if(isset($_POST['enviar']) && !in_array('estudios', $errores) && in_array("eso", $_POST['estudios'])) echo "selected"?>>ESO</option>
            <option value="bachi" <?php if(isset($_POST['enviar']) && !in_array('estudios', $errores) && in_array("bachi", $_POST['estudios'])) echo "selected"?>>Bachillerato</option>
            <option value="cm" <?php if(isset($_POST['enviar']) && !in_array('estudios', $errores) && in_array("cm", $_POST['estudios'])) echo "selected"?>>C.F.G.H</option>
            <option value="cs" <?php if(isset($_POST['enviar']) && !in_array('estudios', $errores) && in_array("cs", $_POST['estudios'])) echo "selected"?>>C.F.G.S</option>
            <option value="uni" <?php if(isset($_POST['enviar']) && !in_array('estudios', $errores) && in_array("uni", $_POST['estudios'])) echo "selected"?>>Universidad</option>
        </select>
        <br><br>
        Provincia: 
        <select name="provincia">
            <option selected disabled>Seleciona un provincia</option>
            <option value="Almeria" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Alemeria") echo "selected"?>>Almeria</option>
            <option value="Cadiz" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Cadiz") echo "selected"?>>Cadiz</option>
            <option value="Cordoba" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Cordoba") echo "selected"?>>Cordoba</option>
            <option value="Granada" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Granada") echo "selected"?>>Granada</option>
            <option value="Huelva" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Huelva") echo "selected"?>>Huelva</option>
            <option value="Jaen" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Jaen") echo "selected"?>>Jaen</option>
            <option value="Malaga" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Malaga") echo "selected"?>>Malaga</option>
            <option value="Sevilla" <?php if(isset($_POST['enviar']) && !in_array('provincia', $errores) && $_POST['provincia'] == "Sevilla") echo "selected"?>>Sevilla</option>
        </select>
        <?php
        if (isset($_POST['enviar']) && in_array('provincia', $errores)) {
            echo "<span style= color:red> Tienes que selecionar una provincia</span>";
        }
        ?>
        <br><br>
        Edad: <input type="number" name="edad" value="<?php if(isset($_POST['enviar']) && !in_array('edad', $errores)) echo $_POST['edad']?>">
        <?php
        if (isset($_POST['enviar']) && in_array('edad', $errores)) {
            echo "<span style= color:red> Tienes que ser mayor de edad</span>";
        }
        ?>
        <br><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
}
?>
