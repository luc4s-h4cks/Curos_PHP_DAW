<?php ?>

<form action="datos2.php" method="POST">

    Nombre:<input type="text" name="nombre" value="<?php if (!empty($_POST['atras'])) echo $_POST['nombre'];
    else if (!empty($_POST['cancelar'])) echo $_POST['nombre']
    ?>">
    <br>
    Apellidos:<input type="text" name="apellidos" value="<?php if (!empty($_POST['atras'])) echo $_POST['apellidos'];
    else if (!empty($_POST['cancelar'])) echo $_POST['apellidos']
    ?>">
    <br>
    <?php if(!empty($_POST['cancelar'])){?>
    <input type="hidden" name="nmat" value="<?= $_POST['nmat']; ?>">
    <input type="hidden" name="curso" value="<?= $_POST['curso']; ?>">
    <input type="hidden" name="precio" value="<?= $_POST['precio']; ?>">
    <?php
    }?>
    
    Idioma:<br>
    <input type="checkbox" name="idiomas[]" value="ingles">Ingles <br>
    <input type="checkbox" name="idiomas[]" value="frances">Frances<br>
    <input type="checkbox" name="idiomas[]" value="aleman">Aleman<br>
    <input type="checkbox" name="idiomas[]" value="ruso">Ruso<br>

    <input type="submit" name="siguiente" value="siguiente">
</form>


