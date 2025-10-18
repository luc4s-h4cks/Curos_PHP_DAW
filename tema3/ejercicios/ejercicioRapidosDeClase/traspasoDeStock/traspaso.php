<h1>Traspaso de stock</h1>

<form action="" method="POST">

    <select name="tiendaOg">
        <option value="central">Central</option>
        <option value="sucursal1">Sucursal1</option>
        <option value="sucursal2">Sucrusal2</option>
    </select>

    <select name="tiendaDes">
        <option value="1">Central</option>
        <option value="2">Sucursal1</option>
        <option value="3">Sucrusal2</option>
    </select>
    <input type="text" name="codigoPro">
    <input type="number" name="unidades">
    <input type="submit" name="traspasar">

</form>

<?php
if (isset($_POST['traspasar'])) {

    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");
        $conex->query("Update stock set unidades = $_POST['unidades'] where tienda = $_POST['tiendaDes']");
    } catch (mysqli_sql_exception $ex) {
        
    }
}
?>