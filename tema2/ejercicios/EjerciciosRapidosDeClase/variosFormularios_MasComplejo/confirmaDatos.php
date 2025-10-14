<?php
echo "Nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'] . "<br>Nº Matricula: " . $_POST['nmat'];
echo "<br>Curso: " . $_POST['curso'] . "<br>Precio: " . $_POST['precio'];

$idio=explode(";", $_POST['idiomas']);

echo "Idiomas:<br>";

foreach ($idio as $value) {
    echo $value."<br>";
}

?>

<form action="datos1.php" method="POST">
    <input type="submit" name="confrimar" value="Confirmar">

</form>

<form action="datos1.php" method="POST">
    <input type="hidden" name="nombre" value="<?= $_POST['nombre']; ?>">
    <input type="hidden" name="apellidos" value="<?= $_POST['apellidos']; ?>">
    <input type="hidden" name="nmat" value="<?= $_POST['nmat']; ?>">
    <input type="hidden" name="curso" value="<?= $_POST['curso']; ?>">
    <input type="hidden" name="precio" value="<?= $_POST['precio']; ?>">
    <input type="hidden" name="idiomas[]" value="<?= $_POST['idiomas']?>">

    <input type="submit" name="cancelar" value="Cancelar">

</form>




