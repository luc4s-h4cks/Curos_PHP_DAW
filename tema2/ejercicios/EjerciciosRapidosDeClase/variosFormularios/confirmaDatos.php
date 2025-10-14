<?php
echo "Nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'] . "<br>Nº Matricula: " . $_POST['nmat'];
echo "<br>Curso: " . $_POST['curso'] . "<br>Precio: " . $_POST['precio'];
?>

<form action="datos1.php" method="POST">
    <input type="submit" name="inicio" value="inicio">
</form>





