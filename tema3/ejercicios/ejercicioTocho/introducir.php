<?php
include 'funsiones.php';
if(isset($_POST['insertar'])){
    $nombre = validarNombre($_POST['nombre']);
    $dni 
}
?>

</<form action="" method="post">
    Nombre: <input type="text" name="nombre"><br>
    DNI: <input type="text" name="nombre"><br>
    
    <select name="dorsal">
        <?php for ($i = 1; $i <= 11; $i++) {
            echo "<option value=".$i.">".$i."</option>";
        } ?>
    </select><br>
    
    <select multiple="" name="pos[]">
        <option value="portero">Portero</option>
        <option value="defensa">Defensa</option>
        <option value="centrocampista">Centrocampista</option>
        <option value="delantero">Delantero</option>
    </select><br>
    
    Equipo: <input type="text" name="nombre"><br>
    Goles: <input type="text" name="nombre"><br>
    
    <input type="submit" name="insertar" value="insertar">
</form>


