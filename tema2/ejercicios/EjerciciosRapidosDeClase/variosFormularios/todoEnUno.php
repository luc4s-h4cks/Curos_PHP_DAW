<?php
if (empty($_POST['datos1'])) {
    ?>

    <form action="" method="POST">

        Nombre:<input type="text" name="nombre">
        <br>
        Apellidos:<input type="text" name="apellidos">
        <br>

        <input type="submit" name="datos1" value="siguiente">
    </form>
    <?php
} else if (empty($_POST['datos2'])) {
    ?>
    <form action="" method="POST">

        Nº matricula: <input type="text" name="nmat">
        <br>
        Curso:<input type="text" name="curso">
        <br>
        Precio:<input type="text" name="precio">
        <br>
        <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
        <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">
        <input type="hidden" name="datos1" value="<?= $_POST['datos1']; ?>">

        <input type="submit" name="datos2" value="siguiente">
    </form>
<?php }else if(empty ($_POST['inicio'])){
    echo "Nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'] . "<br>Nº Matricula: " . $_POST['nmat'];
    echo "<br>Curso: " . $_POST['curso'] . "<br>Precio: " . $_POST['precio'];
    
    ?>
<form action="" method="POST">
    <input type="submit" name="inicio" value="inicio">
</form>
<?php } ?>

