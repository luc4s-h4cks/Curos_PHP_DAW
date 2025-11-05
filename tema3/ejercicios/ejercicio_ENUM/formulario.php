
<head>
    <link rel="stylesheet" href="dwes.css">

</head>
<form action="" method="post" id="encabezado">
    <h1>Ejercicio</h1>
    Producto:
    <select name="producto">
        <?php
        try {
            $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", 'dwes', 'abc123.');
            $resul = $conex->query("Select cod, nombre from familia");
            while ($familia = $resul->fetchObject()) {
                echo"<option value='$familia->cod'>$familia->nombre</option>";
            }
        } catch (Exception $ex) {
            $msg = "Error al intentar conectar con el servidor";
        }
        ?>
    </select>
    <input type="submit" name="mostrar" value="Mostrar">
</form>

<?php
if(isset($_POST['mostrar'])){
    
}

?>




