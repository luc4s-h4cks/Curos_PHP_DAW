<?php 


?>

<form action="" method="POST">

    Nº matricula: <input type="text" name="nmat">
    <br>
    Curso:<input type="text" name="curso">
    <br>
    Precio:<input type="text" name="precio">
    <br>
    <input type="hidden" name="nombre" value="<?= $_POST['nombre'];?>">
    <input type="hidden" name="apellidos" value="<?= $_POST['apellidos'];?>">

    <input type="submit" name="siguiente" value="siguiente">
</form>


