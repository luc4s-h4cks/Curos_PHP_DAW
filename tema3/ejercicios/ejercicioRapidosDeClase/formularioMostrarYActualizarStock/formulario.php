
<form action="" method="post">
    <h1>Ejercicio</h1>
    Producto:
    <select name="producto">
        <?php
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $resul = $conex->query("Select cod, nombre_corto from producto");
            while ($producto = $resul->fetch_object()) {
                echo"<option value='$producto->cod'>$producto->nombre_corto</option>";
            }
        } catch (Exception $ex) {
            
        }
        ?>
    </select>
    <input type="submit" name="mostrar" value="Mostrar">
</form>

<?php
if(isset($_POST['mostrar'])){
    echo"<div>";
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $resul = $conex->query("select * from stock join tienda")
    } catch (Exception $ex) {
        
    }
    echo"</div>";
}
?>


<?php


