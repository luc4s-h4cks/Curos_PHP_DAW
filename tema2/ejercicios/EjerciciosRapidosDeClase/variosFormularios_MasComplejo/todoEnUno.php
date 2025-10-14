<?php if (!isset($_POST['siguiente']) && !isset($_POST['siguiente2'])) { ?>

    <form action="datos2.php" method="POST">

        Nombre:<input type="text" name="nombre" value="<?php
        if (!empty($_POST['atras']))
            echo $_POST['nombre'];
        else if (!empty($_POST['cancelar']))
            echo $_POST['nombre']
            ?>">
        <br>
        Apellidos:<input type="text" name="apellidos" value="<?php
        if (!empty($_POST['atras']))
            echo $_POST['apellidos'];
        else if (!empty($_POST['cancelar']))
            echo $_POST['apellidos']
            ?>">
        <br>
        <?php if (!empty($_POST['cancelar'])) { ?>
            <input type="hidden" name="nmat" value="<?= $_POST['nmat']; ?>">
            <input type="hidden" name="curso" value="<?= $_POST['curso']; ?>">
            <input type="hidden" name="precio" value="<?= $_POST['precio']; ?>">
        <?php }
        ?>

        <input type="submit" name="siguiente" value="siguiente">
    </form>

    <?php }
    if (isset($_POST['siguiente']) && !isset($_POST['siguiente2'])) { ?>
        <form action="confirmaDatos.php" method="POST">

            Nº matricula: <input type="text" name="nmat" value="<?php if (isset($_POST['nmat'])) echo $_POST['nmat'] ?>">
            <br>
            Curso:<input type="text" name="curso" value="<?php if (isset($_POST['curso'])) echo $_POST['curso'] ?>">
            <br>
            Precio:<input type="text" name="precio" value="<?php if (isset($_POST['precio'])) echo $_POST['precio'] ?>">
            <br>
            <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
            <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">

            <input type="submit" name="siguiente2" value="siguiente">
        </form>

        <form action="datos1.php" method="POST">
            <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
            <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">
            <input type="submit" name="atras" value="Atras">

        </form>
        <?php
    }
    if (isset($_POST['siguiente2'])) {
        ?>
        <form action="datos1.php" method="POST">
            <input type="submit" name="confirmar" value="Confirmar">

        </form>

        <form action="datos1.php" method="POST">
            <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
            <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">
            <input type="hidden" name="nmat" value="<?= $_POST['nmat']; ?>">
            <input type="hidden" name="curso" value="<?= $_POST['curso']; ?>">
            <input type="hidden" name="precio" value="<?= $_POST['precio']; ?>">

            <input type="submit" name="cancelar" value="Cancelar">

        </form>
    <?php } ?>



