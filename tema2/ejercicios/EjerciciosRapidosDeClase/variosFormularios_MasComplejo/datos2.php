<?php ?>

<form action="confirmaDatos.php" method="POST">

    Nº matricula: <input type="text" name="nmat" value="<?php if(isset($_POST['nmat'])) echo $_POST['nmat'] ?>">
    <br>
    Curso:<input type="text" name="curso" value="<?php if(isset($_POST['curso'])) echo $_POST['curso'] ?>">
    <br>
    Precio:<input type="text" name="precio" value="<?php if(isset($_POST['precio'])) echo $_POST['precio'] ?>">
    <br>
    <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
    <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">
    <input type="hidden" name="idiomas" value="<?php echo implode(";", $_POST['idiomas'])?>">
    <?php echo implode(";", $_POST['idiomas'])?>
    <input type="submit" name="siguiente" value="siguiente">
</form>

<form action="datos1.php" method="POST">
    <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
    <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">
    <input type="submit" name="atras" value="Atras">

</form>


